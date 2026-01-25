{{-- resources/views/kegiatan.blade.php --}}
@extends('layouts.app')

@section('content')
    @php
        // slug penting buat link route/anchor (kalau page kegiatan per-prodi)
        $slug = $slug ?? (request()->route('slug') ?? 'kegiatan');

        // Data dari controller (fallback aman)
        // Struktur yang disarankan:
        // $kegiatan[] = [
        //   'id' => 1,
        //   'judul' => 'Seminar ...',
        //   'tanggal' => '2026-02-01', // Y-m-d
        //   'waktu' => '09:00 - 12:00',
        //   'lokasi' => 'Aula ...',
        //   'kategori' => 'Seminar',
        //   'status' => 'upcoming'|'done',
        //   'ringkas' => 'Deskripsi singkat...',
        //   'cover' => 'https://...jpg' atau asset('...'),
        //   'link' => route('kegiatan.show', [$slug, $id]) atau '#',
        //   'link_daftar' => 'https://...' atau null,
        // ];
        $kegiatan = $kegiatan ?? [];
        $kategoriList = $kategoriList ?? collect($kegiatan)->pluck('kategori')->filter()->unique()->values()->all();

        $upcoming = collect($kegiatan)
            ->filter(fn($k) => ($k['status'] ?? 'upcoming') === 'upcoming')
            ->sortBy(fn($k) => $k['tanggal'] ?? '9999-12-31')
            ->values()
            ->all();

        $done = collect($kegiatan)
            ->filter(fn($k) => ($k['status'] ?? 'upcoming') === 'done')
            ->sortByDesc(fn($k) => $k['tanggal'] ?? '0000-01-01')
            ->values()
            ->all();

        $gallery = $gallery ?? []; // optional: ['img'=>..., 'caption'=>...]
        $faq = $faq ?? [
            [
                'q' => 'Bagaimana cara daftar kegiatan?',
                'a' => 'Klik tombol "Daftar" pada kartu kegiatan yang tersedia, lalu isi formulir pendaftaran.',
            ],
            [
                'q' => 'Apakah ada sertifikat?',
                'a' => 'Tergantung jenis kegiatan. Informasi sertifikat dicantumkan pada detail kegiatan.',
            ],
            ['q' => 'Di mana informasi terbaru diumumkan?', 'a' => 'Pantau halaman ini atau kanal resmi kampus/prodi.'],
        ];

        // Link kalender: kalau route ada, pakai itu. Kalau belum, fallback ke section
        $kalenderUrl = \Illuminate\Support\Facades\Route::has('kegiatan.kalender')
            ? route('kegiatan.kalender', $slug)
            : '#kalender';

        $pageTitle = $pageTitle ?? 'Kegiatan';
        $pageTagline = $pageTagline ?? 'Agenda, seminar, workshop, dan kegiatan terbaru.';
        $heroCover = $heroCover ?? asset('images/kegiatan-cover.jpg');
        $heroCoverFallback =
            'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1400&q=70';
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Breadcrumb + Title --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">Informasi</span>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $pageTitle }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $pageTitle }}</h1>

                    <p class="text-muted mb-0 prodi-subtitle">
                        {{ $pageTagline }}
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="#mendatang" class="btn btn-see-all fw-semibold px-3 py-2">
                        Kegiatan Mendatang <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>

                    <a href="{{ $kalenderUrl }}" class="btn btn-cta fw-semibold px-4 py-2">
                        Lihat Kalender <i class="fa-solid fa-calendar-days ms-2"></i>
                    </a>
                </div>
            </div>

            {{-- HERO --}}
            <section class="row g-4 align-items-center mb-5">
                <div class="col-lg-7">
                    <div class="prodi-hero-card p-4 p-lg-5 h-100">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-bullhorn me-2"></i>
                                Update Agenda
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-users me-2"></i>
                                Terbuka untuk Mahasiswa
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-certificate me-2"></i>
                                Sertifikat (opsional)
                            </span>
                        </div>

                        <h2 class="fw-bold mb-3 prodi-h2">
                            Jangan ketinggalan kegiatan terbaru!
                        </h2>

                        <p class="text-muted mb-4">
                            Temukan seminar, workshop, pelatihan, dan agenda kampus lainnya. Gunakan filter kategori atau
                            cari
                            judul kegiatan untuk menemukan yang kamu butuhkan.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ count($upcoming) ?: '—' }}</div>
                                    <div class="text-muted small">Kegiatan Mendatang</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ count($kegiatan) ?: '—' }}</div>
                                    <div class="text-muted small">Total Kegiatan</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ count($kategoriList) ?: '—' }}</div>
                                    <div class="text-muted small">Kategori</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="#semua" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-layer-group me-2"></i> Lihat Semua
                            </a>
                            <a href="#galeri" class="btn btn-see-all fw-semibold px-3 py-2">
                                <i class="fa-solid fa-images me-2"></i> Dokumentasi
                            </a>
                        </div>

                        <div class="prodi-mini mt-4">
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Info cepat & ringkas</div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Link daftar langsung</div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Jadwal mudah dipantau
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="prodi-image-wrap h-100">
                        <img src="{{ $heroCover }}" alt="Cover Kegiatan" class="prodi-image"
                            onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                        <div class="prodi-image-overlay"></div>

                        <div class="prodi-float-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="prodi-float-ic"><i class="fa-solid fa-bolt"></i></div>
                                <div>
                                    <div class="fw-bold">Stay updated</div>
                                    <div class="text-muted small">Agenda resmi & informasi pendaftaran.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Quick Nav --}}
            <section class="mb-4">
                <div class="prodi-nav p-3">
                    <a class="prodi-nav-link" href="#mendatang"><i class="fa-solid fa-calendar-check me-2"></i>Mendatang</a>
                    <a class="prodi-nav-link" href="#semua"><i class="fa-solid fa-list me-2"></i>Semua Kegiatan</a>
                    <a class="prodi-nav-link" href="#kalender"><i class="fa-solid fa-calendar-days me-2"></i>Kalender</a>
                    <a class="prodi-nav-link" href="#galeri"><i class="fa-solid fa-images me-2"></i>Galeri</a>
                    <a class="prodi-nav-link" href="#faq"><i class="fa-solid fa-circle-question me-2"></i>FAQ</a>
                </div>
            </section>

            {{-- KEGIATAN MENDATANG (carousel) --}}
            <section id="mendatang" class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 prodi-h3">Kegiatan Mendatang</h2>
                        <p class="text-muted mb-0">Agenda yang akan berlangsung dalam waktu dekat.</p>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-carousel-nav" type="button" data-kegiatan-dir="prev"
                            aria-label="Sebelumnya">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-carousel-nav" type="button" data-kegiatan-dir="next"
                            aria-label="Selanjutnya">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                @if (count($upcoming))
                    <div class="team-wrap">
                        <div class="team-track" id="kegiatanTrack">
                            @foreach ($upcoming as $k)
                                @php
                                    $tgl = $k['tanggal'] ?? null;
                                    $tglText = $tgl ? \Carbon\Carbon::parse($tgl)->translatedFormat('d M Y') : 'TBA';
                                    $kat = $k['kategori'] ?? 'Umum';
                                    $cover =
                                        $k['cover'] ??
                                        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=70';
                                    $link = $k['link'] ?? '#';
                                    $daftar = $k['link_daftar'] ?? null;
                                @endphp

                                <article class="team-card kegiatan-card" data-kategori="{{ strtolower($kat) }}"
                                    data-judul="{{ strtolower($k['judul'] ?? '') }}">
                                    <div class="about-team p-4">
                                        <div class="kegiatan-cover mb-3"
                                            style="border-radius:16px; overflow:hidden; position:relative;">
                                            <img src="{{ $cover }}" alt="{{ $k['judul'] ?? 'Kegiatan' }}"
                                                style="width:100%; height:180px; object-fit:cover;"
                                                onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                                            <div
                                                style="position:absolute; inset:0; background:linear-gradient(180deg, rgba(13,110,253,.10), rgba(11,18,32,.55));">
                                            </div>
                                            <span class="badge prodi-badge"
                                                style="position:absolute; left:12px; bottom:12px;">
                                                <i class="fa-solid fa-tag me-2"></i>{{ $kat }}
                                            </span>
                                        </div>

                                        <div class="fw-bold mb-1" style="line-height:1.25;">
                                            {{ $k['judul'] ?? 'Judul Kegiatan' }}
                                        </div>

                                        <div class="text-muted small mb-2">
                                            <i class="fa-regular fa-calendar me-2"></i>{{ $tglText }}
                                            @if (!empty($k['waktu']))
                                                <span class="mx-2">•</span>
                                                <i class="fa-regular fa-clock me-2"></i>{{ $k['waktu'] }}
                                            @endif
                                        </div>

                                        @if (!empty($k['lokasi']))
                                            <div class="text-muted small mb-3">
                                                <i class="fa-solid fa-location-dot me-2"></i>{{ $k['lokasi'] }}
                                            </div>
                                        @endif

                                        <p class="text-muted mb-3"
                                            style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                                            {{ $k['ringkas'] ?? 'Deskripsi singkat kegiatan.' }}
                                        </p>

                                        <div class="d-flex gap-2 flex-wrap">
                                            <a href="{{ $link }}"
                                                class="btn btn-modern-primary fw-semibold px-3 py-2">
                                                Detail <i class="fa-solid fa-arrow-right ms-2"></i>
                                            </a>
                                            @if ($daftar)
                                                <a href="{{ $daftar }}" class="btn btn-cta fw-semibold px-3 py-2">
                                                    Daftar <i class="fa-solid fa-pen-to-square ms-2"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="prodi-card p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="prodi-ic"><i class="fa-solid fa-circle-info"></i></div>
                            <div>
                                <div class="prodi-card-title">Belum ada kegiatan mendatang</div>
                                <div class="text-muted">Nanti kalau sudah ada, bakal tampil di sini.</div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>

            {{-- SEMUA KEGIATAN (filter + list) --}}
            <section id="semua" class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="prodi-card p-4 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-filter"></i></div>
                                <div>
                                    <div class="prodi-card-title">Filter Kegiatan</div>
                                    <div class="prodi-card-sub">Cari cepat berdasarkan judul & kategori</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small mb-2 d-block">Cari judul</label>
                                <input id="kegiatanSearch" type="text" class="form-control"
                                    placeholder="Contoh: seminar, workshop, lomba..." autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label class="text-muted small mb-2 d-block">Kategori</label>
                                <div class="d-flex flex-wrap gap-2" id="kategoriPills">
                                    <button type="button"
                                        class="btn btn-see-all fw-semibold px-3 py-2 kategori-pill active" data-kat="all">
                                        Semua
                                    </button>
                                    @foreach ($kategoriList as $kat)
                                        <button type="button" class="btn btn-see-all fw-semibold px-3 py-2 kategori-pill"
                                            data-kat="{{ strtolower($kat) }}">
                                            {{ $kat }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="text-muted small">
                                Tips: klik kategori + ketik kata kunci biar hasilnya makin spesifik.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="prodi-card p-4 p-lg-5">
                            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                                <div class="prodi-card-head mb-0">
                                    <div class="prodi-ic"><i class="fa-solid fa-list"></i></div>
                                    <div>
                                        <div class="prodi-card-title">Daftar Kegiatan</div>
                                        <div class="prodi-card-sub">Mendatang & dokumentasi kegiatan sebelumnya</div>
                                    </div>
                                </div>

                                <span class="text-muted small">
                                    <span id="kegiatanCount">{{ count($kegiatan) }}</span> kegiatan
                                </span>
                            </div>

                            <div class="row g-3" id="kegiatanGrid">
                                @foreach ($kegiatan as $k)
                                    @php
                                        $tgl = $k['tanggal'] ?? null;
                                        $tglText = $tgl
                                            ? \Carbon\Carbon::parse($tgl)->translatedFormat('d M Y')
                                            : 'TBA';
                                        $kat = $k['kategori'] ?? 'Umum';
                                        $cover =
                                            $k['cover'] ??
                                            'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=70';
                                        $link = $k['link'] ?? '#';
                                        $daftar = $k['link_daftar'] ?? null;
                                        $status = $k['status'] ?? 'upcoming';
                                    @endphp

                                    <div class="col-12">
                                        <article class="prodi-file kegiatan-item" data-kategori="{{ strtolower($kat) }}"
                                            data-judul="{{ strtolower($k['judul'] ?? '') }}"
                                            data-status="{{ $status }}">
                                            <div class="d-flex gap-3 align-items-start">
                                                <div style="width:92px; flex:0 0 92px;">
                                                    <img src="{{ $cover }}" alt="{{ $k['judul'] ?? 'Kegiatan' }}"
                                                        style="width:92px; height:92px; object-fit:cover; border-radius:14px;"
                                                        onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                                                </div>

                                                <div class="flex-grow-1">
                                                    <div class="d-flex flex-wrap gap-2 align-items-center mb-1">
                                                        <span class="badge prodi-badge">
                                                            <i class="fa-solid fa-tag me-2"></i>{{ $kat }}
                                                        </span>
                                                        <span class="badge prodi-badge">
                                                            @if ($status === 'done')
                                                                <i class="fa-solid fa-check me-2"></i>Selesai
                                                            @else
                                                                <i class="fa-solid fa-clock me-2"></i>Mendatang
                                                            @endif
                                                        </span>
                                                    </div>

                                                    <div class="fw-bold mb-1">{{ $k['judul'] ?? 'Judul Kegiatan' }}</div>

                                                    <div class="text-muted small mb-2">
                                                        <i class="fa-regular fa-calendar me-2"></i>{{ $tglText }}
                                                        @if (!empty($k['waktu']))
                                                            <span class="mx-2">•</span>
                                                            <i class="fa-regular fa-clock me-2"></i>{{ $k['waktu'] }}
                                                        @endif
                                                        @if (!empty($k['lokasi']))
                                                            <span class="mx-2">•</span>
                                                            <i
                                                                class="fa-solid fa-location-dot me-2"></i>{{ $k['lokasi'] }}
                                                        @endif
                                                    </div>

                                                    @if (!empty($k['ringkas']))
                                                        <div class="text-muted small"
                                                            style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                                            {{ $k['ringkas'] }}
                                                        </div>
                                                    @endif

                                                    <div class="d-flex gap-2 flex-wrap mt-3">
                                                        <a href="{{ $link }}"
                                                            class="btn btn-modern-primary fw-semibold px-3 py-2">
                                                            Detail <i class="fa-solid fa-arrow-right ms-2"></i>
                                                        </a>
                                                        @if ($daftar && $status !== 'done')
                                                            <a href="{{ $daftar }}"
                                                                class="btn btn-cta fw-semibold px-3 py-2">
                                                                Daftar <i class="fa-solid fa-pen-to-square ms-2"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <i class="fa-solid fa-arrow-right text-muted"></i>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-muted small mt-3" id="kegiatanEmpty" style="display:none;">
                                Tidak ada kegiatan yang cocok dengan filter kamu.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- KALENDER --}}
            <section id="kalender" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div class="prodi-card-head mb-0">
                            <div class="prodi-ic"><i class="fa-solid fa-calendar-days"></i></div>
                            <div>
                                <div class="prodi-card-title">Kalender Kegiatan</div>
                                <div class="prodi-card-sub">Pantau jadwal dalam format kalender</div>
                            </div>
                        </div>

                        @if (\Illuminate\Support\Facades\Route::has('kegiatan.kalender'))
                            <a href="{{ route('kegiatan.kalender', $slug) }}"
                                class="btn btn-see-all fw-semibold px-3 py-2">
                                Buka Kalender <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        @endif
                    </div>

                    {{-- Opsi 1: embed google calendar (controller: $googleCalendarEmbed) --}}
                    @if (!empty($googleCalendarEmbed))
                        <div class="ratio ratio-16x9">
                            {!! $googleCalendarEmbed !!}
                        </div>
                    @else
                        {{-- Opsi 2: list ringkas (tanpa embed) --}}
                        <div class="row g-3">
                            @forelse (array_slice($upcoming, 0, 6) as $k)
                                @php
                                    $tgl = $k['tanggal'] ?? null;
                                    $tglText = $tgl ? \Carbon\Carbon::parse($tgl)->translatedFormat('l, d M Y') : 'TBA';
                                @endphp
                                <div class="col-md-6">
                                    <div class="prodi-pill">
                                        <i class="fa-regular fa-calendar"></i>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">{{ $k['judul'] ?? 'Kegiatan' }}</span>
                                            <span class="text-muted small">{{ $tglText }} @if (!empty($k['waktu']))
                                                    • {{ $k['waktu'] }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="text-muted">Belum ada jadwal yang bisa ditampilkan.</div>
                                </div>
                            @endforelse
                        </div>

                        <div class="text-muted small mt-3">
                            *Kalau mau versi kalender penuh, kamu bisa pasang embed Google Calendar via controller ke
                            variabel <code>$googleCalendarEmbed</code>.
                        </div>
                    @endif
                </div>
            </section>

            {{-- GALERI --}}
            <section id="galeri" class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 prodi-h3">Galeri Dokumentasi</h2>
                        <p class="text-muted mb-0">Foto kegiatan sebelumnya (opsional).</p>
                    </div>
                </div>

                @if (count($gallery))
                    <div class="row g-3">
                        @foreach ($gallery as $g)
                            @php
                                $img = $g['img'] ?? $heroCoverFallback;
                                $cap = $g['caption'] ?? 'Dokumentasi';
                            @endphp
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="javascript:void(0)" class="kegiatan-gallery" data-img="{{ $img }}"
                                    data-cap="{{ e($cap) }}">
                                    <div class="prodi-card p-2" style="overflow:hidden;">
                                        <img src="{{ $img }}" alt="{{ $cap }}"
                                            style="width:100%; height:170px; object-fit:cover; border-radius:14px;"
                                            onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    {{-- Modal sederhana --}}
                    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="border-radius:18px; overflow:hidden;">
                                <div class="modal-body p-0">
                                    <img id="galleryModalImg" src="" alt="Dokumentasi"
                                        style="width:100%; height:auto; display:block;">
                                    <div class="p-3">
                                        <div class="fw-semibold" id="galleryModalCap">Dokumentasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="prodi-card p-4">
                        <div class="text-muted">Belum ada dokumentasi. Nanti kalau sudah ada, tampil di sini.</div>
                    </div>
                @endif
            </section>

            {{-- FAQ --}}
            <section id="faq" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="prodi-card-head mb-3">
                        <div class="prodi-ic"><i class="fa-solid fa-circle-question"></i></div>
                        <div>
                            <div class="prodi-card-title">Pertanyaan yang Sering Ditanya</div>
                            <div class="prodi-card-sub">Biar kamu nggak bingung</div>
                        </div>
                    </div>

                    <div class="accordion" id="faqAccordion">
                        @foreach ($faq as $i => $f)
                            <div class="accordion-item" style="border-radius:14px; overflow:hidden; margin-bottom:10px;">
                                <h2 class="accordion-header" id="h{{ $i }}">
                                    <button class="accordion-button {{ $i ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#c{{ $i }}"
                                        aria-expanded="{{ $i ? 'false' : 'true' }}"
                                        aria-controls="c{{ $i }}">
                                        {{ $f['q'] ?? 'Pertanyaan' }}
                                    </button>
                                </h2>
                                <div id="c{{ $i }}"
                                    class="accordion-collapse collapse {{ $i ? '' : 'show' }}"
                                    aria-labelledby="h{{ $i }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted">
                                        {{ $f['a'] ?? 'Jawaban.' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- CTA --}}
            <section class="prodi-cta p-4 p-lg-5">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-1">Mau ikut kegiatan berikutnya?</h3>
                        <p class="text-muted mb-0">Pantau agenda terbaru dan daftar sebelum kuota penuh.</p>
                    </div>
                    <div class="col-lg-4 d-flex gap-2 justify-content-lg-end flex-wrap">
                        <a href="#mendatang" class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                            Lihat yang Mendatang <i class="fa-solid fa-arrow-right ms-2"></i>
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
            // ===== Carousel "mendatang" (mirip dosen) =====
            const track = document.getElementById('kegiatanTrack');
            if (track) {
                const btns = document.querySelectorAll('[data-kegiatan-dir]');

                btns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const dir = btn.getAttribute('data-kegiatan-dir');
                        const card = track.querySelector('.team-card');
                        const step = (card?.offsetWidth || 320) + 16;

                        track.scrollBy({
                            left: dir === 'next' ? step : -step,
                            behavior: 'smooth'
                        });
                    });
                });

                function startAuto() {
                    return setInterval(() => {
                        const card = track.querySelector('.team-card');
                        const step = (card?.offsetWidth || 320) + 16;

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
                    }, 3500);
                }

                let auto = startAuto();
                track.addEventListener('mouseenter', () => clearInterval(auto));
                track.addEventListener('mouseleave', () => {
                    clearInterval(auto);
                    auto = startAuto();
                });
            }

            // ===== Filter (search + kategori) =====
            const searchInput = document.getElementById('kegiatanSearch');
            const grid = document.getElementById('kegiatanGrid');
            const countEl = document.getElementById('kegiatanCount');
            const emptyEl = document.getElementById('kegiatanEmpty');
            const pillWrap = document.getElementById('kategoriPills');

            let activeKat = 'all';

            function setActivePill(kat) {
                if (!pillWrap) return;
                pillWrap.querySelectorAll('.kategori-pill').forEach(p => p.classList.remove('active'));
                const btn = pillWrap.querySelector(`[data-kat="${kat}"]`);
                if (btn) btn.classList.add('active');
            }

            function applyFilter() {
                if (!grid) return;

                const q = (searchInput?.value || '').trim().toLowerCase();
                let visible = 0;

                grid.querySelectorAll('.kegiatan-item').forEach(item => {
                    const judul = item.getAttribute('data-judul') || '';
                    const kat = item.getAttribute('data-kategori') || '';

                    const okKat = activeKat === 'all' ? true : kat === activeKat;
                    const okQ = q ? judul.includes(q) : true;

                    const show = okKat && okQ;
                    item.style.display = show ? '' : 'none';
                    if (show) visible++;
                });

                if (countEl) countEl.textContent = String(visible);
                if (emptyEl) emptyEl.style.display = visible ? 'none' : 'block';
            }

            if (pillWrap) {
                pillWrap.addEventListener('click', (e) => {
                    const btn = e.target.closest('.kategori-pill');
                    if (!btn) return;
                    activeKat = btn.getAttribute('data-kat') || 'all';
                    setActivePill(activeKat);
                    applyFilter();
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', applyFilter);
            }

            // init
            setActivePill('all');
            applyFilter();

            // ===== Gallery modal sederhana (butuh Bootstrap JS) =====
            document.querySelectorAll('.kegiatan-gallery').forEach(el => {
                el.addEventListener('click', () => {
                    const img = el.getAttribute('data-img');
                    const cap = el.getAttribute('data-cap');

                    const modalImg = document.getElementById('galleryModalImg');
                    const modalCap = document.getElementById('galleryModalCap');

                    if (modalImg) modalImg.src = img || '';
                    if (modalCap) modalCap.textContent = cap || 'Dokumentasi';

                    const modalEl = document.getElementById('galleryModal');
                    if (modalEl && window.bootstrap) {
                        const modal = new bootstrap.Modal(modalEl);
                        modal.show();
                    }
                });
            });
        })();
    </script>
@endpush
