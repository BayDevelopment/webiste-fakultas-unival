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
                                // Kalau route pakai model binding {programStudi:slug}, ini yang benar:
                                $currentSlug = request()->route('programStudi')?->slug;

                                // Kalau route kamu masih {slug}, pakai ini:
                                // $currentSlug = request()->route('slug');

                            @endphp

                            <div class="p-3 dropdown-scroll-body">
                                @foreach ($navProdi as $p)
                                    <div class="dropdown-title">{{ $p->nama_program_studi }}</div>

                                    {{-- Profil Prodi --}}
                                    <a class="dropdown-item d-flex align-items-center justify-content-between
                                     {{ request()->routeIs('profil.prodi') && $currentSlug === $p->slug ? 'active' : '' }}"
                                        href="{{ route('profil.prodi', ['programStudi' => $p->slug]) }}">
                                        Profil Prodi <i class="fa-solid fa-arrow-right"></i>
                                    </a>

                                    {{-- Akreditasi (kalau memang per-prodi) --}}
                                    <a class="dropdown-item d-flex align-items-center justify-content-between
                                        {{ request()->routeIs('prodi.akreditasi') && $currentSlug === $p->slug ? 'active' : '' }}"
                                        href="{{ route('prodi.akreditasi', ['programStudi' => $p->slug]) }}">
                                        Akreditasi <i class="fa-solid fa-arrow-right"></i>
                                    </a>

                                    @if (!$loop->last)
                                        <hr class="my-3">
                                    @endif
                                @endforeach
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
                    @php
                        /**
                         * $navs : Collection groupedBy group_key
                         * setiap item = NavLink
                         */

                        // ambil hanya group yang punya minimal 1 item visible
                        $groups = $navs
                            ->map(fn($items) => $items->filter(fn($i) => $i->is_visible ?? true))
                            ->filter(fn($items) => $items->isNotEmpty())
                            ->sortBy(fn($items) => $items->first()->group_order ?? 0);
                    @endphp

                    @if ($groups->isNotEmpty())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan <i class="fa-solid fa-chevron-down fa-xs"></i>
                            </a>

                            <div
                                class="dropdown-menu dropdown-card dropdown-card-scroll shadow-lg border-0 p-0 dropdown-menu-end">
                                <div class="p-3">

                                    @php $firstGroup = true; @endphp

                                    @foreach ($groups as $items)
                                        @if (!$firstGroup)
                                            <hr class="my-3">
                                        @endif
                                        @php $firstGroup = false; @endphp

                                        <div class="dropdown-title">
                                            {{ $items->first()->group_label }}
                                        </div>

                                        @foreach ($items as $item)
                                            @php
                                                // Tentukan href
                                                $href = $item->url ?? '#';

                                                // Cek apakah link ini adalah halaman aktif
                                                $isActive = $item->url
                                                    ? request()->is(ltrim($item->url, '/') . '*')
                                                    : false;
                                            @endphp

                                            <a class="dropdown-item d-flex align-items-center justify-content-between {{ $isActive ? 'active' : '' }}"
                                                href="{{ $href }}"
                                                @if ($item->is_external) target="_blank" rel="noopener noreferrer" @endif>
                                                {{ $item->label }}
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>

        </div>
    </nav>
