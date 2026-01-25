    <nav id="mainNavbar" class="navbar navbar-expand-lg bg-white border-bottom navbar-fik">
        <div class="container py-2">

            {{-- Brand --}}
            <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-unival.webp') }}" alt="Logo UNIVAL" width="44" height="44"
                    class="navbar-logo d-inline-block">
                <div class="lh-sm">
                    <div class="brand-line1 text-dark fw-medium">Universitas Al-Khairiyah</div>
                    <div class="brand-line2 text-muted fw-normal">Fakultas Ilmu Komputer</div>
                </div>
            </a>

            {{-- Toggler (mobile) --}}
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-auto me-lg-3 mt-3 mt-lg-0 gap-lg-1">

                    <li class="nav-item">
                        <a class="nav-link {{ $navlink == 'Beranda' ? 'active' : '' }}"
                            href="{{ url('/') }}">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $navlink == 'Tentang Kami' ? 'active' : '' }}"
                            href="{{ url('tentang-kami') }}">Tentang</a>
                    </li>

                    {{-- PROGRAM STUDI (Dropdown Card) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program Studi <i class="fa-solid fa-chevron-down fa-xs"></i>
                        </a>

                        <div
                            class="dropdown-menu dropdown-card shadow-lg border-0 p-0 dropdown-menu-end dropdown-scroll">
                            @php
                                $prodiSlug = request()->route('slug'); // ambil {slug} dari route profil.prodi
                            @endphp
                            <div class="p-3 dropdown-scroll-body">
                                <!-- TEKNIK INFORMATIKA -->
                                <div class="dropdown-title">Teknik Informatika</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $prodiSlug === 'teknik-informatika' ? 'active' : '' }}"
                                    href="{{ route('profil.prodi', ['slug' => 'teknik-informatika']) }}">
                                    Profil Prodi <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $prodiSlug === 'teknik-informatika' && request()->routeIs('prodi.akreditasi') ? 'active' : '' }}"
                                    href="{{ route('sertifikat.akreditasi') }}">
                                    Akreditasi <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <hr class="my-3">

                                <!-- MANAJEMEN INFORMATIKA -->
                                <div class="dropdown-title">Manajemen Informatika</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $prodiSlug === 'manajemen-informatika' ? 'active' : '' }}"
                                    href="{{ route('profil.prodi', ['slug' => 'manajemen-informatika']) }}">
                                    Profil Prodi <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $prodiSlug === 'manajemen-informatika' && request()->routeIs('prodi.akreditasi') ? 'active' : '' }}"
                                    href="{{ route('sertifikat.akreditasi') }}">
                                    Akreditasi <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $navlink == 'kegiatan' ? 'active' : '' }} "
                            href="{{ route('kegiatan') }}">Kegiatan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $navlink == 'Kontak' ? 'active' : '' }} "
                            href="{{ route('kontak') }}">Kontak</a>
                    </li>

                    {{-- LAYANAN (Dropdown Card) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan <i class="fa-solid fa-chevron-down fa-xs"></i>
                        </a>

                        <div
                            class="dropdown-menu dropdown-card dropdown-card-scroll shadow-lg border-0 p-0 dropdown-menu-end">
                            <div class="p-3">
                                <div class="dropdown-title">Portal</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="#">
                                    SIAKAD <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <hr class="my-3">

                                <div class="dropdown-title">Kuisioner</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ request()->route('slug') == 'dosen' ? 'active' : '' }}"
                                    href="{{ route('kuisioner', ['slug' => 'dosen']) }}">
                                    Kuisioner Dosen <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ request()->route('slug') == 'mahasiswa' ? 'active' : '' }}"
                                    href="{{ route('kuisioner', ['slug' => 'mahasiswa']) }}">
                                    Kuisioner Mahasiswa <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSeltINvUdcoloDYU0hEZLRVWa5yZa9rdp0YKMxssdii987R0g/viewform"
                                    target="_blank">
                                    Lembar Kendali <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <hr class="my-3">

                                <div class="dropdown-title">E-Surat</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSdejhansR6cRQ6-GpCx27mDwVB_sdm3z10e_1XIBRMovmKIMg/viewform"
                                    target="_blank">
                                    Pengajuan KKP <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSc7nr-hm9GtRZu7GVGGCkYwvXp0FCQoXq1lzunS6sUgJcIVug/viewform"
                                    target="_blank">
                                    Surat Keterangan Aktif <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSdN3YkvMMgYh0ixIb5a7UNhfSJwD4xtwm2VXSwdwgLUDqrszA/viewform"
                                    target="_blank">
                                    Dispensasi KKP <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <hr class="my-3">

                                <div class="dropdown-title">Download</div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="https://drive.google.com/file/d/1tOGwFLx16mBkQ83VbKVia_0J6l77VOKE/view"
                                    target="_blank">
                                    Form Pindah Kelas <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $navlink == 'Pendaftaran Sidang' ? 'active' : '' }}"
                                    href="{{ route('pendaftaran.sidang') }}">
                                    Form Sidang (Proposal/Skripsi) <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $navlink == 'Sertifikat Akreditasi' ? 'active' : '' }}"
                                    href="{{ route('sertifikat.akreditasi') }}">
                                    Sertifikat Akreditasi <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $navlink == 'Form Bimbingan' ? 'active' : '' }}"
                                    href="https://docs.google.com/forms/d/e/1FAIpQLScCB5C3QwuzXqcP2sE07A4OhOxkHVHyLuc3OLmLQwwCKYsigw/viewform?usp=sf_link"
                                    target="_blank">
                                    Surat Izin Penelitian <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between {{ $navlink == 'Form Bimbingan' ? 'active' : '' }}"
                                    href="{{ route('form.bimbingan') }}">
                                    Form Bimbingan <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
