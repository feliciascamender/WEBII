@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-sm">
    <div class="card" style="text-align:center; padding:48px 32px; margin-top:40px;">

        <h1 style="color:#f0deb4; font-family:'Cinzel',serif;
                    font-size:32px; letter-spacing:4px; margin-bottom:8px;">
            Perpustakaan
        </h1>

        <p style="color:#a08060; letter-spacing:3px;
                   font-size:13px; margin-bottom:8px;">
            SISTEM MANAJEMEN PERPUSTAKAAN
        </p>

        <div class="divider">✦</div>

        @if (session('success'))
            <div class="alert-success" style="margin-bottom:16px;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div style="display:flex; flex-direction:column; gap:12px; margin-top:8px;">
            <a href="{{ route('buku.index') }}" class="btn-tambah"
               style="text-align:center; padding:12px;">
                📚 Buku
            </a>
            <a href="{{ route('member.index') }}" class="btn-tambah"
               style="text-align:center; padding:12px;">
                👤 Member
            </a>
            <a href="{{ route('peminjaman.index') }}" class="btn-tambah"
               style="text-align:center; padding:12px;">
                📋 Peminjaman
            </a>
        </div>

    </div>
</div>
@endsection