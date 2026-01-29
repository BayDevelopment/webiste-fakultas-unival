@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    @if ($hero)
        <section class="hero-section py-5 text-white rounded-4 overflow-hidden position-relative">


            {{-- Dot grid glow --}}
            <div class="hero-dots position-absolute top-0 start-0 w-100 h-100"></div>

            <div class="container py-4 position-relative" style="z-index: 1;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">

                        @if ($hero->badge_text)
                            <span class="badge bg-white text-dark mb-3 px-3 py-2 rounded-pill">
                                {{ $hero->badge_text }}
                            </span>
                        @endif

                        <h1 class="fw-bold mb-3 hero-title">
                            {{ $hero->title }}
                            @if ($hero->subtitle)
                                <span class="d-block hero-title-sub">{{ $hero->subtitle }}</span>
                            @endif
                        </h1>

                        @if ($hero->description)
                            <p class="mb-4 hero-lead">
                                {{ $hero->description }}
                            </p>
                        @endif

                        <div class="d-flex flex-wrap gap-2">
                            @if (!empty($hero->primary_button_label))
                                <a href="{{ $hero->primary_button_url ?: '#' }}"
                                    class="btn btn-modern-primary fw-semibold px-3 py-2"
                                    @if (!empty($hero->primary_button_url)) target="_blank" @endif>
                                    <i class="fa-solid fa-pen-to-square me-2"></i>
                                    {{ $hero->primary_button_label }}
                                </a>
                            @endif

                            @if (!empty($hero->secondary_button_label))
                                <a href="{{ $hero->secondary_button_url ?: '#program' }}"
                                    class="btn btn-modern-ghost fw-semibold px-3 py-2">
                                    <i class="fa-solid fa-graduation-cap me-2"></i>
                                    {{ $hero->secondary_button_label }}
                                </a>
                            @endif
                        </div>


                        {{-- Statistik --}}
                        <div class="row mt-5 g-3">
                            <div class="col-6 col-md-4">
                                <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                    <div class="fw-bold fs-5">{{ $hero->laboratory_count }}</div>
                                    <div class="opacity-75 small">Laboratorium</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                    <div class="fw-bold fs-5">{{ $hero->lecturer_practitioner_count }}</div>
                                    <div class="opacity-75 small">Dosen & Praktisi</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                    <div class="fw-bold fs-5">{{ $hero->industry_partner_count }}</div>
                                    <div class="opacity-75 small">Mitra Industri</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Gambar kanan --}}
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="position-relative p-3 rounded-4 border border-white border-opacity-10 overflow-hidden">
                            <img src="{{ asset('storage/' . $hero->hero_image) }}" alt="Hero Image" class="w-100"
                                style="height: 340px; object-fit: cover; border-radius: 16px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif



    {{-- ABOUT --}}
    <section class="py-5" id="tentang">
        <div class="container">

            <div class="row g-4 align-items-center">
                @if ($about)

                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-3">
                            {{ $about->judul_halaman }}
                        </h2>

                        <p class="text-muted mb-4">
                            {{ $about->subjudul_halaman }}
                        </p>

                        @if ($visi)
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-4 border rounded-4 h-100">
                                        <div class="fw-semibold">
                                            {{ $visi->judul }}
                                        </div>
                                        <div class="text-muted small mt-1">
                                            {{ $visi->deskripsi }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-4 border rounded-4 h-100">
                                        <div class="fw-semibold">
                                            {{ $visi->subjudul }}
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
                    </div>
                @endif
            </div>

            @if ($profilKeunggulan->isNotEmpty())
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 h-100">
                        <h5 class="fw-bold mb-3">
                            Kenapa Pilih FIK
                        </h5>

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
                    </div>
                </div>
            @endif

        </div>
        </div>

    </section>



    {{-- PROGRAM STUDI --}}
    <section class="py-5 bg-light" id="program">
        <div class="container">
            @if ($TentangKami)
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">{{ $TentangKami->judul }}</h2>
                        <p class="text-muted mb-0">{{ $TentangKami->title }}</p>
                    </div>
                    <a href="{{ $TentangKami->link }}" class="btn btn-info-pmb fw-semibold px-3 py-2">
                        <i class="fa-solid fa-circle-info me-2"></i> {{ $TentangKami->subtitle_link }}
                    </a>

                </div>
            @endif

            <div class="row g-4">
                @if ($JurusanHome)
                    @foreach ($JurusanHome as $Item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4 h-100">
                                <div class="card-body p-4">
                                    <span class="badge text-bg-primary mb-3">{{ $Item->jenjang }}</span>
                                    <h5 class="fw-bold">{{ $Item->nama }}</h5>
                                    <p class="text-muted">{{ $Item->deskripsi_singkat }}</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($Item->tags as $item)
                                            <span class="badge text-bg-light text-dark border">{{ $item }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- KEGIATAN / NEWS --}}
    <section class="py-5" id="kegiatan">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Kegiatan Terbaru</h2>
                    <p class="text-muted mb-0">Update event, seminar, dan prestasi mahasiswa.</p>
                </div>
                <a href="#" class="btn btn-see-all fw-semibold px-3 py-2">
                    Lihat Semua <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="row g-4">
                <!-- CARD -->
                @if ($Kegiatan)
                    @foreach ($Kegiatan as $k)
                        <div class="col-md-6 col-lg-4">
                            <div class="card rounded-4 h-100 overflow-hidden">
                                <img src="{{ asset('storage/' . $k->cover_image) }}" class="img-fluid" alt="Kegiatan">
                                <div class="card-body p-4">
                                    <div class="text-muted small mb-2">{{ $k->type }} • {{ $k->activty_date }}</div>
                                    <h5 class="fw-bold">{{ $k->title }}</h5>
                                    <p class="text-muted mb-0">
                                        {{ $k->excerpt }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @push('styles')
        <style>
            #kegiatan .card img {
                height: 200px;
                object-fit: cover;
            }

            #kegiatan .card {
                transition: transform .2s ease, box-shadow .2s ease;
            }

            #kegiatan .card:hover {
                transform: translateY(-6px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
            }
        </style>
    @endpush


    {{-- PMB CTA --}}
    <section class="py-5" id="pmb">
        <div class="container">
            <div class="p-4 p-md-5 rounded-4 border bg-white shadow-sm">
                <div class="row align-items-center g-3">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-2">Penerimaan Mahasiswa Baru</h3>
                        <p class="text-muted mb-0">
                            Mulai perjalananmu di dunia teknologi. Cek persyaratan, jadwal, dan jalur seleksi sekarang.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="#" class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>

                        <div class="text-muted small mt-2">Butuh bantuan? Lihat informasi kontak di bawah.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="py-5" id="testimoni">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Testimoni Alumni & Mahasiswa</h2>
                    <p class="text-muted mb-0">Cerita singkat pengalaman kuliah & kegiatan di kampus.</p>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-carousel-nav" type="button" data-dir="prev" aria-label="Sebelumnya">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-carousel-nav" type="button" data-dir="next" aria-label="Selanjutnya">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="testi-wrap">
                <div class="testi-track" id="testiTrack">
                    <!-- item -->
                    <article class="testi-card">
                        <div class="testi-head">
                            <img class="testi-avatar" src="https://i.pravatar.cc/120?img=12" alt="Foto testimoni 1">
                            <div>
                                <div class="testi-name">Nabila Putri</div>
                                <div class="testi-meta">Angkatan 2022 • Sistem Informasi</div>
                            </div>
                        </div>
                        <p class="testi-text">
                            “Materinya up to date, dosennya komunikatif, dan banyak project yang bikin portofolio jadi
                            nyata.”
                        </p>
                    </article>

                    <article class="testi-card">
                        <div class="testi-head">
                            <img class="testi-avatar" src="https://i.pravatar.cc/120?img=32" alt="Foto testimoni 2">
                            <div>
                                <div class="testi-name">Rizky Pratama</div>
                                <div class="testi-meta">Angkatan 2021 • Informatika</div>
                            </div>
                        </div>
                        <p class="testi-text">
                            “Kegiatan seminar & bootcamp-nya ngebantu banget. Aku jadi lebih pede apply magang.”
                        </p>
                    </article>

                    <article class="testi-card">
                        <div class="testi-head">
                            <img class="testi-avatar" src="https://i.pravatar.cc/120?img=48" alt="Foto testimoni 3">
                            <div>
                                <div class="testi-name">Salsa Aulia</div>
                                <div class="testi-meta">Angkatan 2020 • Teknik Komputer</div>
                            </div>
                        </div>
                        <p class="testi-text">
                            “Lingkungannya suportif. Banyak komunitas yang bikin relasi & skill makin kebangun.”
                        </p>
                    </article>

                    <article class="testi-card">
                        <div class="testi-head">
                            <img class="testi-avatar" src="https://i.pravatar.cc/120?img=5" alt="Foto testimoni 4">
                            <div>
                                <div class="testi-name">Fajar Maulana</div>
                                <div class="testi-meta">Angkatan 2019 • Informatika</div>
                            </div>
                        </div>
                        <p class="testi-text">
                            “Dari tugas akhir sampai lomba, pembinaannya rapi. Aku jadi punya arah karier yang jelas.”
                        </p>
                    </article>

                    <!-- duplikat biar loop halus (opsional) -->
                    <article class="testi-card">
                        <div class="testi-head">
                            <img class="testi-avatar" src="https://i.pravatar.cc/120?img=12" alt="Foto testimoni 1">
                            <div>
                                <div class="testi-name">Nabila Putri</div>
                                <div class="testi-meta">Angkatan 2022 • Sistem Informasi</div>
                            </div>
                        </div>
                        <p class="testi-text">
                            “Materinya up to date, dosennya komunikatif, dan banyak project yang bikin portofolio jadi
                            nyata.”
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>


    {{-- KONTAK --}}
    <section class="py-5" id="kontak">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Kontak</h2>
                    <p class="text-muted mb-0">Hubungi kami untuk informasi pendaftaran & layanan akademik.</p>
                </div>

                <a href="mailto:info@fik.ac.id" class="btn btn-info-pmb fw-semibold px-3 py-2">
                    <i class="fa-solid fa-envelope me-2"></i> Kirim Email
                </a>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="contact-card h-100">
                        <div class="contact-card-head">
                            <div class="contact-ic"><i class="fa-solid fa-location-dot"></i></div>
                            <div>
                                <div class="contact-title">Alamat & Kontak</div>
                                <div class="contact-sub">Kampus Fakultas Ilmu Komputer</div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-label">Alamat</div>
                            <div class="contact-value text-muted">Jl. Contoh Alamat No. 123, Kota, Provinsi</div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-label">Email</div>
                            <div class="contact-value">
                                <a class="contact-link" href="mailto:info@fik.ac.id">info@fik.ac.id</a>
                            </div>
                        </div>

                        <div class="contact-item mb-0">
                            <div class="contact-label">Telepon</div>
                            <div class="contact-value">
                                <a class="contact-link" href="tel:+620000000000">+62 000-0000-0000</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-card h-100">
                        <div class="contact-card-head">
                            <div class="contact-ic"><i class="fa-solid fa-clock"></i></div>
                            <div>
                                <div class="contact-title">Jam Layanan & Sosial</div>
                                <div class="contact-sub">Follow untuk update kegiatan</div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-label">Jam Layanan</div>
                            <div class="contact-value text-muted">Senin–Jumat, 08.00–16.00 WIB</div>
                        </div>

                        <div class="contact-item mb-0">
                            <div class="contact-label">Media Sosial</div>
                            <div class="d-flex flex-wrap gap-2">
                                <a class="btn btn-social" href="#"><i
                                        class="fa-brands fa-instagram me-2"></i>Instagram</a>
                                <a class="btn btn-social" href="#"><i
                                        class="fa-brands fa-youtube me-2"></i>YouTube</a>
                                <a class="btn btn-social" href="#"><i
                                        class="fa-brands fa-linkedin me-2"></i>LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        (function() {
            const track = document.getElementById('testiTrack');
            const btns = document.querySelectorAll('.btn-carousel-nav');
            if (!track) return;

            // tombol next/prev
            btns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const dir = btn.getAttribute('data-dir');
                    const step = track.querySelector('.testi-card')?.offsetWidth || 340;
                    track.scrollBy({
                        left: dir === 'next' ? step + 16 : -(step + 16),
                        behavior: 'smooth'
                    });
                });
            });

            // auto scroll (pause saat hover)
            let auto = setInterval(() => {
                const step = track.querySelector('.testi-card')?.offsetWidth || 340;
                track.scrollBy({
                    left: step + 16,
                    behavior: 'smooth'
                });

                // kalau sudah mendekati akhir, balik ke awal biar loop
                if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                    track.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                }
            }, 3500);

            track.addEventListener('mouseenter', () => clearInterval(auto));
            track.addEventListener('mouseleave', () => {
                auto = setInterval(() => {
                    const step = track.querySelector('.testi-card')?.offsetWidth || 340;
                    track.scrollBy({
                        left: step + 16,
                        behavior: 'smooth'
                    });
                    if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                        track.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    }
                }, 3500);
            });
        })();
    </script>
@endpush
