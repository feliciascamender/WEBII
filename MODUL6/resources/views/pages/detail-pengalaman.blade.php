@extends('layouts.app', ['title' => $pengalaman['judul'] . ' | MODUL6'])

@section('content')
<section class="detail-section">
    <a href="{{ route('profil') }}" class="back-link">← Kembali ke Profil</a>

    <article class="detail-card">
        <div class="detail-image">
            <img 
                src="{{ asset($pengalaman['gambar']) }}" 
                alt="{{ $pengalaman['judul'] }}"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
            >
            <div class="image-fallback large">✦</div>
        </div>

        <div class="detail-content">
            <p class="eyebrow">Detail Pengalaman</p>
            <h1>{{ $pengalaman['judul'] }}</h1>

            <div class="detail-meta">
                <span>{{ $pengalaman['waktu'] }}</span>
                <span>{{ $pengalaman['lokasi'] }}</span>
            </div>

            <div class="detail-block">
                <h2>Deskripsi Kegiatan</h2>
                <p>{{ $pengalaman['deskripsi'] }}</p>
            </div>

            <div class="detail-block">
                <h2>Kesan yang Dirasakan</h2>
                <p>{{ $pengalaman['kesan'] }}</p>
            </div>

            <div class="owner-note">
                <strong>Praktikan:</strong>
                {{ $praktikan['nama'] }} — {{ $praktikan['nim'] }}
            </div>
        </div>
    </article>
</section>
@endsection