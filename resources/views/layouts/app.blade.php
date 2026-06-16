<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="preconnect" href=
    "https://fonts.googleapis.com">
    <link href=
    "https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,600;1,400&family=Cinzel:wght@400;600&display=swap" 
    rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="header">
        <a href="{{ route('dashboard') }}" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <div style="display:flex; align-items:center; gap:16px;">
            <span style="color:#a08060; font-size:13px;">
                ✦ {{ session('username') }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="header-back">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div>
        @yield('content')
    </div>

</body>
</html>
