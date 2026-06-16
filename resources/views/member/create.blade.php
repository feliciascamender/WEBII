@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')
<div class="container-sm">
    <div class="card" style="margin-top:32px;">

        <div class="card-title">Tambah Member</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>✕ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('member.store') }}">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nama Member</label>
                    <input type="text" name="nama_member"
                           class="form-input"
                           placeholder="Masukkan nama member"
                           value="{{ old('nama_member') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-input"
                           placeholder="Masukkan email"
                           value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp"
                           class="form-input"
                           placeholder="Contoh: 08123456789"
                           value="{{ old('no_hp') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat"
                           class="form-input"
                           placeholder="Masukkan alamat (opsional)"
                           value="{{ old('alamat') }}">
                </div>
            </div>

            <div style="display:flex; gap:10px; justify-content:center; margin-top:30px;">
                <a href="{{ route('member.index') }}" class="btn-submit"
                   style="background:transparent; border:1px solid #5a3a1a;
                          color:#a08060; text-decoration:none; padding:10px 28px;">
                    ← Kembali
                </a>
                <button type="submit" class="btn-submit" style="margin:0;">
                    ✦ Simpan Member
                </button>
            </div>

        </form>
    </div>
</div>
@endsection