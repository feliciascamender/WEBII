@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container-sm">
    <div class="card" style="margin-top:32px;">

        <div class="card-title">Tambah Buku</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>✕ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('buku.store') }}">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul"
                           class="form-input"
                           placeholder="Masukkan judul buku"
                           value="{{ old('judul') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis"
                           class="form-input"
                           placeholder="Masukkan nama penulis"
                           value="{{ old('penulis') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit"
                           class="form-input"
                           placeholder="Masukkan penerbit"
                           value="{{ old('penerbit') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit"
                           class="form-input"
                           placeholder="Contoh: 2020"
                           value="{{ old('tahun_terbit') }}"
                           min="1801" max="2023">
                </div>
            </div>

            <div style="display:flex; gap:10px; justify-content:center; margin-top:30px;">
                <a href="{{ route('buku.index') }}" class="btn-submit"
                   style="background:transparent; border:1px solid #5a3a1a;
                          color:#a08060; text-decoration:none; padding:10px 28px;">
                    ← Kembali
                </a>
                <button type="submit" class="btn-submit" style="margin:0;">
                    ✦ Simpan Buku
                </button>
            </div>

        </form>
    </div>
</div>
@endsection