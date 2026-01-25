{{-- resources/views/profile-prodi.blade.php --}}
@extends('layouts.app')

@section('content')
    @php
        // slug penting buat link route/anchor
        $slug = $prodi['slug'] ?? (request()->route('slug') ?? 'prodi');

        // highlights & karier dari controller (fallback kalau kosong)
        $highlights = $prodi['highlights'] ?? [
            ['icon' => 'fa-solid fa-circle-check', 'text' => 'Kurikulum relevan kebutuhan industri'],
            ['icon' => 'fa-solid fa-circle-check', 'text' => 'Pembelajaran berbasis praktik & proyek'],
        ];

        $karier = $prodi['karier_list'] ?? ['Bidang karier sesuai kompetensi prodi'];

        // Link akreditasi: kalau route ada, pakai itu. Kalau belum, fallback ke section
        $akreditasiUrl = \Illuminate\Support\Facades\Route::has('prodi.akreditasi')
            ? route('prodi.akreditasi', $slug)
            : '#akreditasi';
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Breadcrumb + Title --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">Program Studi</span>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $prodi['nama'] ?? 'Profil Prodi' }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $prodi['nama'] ?? 'Profil Program Studi' }}</h1>

                    <p class="text-muted mb-0 prodi-subtitle">
                        {{ $prodi['tagline'] ?? 'Profil program studi.' }}
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="#dosen" class="btn btn-see-all fw-semibold px-3 py-2">
                        Lihat Dosen <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>

                    <a href="{{ $prodi['link_pmb'] ?? '#pmb' }}" class="btn btn-cta fw-semibold px-4 py-2">
                        Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            {{-- HERO --}}
            <section class="row g-4 align-items-center mb-5">
                <div class="col-lg-7">
                    <div class="prodi-hero-card p-4 p-lg-5 h-100">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-graduation-cap me-2"></i>
                                {{ $prodi['jenjang'] ?? 'S1/D3' }}
                            </span>

                            {{-- fokus & karier badge tidak ada di controller → fallback aman --}}
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-layer-group me-2"></i>
                                {{ $prodi['fokus'] ?? 'Profil & Kurikulum' }}
                            </span>

                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-briefcase me-2"></i>
                                {{ $prodi['karier'] ?? 'Prospek Karier' }}
                            </span>
                        </div>

                        <h2 class="fw-bold mb-3 prodi-h2">
                            {{ $prodi['headline'] ?? 'Informasi program studi.' }}
                        </h2>

                        <p class="text-muted mb-4">
                            {{ $prodi['deskripsi'] ?? 'Deskripsi singkat program studi.' }}
                        </p>

                        {{-- stat belum ada di controller → fallback --}}
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $prodi['stat_mk'] ?? '—' }}</div>
                                    <div class="text-muted small">Mata Kuliah Inti</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $prodi['stat_lab'] ?? '—' }}</div>
                                    <div class="text-muted small">Lab & Komunitas</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $prodi['stat_mitra'] ?? '—' }}</div>
                                    <div class="text-muted small">Mitra Industri</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="{{ $akreditasiUrl }}" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-certificate me-2"></i> Akreditasi
                            </a>
                        </div>

                        <div class="prodi-mini mt-4">
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Project Based Learning
                            </div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Mentoring & Komunitas
                            </div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Career Preparation</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="prodi-image-wrap h-100">
                        <img src="{{ $prodi['cover'] ?? asset('images/prodi-cover.jpg') }}" alt="Cover Prodi"
                            class="prodi-image"
                            onerror="this.src='https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=1400&q=70'; this.onerror=null;">
                        <div class="prodi-image-overlay"></div>

                        <div class="prodi-float-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="prodi-float-ic"><i class="fa-solid fa-bolt"></i></div>
                                <div>
                                    <div class="fw-bold">{{ $prodi['float_title'] ?? 'Learning that matters' }}</div>
                                    <div class="text-muted small">
                                        {{ $prodi['float_desc'] ?? 'Skill, portofolio, dan mindset industri.' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Quick Nav --}}
            <section class="mb-4">
                <div class="prodi-nav p-3">
                    <a class="prodi-nav-link" href="#profil"><i class="fa-solid fa-user-astronaut me-2"></i>Profil</a>
                    <a class="prodi-nav-link" href="#sejarah"><i class="fa-solid fa-clock-rotate-left me-2"></i>Sejarah</a>
                    <a class="prodi-nav-link" href="#visi-misi"><i class="fa-solid fa-bullseye me-2"></i>Visi & Misi</a>
                    <a class="prodi-nav-link" href="#sk"><i class="fa-solid fa-file-signature me-2"></i>SK</a>
                    <a class="prodi-nav-link" href="#dosen"><i class="fa-solid fa-chalkboard-user me-2"></i>Dosen</a>
                </div>
            </section>

            {{-- PROFIL --}}
            <section id="profil" class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="prodi-card p-4 p-lg-5 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-id-card"></i></div>
                                <div>
                                    <div class="prodi-card-title">Profil Program Studi</div>
                                    <div class="prodi-card-sub">Gambaran umum dan fokus pembelajaran</div>
                                </div>
                            </div>

                            <p class="text-muted mb-3">
                                {{ $prodi['profil'] ?? 'Silakan isi profil lengkap prodi (bisa nanti dari DB/Filament).' }}
                            </p>

                            <div class="row g-3">
                                @foreach ($highlights as $h)
                                    <div class="col-md-6">
                                        <div class="prodi-pill">
                                            <i class="{{ $h['icon'] }}"></i>
                                            <span>{{ $h['text'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="prodi-card p-4 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-briefcase"></i></div>
                                <div>
                                    <div class="prodi-card-title">Prospek Karier</div>
                                    <div class="prodi-card-sub">Contoh bidang kerja lulusan</div>
                                </div>
                            </div>

                            <ul class="prodi-list text-muted mb-0">
                                @foreach ($karier as $k)
                                    <li>{{ $k }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SEJARAH --}}
            <section id="sejarah" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="prodi-card-head mb-3">
                        <div class="prodi-ic"><i class="fa-solid fa-clock-rotate-left"></i></div>
                        <div>
                            <div class="prodi-card-title">Sejarah</div>
                            <div class="prodi-card-sub">Perjalanan singkat program studi</div>
                        </div>
                    </div>
                    <p class="text-muted mb-0">
                        {{ $prodi['sejarah'] ?? 'Tuliskan sejarah prodi di sini (bisa nanti dari DB/Filament).' }}
                    </p>
                </div>
            </section>

            {{-- VISI & MISI --}}
            <section id="visi-misi" class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="prodi-card p-4 p-lg-5 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-bullseye"></i></div>
                                <div>
                                    <div class="prodi-card-title">Visi</div>
                                    <div class="prodi-card-sub">Arah besar yang dituju</div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">
                                {{ $prodi['visi'] ?? 'Menjadi Program Studi Teknik Informatika yang unggul dalam bidang Teknologi Informasi pada tahun 2030 di Banten.' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="prodi-card p-4 p-lg-5 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-list-check"></i></div>
                                <div>
                                    <div class="prodi-card-title">Misi</div>
                                    <div class="prodi-card-sub">Yang dikerjakan untuk mewujudkan visi</div>
                                </div>
                            </div>

                            @php
                                $misi = $prodi['misi'] ?? [
                                    'Menyelenggarakan pendidikan yang relevan dan adaptif.',
                                    'Mengembangkan riset/penerapan sesuai kebutuhan.',
                                    'Membangun kolaborasi dan pengabdian masyarakat.',
                                ];
                            @endphp

                            <ul class="prodi-list text-muted mb-0">
                                @foreach ($misi as $m)
                                    <li>{{ $m }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SK --}}
            <section id="sk" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div class="prodi-card-head mb-0">
                            <div class="prodi-ic"><i class="fa-solid fa-file-signature"></i></div>
                            <div>
                                <div class="prodi-card-title">SK Perguruan Tinggi</div>
                                <div class="prodi-card-sub">Dokumen/legalitas terkait prodi</div>
                            </div>
                        </div>

                        <a href="{{ $prodi['sk_link_all'] ?? '#' }}" class="btn btn-see-all fw-semibold px-3 py-2">
                            Unduh Semua <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>

                    <div class="row g-3">
                        @foreach ($skList as $sk)
                            <div class="col-md-6">
                                <a href="{{ $sk['file'] }}"
                                    class="prodi-file d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="prodi-file-ic"><i class="fa-solid fa-file-pdf"></i></div>
                                        <div>
                                            <div class="fw-bold">{{ $sk['judul'] }}</div>
                                            <div class="text-muted small">{{ $sk['nomor'] }}</div>
                                        </div>
                                    </div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-muted small mt-3">
                        *Jika file belum tersedia, arahkan ke Google Drive / PDF resmi.
                    </div>
                </div>
            </section>

            {{-- DOSEN (auto-scroll) --}}
            <section id="dosen" class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 prodi-h3">Dosen</h2>
                        <p class="text-muted mb-0">Pengajar dan pembina yang mendampingi perjalanan belajar.</p>
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
                        @foreach ($dosen as $t)
                            <article class="team-card">
                                <div class="about-team p-4">
                                    <img class="about-team-ava" src="{{ $t['img'] }}" alt="{{ $t['name'] }}">
                                    <div class="fw-bold mt-3 mb-1">{{ $t['name'] }}</div>
                                    <div class="text-muted small">{{ $t['role'] }}</div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- CTA --}}
            <section class="prodi-cta p-4 p-lg-5">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-1">Tertarik bergabung di {{ $prodi['nama'] ?? 'Program Studi ini' }}?</h3>
                        <p class="text-muted mb-0">Cek informasi pendaftaran dan pilih jalur masuk yang sesuai.</p>
                    </div>
                    <div class="col-lg-4 d-flex gap-2 justify-content-lg-end flex-wrap">
                        <a href="{{ $prodi['link_pmb'] ?? '#pmb' }}"
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
        (function() {
            const track = document.getElementById('teamTrack');
            if (!track) return;

            const btns = document.querySelectorAll('[data-team-dir]');

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

                    if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                        track.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    }
                }, 3000);
            }

            let auto = startAuto();
            track.addEventListener('mouseenter', () => clearInterval(auto));
            track.addEventListener('mouseleave', () => {
                clearInterval(auto);
                auto = startAuto();
            });
        })();
    </script>
@endpush
