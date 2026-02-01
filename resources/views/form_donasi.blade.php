@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-success">Lengkapi Form Donasi</h5>
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
    <div class="alert alert-danger"></div>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('donasi.store') }}" method="POST">
                    @csrf

                    <h6 class="text-muted mb-3 fw-bold text-uppercase" style="font-size: 0.8rem;">Informasi Donatur</h6>
                    <div class="mb-3">
                        <class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_donatur" class="form-control" placeholder="Contoh: budi cobra" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh: budi@example.com" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <class="form-label">Nomor WhatsApp</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 081234567890" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-muted mb-3 fw-bold text-uppercase" style="font-size: 0.8rem;">Detail Donasi</h6>
                    <div class="mb-3">
                        <label class="form-label">Pilih kategoriDonasi</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>     
            </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal Donasi (Rp)</label>
                        <input type="number" name="nominal" class="form-control" min="1" placeholder="Masukan angka tanpa titik, contoh:50000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan untuk Penerima Donasi (Opsional)</label>
                        <textarea name="pesan" class="form-control" rows="3" placeholder="Tulis pesan anda disini..."></textarea>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg fw-bold">Kirim Donasi</button>

                    <a href="{{ route('home') }}" class="btn btn-light"> Batal</a>
        </div>
                </form>
            </div>
    </div>
        </div>
    </div>
</div>





@endsection