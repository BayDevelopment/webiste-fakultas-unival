<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Basic SEO --}}
    <title>{{ $title ?? 'Fakultas Ilmu Komputer' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Website resmi Fakultas Ilmu Komputer. Informasi akademik, program studi, berita, agenda, dan layanan.' }}">
    <meta name="keywords"
        content="Fakultas Ilmu Komputer, FIK, Informatika, Sistem Informasi, Kampus swasta terbaik cilegon, fik unival, Akademik">
    <meta name="author" content="Bayu Albar Ladici">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    {{-- Open Graph (Facebook/WhatsApp/LinkedIn) --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Fakultas Ilmu Komputer' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Website resmi Fakultas Ilmu Komputer. Informasi akademik, program studi, berita, agenda, dan layanan.' }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:site_name" content="Fakultas Ilmu Komputer">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/logo-unival.webp') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Fakultas Ilmu Komputer' }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'Website resmi Fakultas Ilmu Komputer, Universitas Al-Khairiyah.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/logo-unival.webp') }}">

    {{-- Optional: theme color for mobile browser --}}
    <meta name="theme-color" content="#0ea5e9">

    {{-- Favicons --}}
    <link rel="icon" href="{{ asset('images/logo-unival.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-unival.webp') }}">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>


<body class="d-flex flex-column min-vh-100">
    @stack('styles')
    <header>
        @include('components.navbar')
    </header>

    <main class="flex-grow-1 py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('components.footer')


    @php
    $waNumber = ($Chat ?? null)?->no_whatsapp;
    @endphp

    @if ($waNumber)
        {{-- Floating WhatsApp Widget --}}
        <div id="waWidget" class="wa-widget">

            <button id="waToggle" class="wa-toggle" type="button">
                <i class="fa-brands fa-whatsapp"></i>
            </button>

            <div id="waCard" class="wa-card shadow">

                <div class="wa-header">
                    <div class="wa-title">
                        <strong>{{ $Chat->nama ?? 'Admin' }}</strong>
                        <small>{{ $Chat->jabatan ?? 'Online' }}</small>
                    </div>

                    <button id="waClose" class="wa-close" type="button">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="wa-body">
                    <div class="wa-bubble wa-left">
                        Halo 👋 ada yang bisa kami bantu?
                    </div>
                </div>

                <div class="wa-footer">
                    <form id="waForm" class="wa-form" data-phone="{{ $waNumber }}">
                        <input type="text" id="waMessage" class="wa-input" placeholder="Ketik pesan..." required>
                        <button class="wa-send" type="submit">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @endif




    @stack('scripts')
</body>



</html>
