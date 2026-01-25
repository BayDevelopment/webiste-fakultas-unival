{{-- resources/views/tentang.blade.php --}}
@extends('layouts.app')

@section('content')
    <main class="py-5 about-page">
        <div class="container">

            {{-- Header / Breadcrumb --}}
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">Tentang</span>
                    </div>
                    <h1 class="fw-bold about-title mb-1">Tentang Fakultas Ilmu Komputer</h1>
                    <p class="text-muted mb-0 about-subtitle">
                        Mencetak talenta digital yang adaptif, berintegritas, dan siap bersaing di industri.
                    </p>
                </div>
            </div>

            {{-- HERO --}}
            <section class="row g-4 align-items-center mb-5">
                <div class="col-lg-6">
                    <div class="about-hero-card p-4 p-lg-5 h-100">
                        <div class="badge about-badge mb-3">
                            <i class="fa-solid fa-shield-halved me-2"></i> Terakreditasi • Kurikulum Industri
                        </div>

                        <h2 class="fw-bold mb-3 about-h2">
                            Belajar dengan kurikulum modern, berorientasi praktik, dan portofolio nyata.
                        </h2>

                        <p class="text-muted mb-4">
                            Kami fokus pada pembelajaran berbasis proyek, kolaborasi komunitas, dan penguatan kompetensi
                            seperti Web Development, Data, AI, Cloud, dan Cybersecurity.
                        </p>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="#program" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-graduation-cap me-2"></i> Lihat Program Studi
                            </a>
                            <a href="#kegiatan" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-calendar-check me-2"></i> Kegiatan Terbaru
                            </a>
                        </div>

                        <div class="about-mini mt-4">
                            <div class="about-mini-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Project Based Learning</span>
                            </div>
                            <div class="about-mini-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Mentoring & Komunitas</span>
                            </div>
                            <div class="about-mini-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Career Preparation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-image-wrap h-100">
                        {{-- Ganti gambar sesuai aset kamu --}}
                        <img src="{{ asset('images/about-hero.jpg') }}" alt="Gedung / aktivitas Fakultas Ilmu Komputer"
                            class="about-image"
                            onerror="this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1400&q=70'; this.onerror=null;">
                        <div class="about-image-overlay"></div>

                        <div class="about-float-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="about-float-ic">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Learning that matters</div>
                                    <div class="text-muted small">Skill, portofolio, dan mindset industri.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- PROFIL + VISI MISI --}}
            <section id="profil" class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="about-card p-4 h-100">
                            <div class="about-card-head mb-3">
                                <div class="about-ic"><i class="fa-solid fa-building-columns"></i></div>
                                <div>
                                    <div class="about-card-title">Profil Singkat</div>
                                    <div class="about-card-sub">Siapa kita & apa yang kita kerjakan</div>
                                </div>
                            </div>

                            <p class="text-muted mb-3">
                                Fakultas Ilmu Komputer berkomitmen membangun ekosistem belajar yang relevan dengan kebutuhan
                                industri dan masyarakat. Mahasiswa dibimbing untuk unggul dalam teori, praktik, dan etika
                                profesional.
                            </p>

                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="about-pill">
                                        <i class="fa-solid fa-award"></i> Kompetitif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-pill">
                                        <i class="fa-solid fa-people-group"></i> Kolaboratif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-pill">
                                        <i class="fa-solid fa-code"></i> Praktikal
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-pill">
                                        <i class="fa-solid fa-handshake-angle"></i> Berdampak
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="about-card p-4 h-100">
                                    <div class="about-card-head mb-3">
                                        <div class="about-ic"><i class="fa-solid fa-bullseye"></i></div>
                                        <div>
                                            <div class="about-card-title">Visi</div>
                                            <div class="about-card-sub">Arah besar yang dituju</div>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0">
                                        Menjadi fakultas unggul dalam pengembangan ilmu dan talenta digital yang
                                        berintegritas,
                                        inovatif, dan mampu bersaing secara global.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="about-card p-4 h-100">
                                    <div class="about-card-head mb-3">
                                        <div class="about-ic"><i class="fa-solid fa-list-check"></i></div>
                                        <div>
                                            <div class="about-card-title">Misi</div>
                                            <div class="about-card-sub">Yang kita lakukan setiap hari</div>
                                        </div>
                                    </div>
                                    <ul class="about-list text-muted mb-0">
                                        <li>Pendidikan berbasis proyek & riset terapan.</li>
                                        <li>Kolaborasi industri & penguatan portofolio.</li>
                                        <li>Pengabdian masyarakat berbasis teknologi.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="about-card p-4">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                        <div>
                                            <div class="fw-bold mb-1">Siap jadi bagian dari talenta digital?</div>
                                            <div class="text-muted">Mulai dari PMB, lihat program studi, sampai kegiatan
                                                komunitas.</div>
                                        </div>
                                        <a href="#pmb" class="btn btn-cta fw-semibold px-4 py-2">
                                            Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            {{-- STAT --}}
            <section class="mb-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="about-stat p-4 h-100">
                            <div class="about-stat-ic"><i class="fa-solid fa-user-graduate"></i></div>
                            <div class="about-stat-num">1.200+</div>
                            <div class="text-muted">Mahasiswa Aktif</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-stat p-4 h-100">
                            <div class="about-stat-ic"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="about-stat-num">80+</div>
                            <div class="text-muted">Mitra Magang/Industri</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-stat p-4 h-100">
                            <div class="about-stat-ic"><i class="fa-solid fa-trophy"></i></div>
                            <div class="about-stat-num">150+</div>
                            <div class="text-muted">Prestasi & Sertifikasi</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- TIMELINE --}}
            <section class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 about-h3">Perjalanan</h2>
                        <p class="text-muted mb-0">Momen penting dalam perkembangan fakultas.</p>
                    </div>
                </div>

                <div class="about-timeline p-4">
                    <div class="about-tl-item">
                        <div class="about-tl-dot"></div>
                        <div class="about-tl-content">
                            <div class="about-tl-year">2018</div>
                            <div class="fw-bold">Penguatan Kurikulum</div>
                            <div class="text-muted">Mulai menerapkan project based learning dan penguatan laboratorium.
                            </div>
                        </div>
                    </div>

                    <div class="about-tl-item">
                        <div class="about-tl-dot"></div>
                        <div class="about-tl-content">
                            <div class="about-tl-year">2021</div>
                            <div class="fw-bold">Kolaborasi Industri</div>
                            <div class="text-muted">Kerja sama magang dan mentoring bersama mitra industri.</div>
                        </div>
                    </div>

                    <div class="about-tl-item">
                        <div class="about-tl-dot"></div>
                        <div class="about-tl-content">
                            <div class="about-tl-year">2024</div>
                            <div class="fw-bold">Ekosistem Komunitas</div>
                            <div class="text-muted">Komunitas Data, Web, Mobile, AI, dan Cyber makin aktif.</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- NILAI --}}
            <section class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 about-h3">Nilai Utama</h2>
                        <p class="text-muted mb-0">Prinsip yang jadi fondasi pembelajaran dan budaya.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="about-card p-4 h-100">
                            <div class="about-ic mb-3"><i class="fa-solid fa-lightbulb"></i></div>
                            <div class="fw-bold mb-1">Inovasi</div>
                            <div class="text-muted">Berpikir kreatif dan membangun solusi nyata.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="about-card p-4 h-100">
                            <div class="about-ic mb-3"><i class="fa-solid fa-handshake"></i></div>
                            <div class="fw-bold mb-1">Kolaborasi</div>
                            <div class="text-muted">Kerja tim, komunitas, dan jejaring profesional.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="about-card p-4 h-100">
                            <div class="about-ic mb-3"><i class="fa-solid fa-shield-heart"></i></div>
                            <div class="fw-bold mb-1">Integritas</div>
                            <div class="text-muted">Etika, tanggung jawab, dan profesionalisme.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="about-card p-4 h-100">
                            <div class="about-ic mb-3"><i class="fa-solid fa-rocket"></i></div>
                            <div class="fw-bold mb-1">Impact</div>
                            <div class="text-muted">Ilmu bermanfaat untuk masyarakat & industri.</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- TIM (opsional) --}}
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

                @php
                    $teams = [
                        ['name' => 'Dr. Nama Dosen', 'role' => 'Dekan', 'img' => 'https://i.pravatar.cc/200?img=11'],
                        [
                            'name' => 'Nama Dosen, M.Kom',
                            'role' => 'Wakil Dekan',
                            'img' => 'https://i.pravatar.cc/200?img=22',
                        ],
                        ['name' => 'Nama Dosen, M.T', 'role' => 'Kaprodi', 'img' => 'https://i.pravatar.cc/200?img=33'],
                        [
                            'name' => 'Nama Dosen, M.Kom',
                            'role' => 'Kemahasiswaan',
                            'img' => 'https://i.pravatar.cc/200?img=44',
                        ],
                        // tambahin data sebanyak yang kamu mau...
                    ];
                @endphp

                <div class="team-wrap">
                    <div class="team-track" id="teamTrack">
                        @foreach ($teams as $t)
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
                        <a href="#pmb" class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
