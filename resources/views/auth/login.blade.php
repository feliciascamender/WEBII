<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,600;1,400&family=Cinzel:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="header">
        <a href="{{ route('login') }}" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <div class="header-ornament">⊹ ⊹ ⊹</div>
    </div>

    <div class="container-sm">
        <div class="card" style="margin-top: 60px;">

            <div class="card-title">Login</div>

            {{-- Pesan: belum login (dari middleware) --}}
            @if (session('warning'))
                <div class="alert-error">
                    ⚠ {{ session('warning') }}
                </div>
            @endif

            {{-- Pesan: email atau password salah --}}
            @if (session('error'))
                <div class="alert-error">
                    ✕ {{ session('error') }}
                </div>
            @endif

            {{-- Pesan: logout berhasil --}}
            @if (session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            {{-- Validasi input kosong --}}
            @if ($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <div>✕ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                    >
                    {{-- old('email') supaya email tidak hilang saat error --}}
                </div>

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                    >
                </div>

                <button type="submit" class="btn-submit">
                    ✦ Masuk
                </button>

            </form>

        </div>
    </div>

</body>
</html>