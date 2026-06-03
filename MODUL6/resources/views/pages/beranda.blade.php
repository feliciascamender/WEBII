@extends('layouts.app', ['title' => 'Beranda | MODUL6'])

@section('content')
<section class="hero-grid">
    <div class="hero-copy">
        <p class="eyebrow">Laravel MVC Profile Website</p>

        <h1>
            Welcome to
            Felicia's Profile
        </h1>

        <p class="hero-description">
            Website praktikum ini dibuat menggunakan Laravel dengan konsep MVC.
            Data nama dan NIM praktikan diambil dari Model, kemudian ditampilkan melalui Controller ke halaman View.
        </p>

        <div class="identity-card">
            <div>
                <span>Nama Praktikan</span>
                <strong>{{ $praktikan['nama'] }}</strong>
            </div>
            <div>
                <span>NIM</span>
                <strong>{{ $praktikan['nim'] }}</strong>
            </div>
            <div>
                <span>Program Studi</span>
                <strong>{{ $praktikan['prodi'] }}</strong>
            </div>
        </div>

        <div class="hero-actions">
            <a href="{{ route('profil') }}" class="btn btn-primary">Lihat Profil</a>
            <a href="{{ url('/cek-koneksi') }}" class="btn btn-secondary">Tes Koneksi</a>
        </div>
    </div>

    <div class="planet-card">
        <div class="planet-glow">
            <div class="planet-core">
                <span>{{ substr($praktikan['nama'], 0, 1) }}</span>
            </div>
        </div>

        <div class="floating-note note-one">
            <span>01</span>
            Beranda
        </div>

        <div class="floating-note note-two">
            <span>02</span>
            Profil
        </div>

        <div class="floating-note note-three">
            <span>03</span>
            Detail Pengalaman
        </div>
    </div>
</section>
@endsection