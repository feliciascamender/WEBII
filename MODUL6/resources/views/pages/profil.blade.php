@extends('layouts.app', ['title' => 'Profil | MODUL6'])

@section('content')
<section class="profile-section">
    <div class="profile-card">
        <div class="profile-image-wrap">
            <img 
                src="{{ asset($praktikan['gambar']) }}" 
                alt="Foto {{ $praktikan['nama'] }}"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
            >
            <div class="image-fallback">
                {{ substr($praktikan['nama'], 0, 1) }}
            </div>
        </div>

        <div class="profile-content">
            <p class="eyebrow">Profil Praktikan</p>
            <h1>{{ $praktikan['nama'] }}</h1>
            <p class="profile-bio">{{ $praktikan['bio'] }}</p>

            <div class="profile-info-grid">
                <div>
                    <span>NIM</span>
                    <strong>{{ $praktikan['nim'] }}</strong>
                </div>
                <div>
                    <span>Asal Prodi</span>
                    <strong>{{ $praktikan['prodi'] }}</strong>
                </div>
                <div>
                    <span>Email</span>
                    <strong>{{ $praktikan['email'] }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="two-column">
        <div class="glass-panel">
            <h2>Hobi</h2>
            <div class="chip-list">
                @foreach ($praktikan['hobi'] as $hobi)
                    <span class="chip">{{ $hobi }}</span>
                @endforeach
            </div>
        </div>

        <div class="glass-panel">
            <h2>Skill</h2>
            <div class="chip-list">
                @foreach ($praktikan['skill'] as $skill)
                    <span class="chip">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <section class="experience-section">
        <div class="section-heading">
            <p class="eyebrow">Memorable Journey</p>
            <h2>4 Pengalaman Paling Berkesan Selama Kuliah</h2>
        </div>

        <div class="experience-grid">
            @foreach ($pengalaman as $item)
                <a href="{{ route('pengalaman.detail', $item['slug']) }}" class="experience-card">
                    <div class="experience-image">
                        <img 
                            src="{{ asset($item['gambar']) }}" 
                            alt="{{ $item['judul'] }}"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                        >
                        <div class="image-fallback small">✦</div>
                    </div>

                    <div class="experience-body">
                        <span>{{ $item['waktu'] }}</span>
                        <h3>{{ $item['judul'] }}</h3>
                        <p>{{ $item['ringkasan'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</section>
@endsection