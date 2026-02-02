@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="hero-section rounded-3 shadow mb-5">
        <h1 class="display-4 fw-bold">Selamat Datang di DonasiKita</h1>
        <p class="lead">Bersama kita bisa membuat perubahan positif!</p>
        <a href="{{ route('donasi.create') }}" class="btn btn-light btn-lg mt-3">Donasi Sekarang</a>
    </div>

    <div class="row text-start mt-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <h3>Mudah</h3>
                <p>Isi data singkat, pilih kategori, dan kirim donasi anda dalama hitungan menit.</p>
        </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <h3>Transparan</h3>
                <p>Semua donasi yang masuk tercatat secara sistematis dalam laporan riwayat donasi.</p>
        </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3">
                <h3>Bermanfaat</h3>
                <p>Pilih kategori yang tepat untuk memastikan donasi anda sampai ke pihak yang membutuhkan.</p>

        </div>
        </div>
    </div>
</div>

@endsection