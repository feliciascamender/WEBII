<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MODUL6 Profile' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="star-field"></div>
    <div class="aurora aurora-one"></div>
    <div class="aurora aurora-two"></div>

    <header class="navbar">
        <a href="{{ route('beranda') }}" class="brand">
            <span class="brand-orbit"></span>
            <span>MODUL6</span>
        </a>

        <nav class="nav-menu">
            <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                Profil
            </a>
        </nav>
    </header>

    <main class="page-shell">
        @yield('content')
    </main>

    <footer class="footer">
        <p>Praktikum Web II Modul 6 • Laravel MVC</p>
    </footer>
</body>
</html>