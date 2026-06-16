@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container-sm">
    <div class="card" style="margin-top:32px;">

        <div class="card-title">Edit Buku</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>✕ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul"
                           class="form-input"
                           value="{{ old('judul', $buku->judul) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis"
                           class="form-input"
                           value="{{ old('penulis', $buku->penulis) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit"
                           class="form-input"
                           value="{{ old('penerbit', $buku->penerbit) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit"
                           class="form-input"
                           value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
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
                    ✦ Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection