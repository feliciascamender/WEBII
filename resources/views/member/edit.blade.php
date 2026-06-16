@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<div class="container-sm">
    <div class="card" style="margin-top:32px;">

        <div class="card-title">Edit Member</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>✕ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('member.update', $member->id) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nama Member</label>
                    <input type="text" name="nama_member"
                           class="form-input"
                           value="{{ old('nama_member', $member->nama_member) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-input"
                           value="{{ old('email', $member->email) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp"
                           class="form-input"
                           value="{{ old('no_hp', $member->no_hp) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat"
                           class="form-input"
                           value="{{ old('alamat', $member->alamat) }}">
                </div>
            </div>

            <div style="display:flex; gap:10px; justify-content:center; margin-top:30px;">
                <a href="{{ route('member.index') }}" class="btn-submit"
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