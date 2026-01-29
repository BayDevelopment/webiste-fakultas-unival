{{-- resources/views/tentang.blade.php --}}
@extends('layouts.app')

@section('content')
    <main class="py-5 about-page">
        <div class="container">

            {{-- Tentang Kami --}}

            @if ($about)
                {{-- Header / Breadcrumb --}}
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                    <div>
                        <div class="text-muted small mb-1">
                            <a href="{{ url('/') }}" class="text-decoration-none text-muted">
                                {{ $about->breadcrumb_induk ?? 'Beranda' }}
                            </a>
                            <span class="mx-2">/</span>
                            <span class="text-muted">{{ $about->breadcrumb_aktif ?? 'Tentang' }}</span>
                        </div>

                        <h1 class="fw-bold about-title mb-1">
                            {{ $about->judul_halaman ?? 'Tentang' }}
                        </h1>

                        <p class="text-muted mb-0 about-subtitle">
                            {{ $about->subjudul_halaman }}
                        </p>
                    </div>
                </div>

                {{-- HERO --}}
                <section class="row g-4 align-items-center mb-5">
                    <div class="col-lg-6">
                        <div class="about-hero-card p-4 p-lg-5 h-100">
                            @if ($about->badge_hero)
                                <div class="badge about-badge mb-3">
                                    <i class="fa-solid fa-shield-halved me-2"></i> {{ $about->badge_hero }}
                                </div>
                            @endif

                            <h2 class="fw-bold mb-3 about-h2">
                                {{ $about->judul_hero }}
                            </h2>

                            <p class="text-muted mb-4">
                                {{ $about->deskripsi_hero }}
                            </p>

                            {{-- Tombol HERO (kalau kamu memang masih punya field tombol di tabel) --}}
                            <div class="d-flex flex-wrap gap-2">
                                @if (!empty($about->teks_tombol_utama) && !empty($about->url_tombol_utama))
                                    <a href="{{ $about->url_tombol_utama }}"
                                        class="btn btn-modern-primary fw-semibold px-3 py-2">
                                        <i class="fa-solid fa-graduation-cap me-2"></i> {{ $about->teks_tombol_utama }}
                                    </a>
                                @endif

                                @if (!empty($about->teks_tombol_sekunder) && !empty($about->url_tombol_sekunder))
                                    <a href="{{ $about->url_tombol_sekunder }}"
                                        class="btn btn-modern-primary fw-semibold px-3 py-2">
                                        <i class="fa-solid fa-calendar-check me-2"></i> {{ $about->teks_tombol_sekunder }}
                                    </a>
                                @endif
                            </div>

                            {{-- Keunggulan (dinamis dari DB) --}}
                            @if ($keunggulan->isNotEmpty())
                                <div class="about-mini mt-4">
                                    @foreach ($keunggulan as $item)
                                        <div class="about-mini-item">
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>{{ $item->judul }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-image-wrap h-100">
                            <img src="{{ $about->gambar_hero ? asset('storage/' . $about->gambar_hero) : asset('images/about-hero.jpg') }}"
                                alt="{{ $about->judul_halaman ?? 'Tentang' }}" class="about-image"
                                onerror="this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1400&q=70'; this.onerror=null;">
                            <div class="about-image-overlay"></div>

                            @if ($about->judul_kartu_hero || $about->subjudul_kartu_hero)
                                <div class="about-float-card">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="about-float-ic">
                                            <i class="fa-solid fa-bolt"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $about->judul_kartu_hero }}</div>
                                            <div class="text-muted small">{{ $about->subjudul_kartu_hero }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @else
                <div class="text-center py-5">
                    <p class="text-muted mb-0">Maaf, tidak ada data</p>
                </div>
            @endif

            {{-- PROFIL + VISI MISI --}}
            <section id="profil" class="mb-5">
                <div class="row g-3">
                    @if ($profil)
                        <div class="col-lg-5">
                            <div class="about-card p-4">
                                <div class="about-card-head mb-3">
                                    <div class="about-ic"><i class="fa-solid fa-building-columns"></i></div>
                                    <div>
                                        <div class="about-card-title">{{ $profil->judul }}</div>
                                        <div class="about-card-sub">{{ $profil->subjudul }}</div>
                                    </div>
                                </div>

                                <p class="text-muted mb-3">
                                    {{ $profil->title }}
                                </p>

                                @if ($profilKeunggulan->isNotEmpty())
                                    <div class="row g-3">
                                        @foreach ($profilKeunggulan as $item)
                                            <div class="col-6">
                                                <div class="about-pill">
                                                    <i class="{{ $item->icon }}"></i>
                                                    {{ $item->judul }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">Empty</p>
                        </div>
                    @endif

                    <div class="col-lg-7">
                        <div class="row g-4">
                            @if ($visi)
                                <div class="col-md-6">
                                    <div class="about-card p-4 h-100">
                                        <div class="about-card-head mb-3">
                                            <div class="about-ic"><i class="{{ $visi->icon }}"></i></div>
                                            <div>
                                                <div class="about-card-title">{{ $visi->judul }}</div>
                                                <div class="about-card-sub">{{ $visi->title }}</div>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-0">
                                            {{ $visi->deskripsi }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="about-card p-4 h-100">
                                        <div class="about-card-head mb-3">
                                            <div class="about-ic"><i class="fa-solid fa-list-check"></i></div>
                                            <div>
                                                <div class="about-card-title">{{ $visi->subjudul }}</div>
                                                <div class="about-card-sub">{{ $visi->subtitle }}</div>
                                            </div>
                                        </div>
                                        @if ($misi->isNotEmpty())
                                            <ul class="about-list text-muted mb-0">
                                                @foreach ($misi as $item)
                                                    <li>{{ $item->title }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted mb-0">Belum ada misi.</p>
                                        @endif
                                    </div>
                                </div>
                            @endif


                            <div class="col-12">
                                @if ($profil)
                                    <div class="about-card p-4">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                            <div>
                                                <div class="fw-bold mb-1">{{ $profil->subjudul_link }}</div>
                                                <div class="text-muted">{{ $profil->subtitle_link }}</div>
                                            </div>
                                            <a href="{{ $profil->link ?? '#' }}" class="btn btn-cta fw-semibold px-4 py-2">
                                                {{ $profil->subtext_link }} <i class="fa-solid fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </section>


            {{-- NILAI --}}
            @if ($NilaiUtama)
                <section class="mb-5">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div>
                            <h2 class="fw-bold mb-1 about-h3">Nilai Utama</h2>
                            <p class="text-muted mb-0">Prinsip yang jadi fondasi pembelajaran dan budaya.</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        @foreach ($NilaiUtama as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="about-card p-4 h-100">
                                    <div class="about-ic mb-3"><i class="{{ $item->icon }}"></i></div>
                                    <div class="fw-bold mb-1">{{ $item->judul }}</div>
                                    <div class="text-muted">{{ $item->deskripsi }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif


            {{-- Jumlah mahasiswa , mitra magang dan prestasi --}}
            @if ($overview_statistik)
                <section class="mb-5">
                    <div class="row g-4">
                        @foreach ($overview_statistik as $o)
                            <div class="col-md-4">
                                <div class="about-stat p-4 h-100">
                                    <div class="about-stat-ic">
                                        <i class="{{ $o->icon }}"></i>
                                    </div>

                                    <div class="about-stat-num counter" data-value="{{ $o->value }}"
                                        data-plus="{{ $o->show_plus ? '1' : '0' }}">
                                        0
                                    </div>

                                    <div class="text-muted">{{ $o->judul }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif



            {{-- TIM (opsional) --}}
            @if ($TimPengelola)
                <section class="mb-4" id="tim">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div>
                            <h2 class="fw-bold mb-1 about-h3">Tim Pengelola</h2>
                            <p class="text-muted mb-0">Dosen & pengelola yang mendampingi perjalanan belajar.</p>
                        </div>

                        <div class="d-flex gap-2">

                            <button class="btn btn-carousel-nav" type="button" data-team-dir="prev"
                                aria-label="Sebelumnya">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-carousel-nav" type="button" data-team-dir="next"
                                aria-label="Selanjutnya">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="team-wrap">
                        <div class="team-track" id="teamTrack">
                            @foreach ($TimPengelola as $t)
                                @php
                                    if (!empty($t->foto)) {
                                        $avatar = asset('storage/' . $t->foto);
                                    } else {
                                        $avatar =
                                            $t->jenis_kelamin === 'P'
                                                ? asset('images/p-avatars.jpg')
                                                : asset('images/l-avatars.jpg');
                                    }
                                @endphp

                                <article class="team-card">
                                    <div class="about-team p-4">
                                        <img class="about-team-ava" src="{{ $avatar }}"
                                            alt="{{ $t->nama }}">
                                        <div class="fw-bold mt-3 mb-1">{{ $t->nama }}</div>
                                        <div class="text-muted small">{{ $t->jabatan }}</div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            @push('scripts')
                <script>
                    (function() {
                        const track = document.getElementById('teamTrack');
                        if (!track) return;

                        const btns = document.querySelectorAll('[data-team-dir]');

                        // tombol next/prev
                        btns.forEach(btn => {
                            btn.addEventListener('click', () => {
                                const dir = btn.getAttribute('data-team-dir');
                                const card = track.querySelector('.team-card');
                                const step = (card?.offsetWidth || 280) + 16;
                                track.scrollBy({
                                    left: dir === 'next' ? step : -step,
                                    behavior: 'smooth'
                                });
                            });
                        });

                        function startAuto() {
                            return setInterval(() => {
                                const card = track.querySelector('.team-card');
                                const step = (card?.offsetWidth || 280) + 16;

                                track.scrollBy({
                                    left: step,
                                    behavior: 'smooth'
                                });

                                // balik ke awal kalau mentok (loop)
                                if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                                    track.scrollTo({
                                        left: 0,
                                        behavior: 'smooth'
                                    });
                                }
                            }, 3000);
                        }

                        let auto = startAuto();

                        // pause ketika hover / fokus
                        track.addEventListener('mouseenter', () => clearInterval(auto));
                        track.addEventListener('mouseleave', () => {
                            clearInterval(auto);
                            auto = startAuto();
                        });
                    })();
                </script>
            @endpush



            {{-- CTA bottom --}}
            <section class="about-cta p-4 p-lg-5 mt-5">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-1">Siap mulai perjalananmu di dunia digital?</h3>
                        <p class="text-muted mb-0">Lihat informasi PMB dan pilih program studi yang sesuai minatmu.</p>
                    </div>
                    <div class="col-lg-4 d-flex gap-2 justify-content-lg-end flex-wrap">
                        <a href="https://unival.siakadcloud.com/spmbfront/jalur-seleksi"
                            class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = parseInt(counter.dataset.value, 10);
                const showPlus = counter.dataset.plus === '1';

                let current = 0;
                const duration = 1200;
                const stepTime = 20;
                const steps = duration / stepTime;
                const increment = Math.ceil(target / steps);

                const timer = setInterval(() => {
                    current += increment;

                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }

                    counter.textContent =
                        current + (showPlus && current === target ? '+' : '');
                }, stepTime);
            });
        });
    </script>
@endpush
