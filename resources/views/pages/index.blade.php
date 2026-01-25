@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <section class="hero-section py-5 text-white rounded-4 overflow-hidden position-relative">
        {{-- Dot grid glow --}}
        <div class="hero-dots position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="container py-4 position-relative" style="z-index: 1;">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-white text-dark mb-3 px-3 py-2 rounded-pill">
                        Fakultas Ilmu Komputer
                    </span>

                    <h1 class="fw-bold mb-3 hero-title">
                        Mencetak Talenta Digital
                        <span class="d-block hero-title-sub">Untuk Masa Depan Indonesia</span>
                    </h1>


                    <p class="mb-4 hero-lead">
                        Kurikulum relevan industri, dosen berpengalaman, riset & inovasi, serta komunitas teknologi yang
                        aktif.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://unival.siakadcloud.com/spmbfront/jalur-seleksi"
                            class="btn btn-modern-primary fw-semibold px-3 py-2" target="_blank">
                            <i class="fa-solid fa-pen-to-square me-2"></i> Daftar PMB
                        </a>

                        <a href="#program" class="btn btn-modern-ghost fw-semibold px-3 py-2">
                            <i class="fa-solid fa-graduation-cap me-2"></i> Lihat Program Studi
                        </a>
                    </div>


                    <div class="row mt-5 g-3">
                        <div class="col-6 col-md-4">
                            <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                <div class="fw-bold fs-5">12+</div>
                                <div class="opacity-75 small">Laboratorium</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                <div class="fw-bold fs-5">40+</div>
                                <div class="opacity-75 small">Dosen & Praktisi</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-10">
                                <div class="fw-bold fs-5">100+</div>
                                <div class="opacity-75 small">Mitra Industri</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- kanan dikosongkan / bisa isi gambar kampus nanti --}}
                <div class="col-lg-4 d-none d-lg-block">
                    <div
                        class="position-relative p-3 rounded-4 bg-opacity-05 border border-white border-opacity-10 overflow-hidden">
                        <img src="{{ asset('images/section-one.svg') }}" alt="Ilustrasi Fakultas Ilmu Komputer"
                            class="w-100" style="height: 340px; object-fit: cover; border-radius: 16px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100"
                            style="background: linear-gradient(180deg, rgba(13,110,253,.12), rgba(11,18,32,.45)); border-radius: 16px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ABOUT --}}
    <section class="py-5" id="tentang">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Tentang Fakultas</h2>
                    <p class="text-muted mb-4">
                        Fakultas Ilmu Komputer berkomitmen membangun ekosistem pembelajaran modern: berbasis proyek,
                        kolaboratif, dan relevan dengan kebutuhan industri. Mahasiswa didorong aktif dalam riset,
                        kompetisi, dan pengembangan produk digital.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-4 border rounded-4 h-100">
                                <div class="fw-semibold">Visi</div>
                                <div class="text-muted small mt-1">Menjadi Fakultas Yang Unggul Dalam Bidang Ilmu Komputer
                                    Melingkupi Tri Dharma Perguruan Tinggi Sebagai Upaya Meningkatkan Kesejahteraan Dan
                                    Kemajuan Masyarakat Tahun 2030 di Banten.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 border rounded-4 h-100">
                                <div class="fw-semibold">Misi</div>
                                <div class="text-muted small mt-1">1.Menyelenggarakan Pendidikan, Penelitian Dan Pengabdian
                                    Kepada Masyarakat .

                                    2.Membentuk Profil Lulusan Yang Adaptif, Inovatif Dan Kolaboratif Dalam Rangka
                                    Menghadapi Era Digital

                                    3.Memberdayakan Dan Memajukan Masyarakat Melalui Penerapan Teknologi Informasi.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="p-4 p-md-5 bg-light rounded-4 h-100">
                        <h5 class="fw-bold mb-3">Kenapa Pilih FIK?</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex gap-3 mb-3">
                                <span class="badge text-bg-primary rounded-pill px-3 py-2">01</span>
                                <div>
                                    <div class="fw-semibold">Project-based learning</div>
                                    <div class="text-muted small">Belajar lewat studi kasus nyata & portofolio.</div>
                                </div>
                            </li>
                            <li class="d-flex gap-3 mb-3">
                                <span class="badge text-bg-primary rounded-pill px-3 py-2">02</span>
                                <div>
                                    <div class="fw-semibold">Koneksi industri</div>
                                    <div class="text-muted small">Magang, guest lecture, kolaborasi riset.</div>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <span class="badge text-bg-primary rounded-pill px-3 py-2">03</span>
                                <div>
                                    <div class="fw-semibold">Komunitas aktif</div>
                                    <div class="text-muted small">Himpunan, lab, kompetisi, dan event teknologi.</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM STUDI --}}
    <section class="py-5 bg-light" id="program">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Program Studi</h2>
                    <p class="text-muted mb-0">Pilih jalur sesuai minat & karier masa depanmu.</p>
                </div>
                <a href="#pmb" class="btn btn-info-pmb fw-semibold px-3 py-2">
                    <i class="fa-solid fa-circle-info me-2"></i> Info Pendaftaran
                </a>

            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <span class="badge text-bg-primary mb-3">S1</span>
                            <h5 class="fw-bold">Teknik Informatika</h5>
                            <p class="text-muted">Software engineering, cloud, AI, dan pengembangan produk digital.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge text-bg-light text-dark border">Web</span>
                                <span class="badge text-bg-light text-dark border">Mobile</span>
                                <span class="badge text-bg-light text-dark border">Cloud</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <span class="badge text-bg-dark mb-3">D3</span>
                            <h5 class="fw-bold">Manajemen Informatika</h5>
                            <p class="text-muted">Praktik intensif untuk kebutuhan dunia kerja & industri.</p>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-6 col-lg-4">
                    <div class="card rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="text-muted small mb-2">Seminar • 20 Jan 2026</div>
                            <h5 class="fw-bold">Roadmap Karier Data & AI</h5>
                            <p class="text-muted mb-0">Kupas skill yang dibutuhkan industri dan tips portofolio.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="text-muted small mb-2">Kompetisi • 18 Jan 2026</div>
                            <h5 class="fw-bold">Juara Hackathon Tingkat Nasional</h5>
                            <p class="text-muted mb-0">Tim mahasiswa mengembangkan aplikasi layanan publik.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="text-muted small mb-2">Workshop • 15 Jan 2026</div>
                            <h5 class="fw-bold">Bootcamp Web Development</h5>
                            <p class="text-muted mb-0">Belajar fullstack modern dari dasar sampai deployment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
