<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Donatur;
use App\Models\KategoriDonasi;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function index()
    {
        $daftarDonasi = Donasi::with(['donatur', 'kategori'])
        ->latest()
        ->get();
        return view('beranda', compact('daftarDonasi'));
    }

    public function create()
    {
        $categories = KategoriDonasi::all();
        return view('form_donasi', compact('categories'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
           'nama_donatur' => 'required|string|max:255',
           'email' => 'required|email|max:255',
           'no_hp' => 'required|string|max:15',
           'kategori_id' => 'required|exists:kategori_donasi,id',
           'nominal' => 'required|numeric|min:1',
           'pesan' => 'nullable|string|max:500',
       ]);

       DB::transaction(function () use ($validated) {
           $donatur = Donatur::updateOrCreate(
               [
                   'email' => $validated['email'],
               ],
               [
                   'nama_donatur' => $validated['nama_donatur'],
                   'no_hp' => $validated['no_hp'],
               ]
           );

           Donasi::create([
               'donatur_id' => $donatur->id,
               'kategori_id' => $validated['kategori_id'],
               'nominal' => $validated['nominal'],
               'pesan' => $validated['pesan'] ?? null,
               'tanggal_donasi' => now(),
           ]);
       });
       return redirect()->route('donasi.index')->with('success', 'Terima kasih atas donasi Anda!');
    }

    public function daftarDonasi()
    {
        $daftarDonasi = Donasi::with(['donatur', 'kategori'])->latest()->get();
        return view('daftar_donasi', compact('daftarDonasi'));
    }
}
