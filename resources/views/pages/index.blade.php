@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    {{-- HERO --}}
    @if (!empty($hero) && (!isset($hero->is_active) || $hero->is_active))
        <section class="hero-section py-5 text-white rounded-4 overflow-hidden position-relative">

            <div class="hero-dots position-absolute top-0 start-0 w-100 h-100"></div>

            <div class="container py-4 position-relative" style="z-index: 1;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">

                        @if (!empty($hero->badge_text))
                            <span class="badge bg-white text-dark mb-3 px-3 py-2 rounded-pill">
                                {{ $hero->badge_text }}
                            </span>
                        @endif

                        @if (!empty($hero->title))
                            <h1 class="fw-bold mb-3 hero-title">
                                {{ $hero->title }}
                                @if (!empty($hero->subtitle))
                                    <span class="d-block hero-title-sub">{{ $hero->subtitle }}</span>
                                @endif
                            </h1>
                        @endif

                        @if (!empty($hero->description))
                            <p class="mb-4 hero-lead">{{ $hero->description }}</p>
                        @endif

                        @if (!empty($hero->primary_button_label) || !empty($hero->secondary_button_label))
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
                        @endif

                        {{-- Statistik (tampilkan hanya kalau ada minimal 1 nilainya) --}}
                        @php
                            $hasStats =
                                filled($hero->laboratory_count) ||
                                filled($hero->lecturer_practitioner_count) ||
                                filled($hero->industry_partner_count);
                        @endphp

                        @if ($hasStats)
                            <div class="row mt-5 g-3">
                                @if (filled($hero->laboratory_count))
                                    <div class="col-6 col-md-4">
                                        <div
                                            class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                            <div class="fw-bold fs-5">{{ $hero->laboratory_count }}</div>
                                            <div class="opacity-75 small">Laboratorium</div>
                                        </div>
                                    </div>
                                @endif

                                @if (filled($hero->lecturer_practitioner_count))
                                    <div class="col-6 col-md-4">
                                        <div
                                            class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                            <div class="fw-bold fs-5">{{ $hero->lecturer_practitioner_count }}</div>
                                            <div class="opacity-75 small">Dosen & Praktisi</div>
                                        </div>
                                    </div>
                                @endif

                                @if (filled($hero->industry_partner_count))
                                    <div class="col-6 col-md-4">
                                        <div
                                            class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                            <div class="fw-bold fs-5">{{ $hero->industry_partner_count }}</div>
                                            <div class="opacity-75 small">Mitra Industri</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    {{-- Gambar kanan (tampilkan hanya kalau ada file) --}}
                    @if (!empty($hero->hero_image))
                        <div class="col-lg-4 d-none d-lg-block">
                            <div
                                class="position-relative p-3 rounded-4 border border-white border-opacity-10 overflow-hidden">
                                <img src="{{ asset('storage/' . $hero->hero_image) }}" alt="Hero Image" class="w-100"
                                    style="height: 340px; object-fit: cover; border-radius: 16px;">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- ABOUT --}}
    @if (!empty($about) && (!isset($about->is_active) || $about->is_active))
        <section class="py-5" id="tentang">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        @if (!empty($about->judul_halaman))
                            <h2 class="fw-bold mb-3">{{ $about->judul_halaman }}</h2>
                        @endif

                        @if (!empty($about->subjudul_halaman))
                            <p class="text-muted mb-4">{{ $about->subjudul_halaman }}</p>
                        @endif

                        @if (!empty($visi) && (!isset($visi->is_active) || $visi->is_active))
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-4 border rounded-4 h-100">
                                        @if (!empty($visi->judul))
                                            <div class="fw-semibold">{{ $visi->judul }}</div>
                                        @endif
                                        @if (!empty($visi->deskripsi))
                                            <div class="text-muted small mt-1">{{ $visi->deskripsi }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-4 border rounded-4 h-100">
                                        @if (!empty($visi->subjudul))
                                            <div class="fw-semibold">{{ $visi->subjudul }}</div>
                                        @endif

                                        @if (!empty($misi) && $misi->isNotEmpty())
                                            <ul class="about-list text-muted mb-0">
                                                @foreach ($misi as $item)
                                                    @if (!empty($item->title))
                                                        <li>{{ $item->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if (!empty($profilKeunggulan) && $profilKeunggulan->isNotEmpty())
                        <div class="col-lg-6">
                            <div class="p-4 p-md-5 bg-light rounded-4 h-100">
                                <h5 class="fw-bold mb-3">Kenapa Pilih FIK</h5>
                                <div class="row g-3">
                                    @foreach ($profilKeunggulan as $item)
                                        @if (!empty($item->judul))
                                            <div class="col-6">
                                                <div class="about-pill">
                                                    @if (!empty($item->icon))
                                                        <i class="{{ $item->icon }}"></i>
                                                    @endif
                                                    {{ $item->judul }}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif


    {{-- PROGRAM STUDI --}}
    @if (!empty($TentangKami) && (!isset($TentangKami->is_active) || $TentangKami->is_active))
        <section class="py-5 bg-light" id="program">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">{{ $TentangKami->judul }}</h2>
                        <p class="text-muted mb-0">{{ $TentangKami->title }}</p>
                    </div>

                    @if (!empty($TentangKami->link) && !empty($TentangKami->subtitle_link))
                        <a href="{{ $TentangKami->link }}" class="btn btn-info-pmb fw-semibold px-3 py-2">
                            <i class="fa-solid fa-circle-info me-2"></i> {{ $TentangKami->subtitle_link }}
                        </a>
                    @endif
                </div>

                @if (!empty($JurusanHome) && $JurusanHome->isNotEmpty())
                    <div class="row g-4">
                        @foreach ($JurusanHome as $Item)
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-0 shadow-sm rounded-4 h-100">
                                    <div class="card-body p-4">
                                        @if (!empty($Item->jenjang))
                                            <span class="badge text-bg-primary mb-3">{{ $Item->jenjang }}</span>
                                        @endif
                                        <h5 class="fw-bold">{{ $Item->nama }}</h5>
                                        @if (!empty($Item->deskripsi_singkat))
                                            <p class="text-muted">{{ $Item->deskripsi_singkat }}</p>
                                        @endif

                                        @if (!empty($Item->tags) && is_iterable($Item->tags) && count($Item->tags))
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($Item->tags as $tag)
                                                    <span
                                                        class="badge text-bg-light text-dark border">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif


    {{-- KEGIATAN / NEWS --}}
    @if (!empty($Kegiatan) && $Kegiatan->isNotEmpty())
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
                    @foreach ($Kegiatan as $k)
                        <div class="col-md-6 col-lg-4">
                            <div class="card rounded-4 h-100 overflow-hidden">
                                @if (!empty($k->cover_image))
                                    <img src="{{ asset('storage/' . $k->cover_image) }}" class="img-fluid" alt="Kegiatan">
                                @endif
                                <div class="card-body p-4">
                                    <div class="text-muted small mb-2">
                                        {{ $k->type ?? '' }} @if (!empty($k->activty_date))
                                            • {{ $k->activty_date }}
                                        @endif
                                    </div>
                                    <h5 class="fw-bold">{{ $k->title }}</h5>
                                    @if (!empty($k->excerpt))
                                        <p class="text-muted mb-0">{{ $k->excerpt }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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
    @if (!empty($Testimoni) && $Testimoni->isNotEmpty())
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
                        @foreach ($Testimoni as $t)
                            <article class="testi-card">
                                <div class="testi-head">
                                    @if (!empty($t->avatar))
                                        <img class="testi-avatar" src="{{ asset('storage/' . $t->avatar) }}"
                                            alt="Foto testimoni">
                                    @endif
                                    <div>
                                        <div class="testi-name">{{ $t->name }}</div>
                                        <div class="testi-meta">
                                            @if (!empty($t->angkatan))
                                                Angkatan {{ $t->angkatan }}
                                            @endif
                                            @if (!empty($t->program_studi))
                                                • {{ $t->program_studi }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if (!empty($t->quote))
                                    <p class="testi-text">“{{ $t->quote }}”</p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- KONTAK --}}
    @php
        $contactActive = !empty($Contact) && (!isset($Contact->is_active) || (bool) $Contact->is_active);

        $hasContactCardLeft =
            filled($Contact->address_text ?? null) ||
            filled($Contact->contact_email ?? null) ||
            filled($Contact->contact_phone ?? null);

        $hasContactCardRight =
            filled($Contact->office_hours_label ?? null) || filled($Contact->office_hours_time ?? null);

        // normalisasi telepon biar tel: rapi (hapus spasi & tanda selain angka/+)
        $phoneRaw = $Contact->contact_phone ?? null;
        $phoneTel = $phoneRaw ? preg_replace('/[^0-9+]/', '', $phoneRaw) : null;
    @endphp

    @if ($contactActive && ($hasContactCardLeft || $hasContactCardRight))
        <section class="py-5" id="kontak">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Kontak</h2>
                        <p class="text-muted mb-0">Hubungi kami untuk informasi pendaftaran & layanan akademik.</p>
                    </div>

                    @if (filled($Contact->contact_email))
                        <a href="mailto:{{ $Contact->contact_email }}" class="btn btn-info-pmb fw-semibold px-3 py-2">
                            <i class="fa-solid fa-envelope me-2"></i> Kirim Email
                        </a>
                    @endif
                </div>

                <div class="row g-4">
                    {{-- CARD KIRI: Alamat & Kontak --}}
                    @if ($hasContactCardLeft)
                        <div class="col-lg-6">
                            <div class="contact-card h-100">
                                <div class="contact-card-head">
                                    <div class="contact-ic"><i class="fa-solid fa-location-dot"></i></div>
                                    <div>
                                        <div class="contact-title">Alamat & Kontak</div>
                                        <div class="contact-sub">Kampus Fakultas Ilmu Komputer</div>
                                    </div>
                                </div>

                                @if (filled($Contact->address_text))
                                    <div class="contact-item">
                                        <div class="contact-label">Alamat</div>
                                        <div class="contact-value text-muted">{{ $Contact->address_text }}</div>
                                    </div>
                                @endif

                                @if (filled($Contact->contact_email))
                                    <div class="contact-item">
                                        <div class="contact-label">Email</div>
                                        <div class="contact-value">
                                            <a class="contact-link" href="mailto:{{ $Contact->contact_email }}">
                                                {{ $Contact->contact_email }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if (filled($phoneTel))
                                    <div class="contact-item mb-0">
                                        <div class="contact-label">Telepon</div>
                                        <div class="contact-value">
                                            <a class="contact-link" href="tel:{{ $phoneTel }}">
                                                {{ $Contact->contact_phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- CARD KANAN: Jam Layanan & Sosial --}}
                    @if ($hasContactCardRight)
                        <div class="col-lg-6">
                            <div class="contact-card h-100">
                                <div class="contact-card-head">
                                    <div class="contact-ic"><i class="fa-solid fa-clock"></i></div>
                                    <div>
                                        <div class="contact-title">Jam Layanan & Sosial</div>
                                        <div class="contact-sub">Follow untuk update kegiatan</div>
                                    </div>
                                </div>

                                @if (filled($Contact->office_hours_label) || filled($Contact->office_hours_time))
                                    <div class="contact-item">
                                        <div class="contact-label">Jam Layanan</div>
                                        <div class="contact-value text-muted">
                                            {{ $Contact->office_hours_label }}
                                            @if (filled($Contact->office_hours_label) && filled($Contact->office_hours_time))
                                                ,
                                            @endif
                                            {{ $Contact->office_hours_time }}
                                        </div>
                                    </div>
                                @endif

                                {{-- Media Sosial: kalau nanti sumbernya dari DB, tinggal bungkus pakai filled() juga --}}
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
                    @endif
                </div>

            </div>
        </section>
    @endif


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
