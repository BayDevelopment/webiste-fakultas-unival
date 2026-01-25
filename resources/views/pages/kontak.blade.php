{{-- resources/views/kontak.blade.php --}}
@extends('layouts.app')

@section('content')
    @php
        // ===== Data dari controller (fallback aman) =====
        // $kontak = [
        //   'title' => 'Kontak',
        //   'tagline' => 'Butuh bantuan? Hubungi kami.',
        //   'headline' => 'Mari terhubung',
        //   'desc' => 'Tim kami siap membantu informasi pendaftaran, akademik, dan kerja sama.',
        //   'cover' => asset('images/kontak-cover.jpg'),
        //   'alamat' => 'Jl. Contoh No. 1, Kota...',
        //   'jam' => 'Senin–Jumat, 08:00–16:00 WIB',
        //   'email' => 'info@kampus.ac.id',
        //   'telp' => '+62 812-xxxx-xxxx',
        //   'wa' => '62812xxxxxxxx', // tanpa +, untuk link wa.me
        //   'instagram' => 'https://instagram.com/...',
        //   'maps_embed' => '<iframe ...></iframe>', // optional
        // ];
        $kontak = $kontak ?? [];
        $title = $kontak['title'] ?? 'Kontak';
        $tagline = $kontak['tagline'] ?? 'Butuh bantuan? Hubungi kami kapan saja.';
        $headline = $kontak['headline'] ?? 'Mari terhubung';
        $desc =
            $kontak['desc'] ??
            'Tim kami siap membantu pertanyaan seputar informasi kampus/prodi, pendaftaran, akademik, serta kerja sama.';
        $cover = $kontak['cover'] ?? asset('images/kontak-cover.jpg');
        $coverFallback =
            'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=70';

        $alamat = $kontak['alamat'] ?? 'Alamat belum diatur (bisa isi dari DB/Filament).';
        $jam = $kontak['jam'] ?? 'Senin–Jumat, 08:00–16:00 WIB';
        $email = $kontak['email'] ?? 'info@domain.ac.id';
        $telp = $kontak['telp'] ?? '+62 8xx-xxxx-xxxx';
        $wa = $kontak['wa'] ?? null; // 62812xxxx
        $instagram = $kontak['instagram'] ?? null;
        $mapsEmbed = $kontak['maps_embed'] ?? null;

        // route fallback
        $submitUrl = \Illuminate\Support\Facades\Route::has('kontak.kirim') ? route('kontak.kirim') : '#';

        // default form values (optional)
        $subjects = $subjects ?? ['Informasi Pendaftaran', 'Akademik', 'Kerja Sama', 'Media/Publikasi', 'Lainnya'];
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Breadcrumb + Title --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $title }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $title }}</h1>

                    <p class="text-muted mb-0 prodi-subtitle">
                        {{ $tagline }}
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="#form" class="btn btn-see-all fw-semibold px-3 py-2">
                        Kirim Pesan <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>

                    @if ($wa)
                        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener"
                            class="btn btn-cta fw-semibold px-4 py-2">
                            Chat WhatsApp <i class="fa-brands fa-whatsapp ms-2"></i>
                        </a>
                    @else
                        <a href="mailto:{{ $email }}" class="btn btn-cta fw-semibold px-4 py-2">
                            Email Kami <i class="fa-solid fa-envelope ms-2"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- HERO --}}
            <section class="row g-4 align-items-center mb-5">
                <div class="col-lg-7">
                    <div class="prodi-hero-card p-4 p-lg-5 h-100">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-headset me-2"></i> Support
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-bolt me-2"></i> Respon cepat
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-shield-halved me-2"></i> Aman & nyaman
                            </span>
                        </div>

                        <h2 class="fw-bold mb-3 prodi-h2">{{ $headline }}</h2>

                        <p class="text-muted mb-4">{{ $desc }}</p>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num"><i class="fa-regular fa-clock"></i></div>
                                    <div class="text-muted small">{{ $jam }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num"><i class="fa-solid fa-location-dot"></i></div>
                                    <div class="text-muted small">{{ $alamat }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num"><i class="fa-regular fa-envelope"></i></div>
                                    <div class="text-muted small">{{ $email }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="#info" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-address-card me-2"></i> Info Kontak
                            </a>
                            <a href="#map" class="btn btn-see-all fw-semibold px-3 py-2">
                                <i class="fa-solid fa-map-location-dot me-2"></i> Lokasi
                            </a>
                            <a href="#faq" class="btn btn-see-all fw-semibold px-3 py-2">
                                <i class="fa-solid fa-circle-question me-2"></i> FAQ
                            </a>
                        </div>

                        <div class="prodi-mini mt-4">
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Format pesan rapi</div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Auto subject</div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Anti spam basic</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="prodi-image-wrap h-100">
                        <img src="{{ $cover }}" alt="Kontak" class="prodi-image"
                            onerror="this.src='{{ $coverFallback }}'; this.onerror=null;">
                        <div class="prodi-image-overlay"></div>

                        <div class="prodi-float-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="prodi-float-ic"><i class="fa-solid fa-paper-plane"></i></div>
                                <div>
                                    <div class="fw-bold">Kirim pesan</div>
                                    <div class="text-muted small">Kami akan balas secepatnya.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Quick Nav --}}
            <section class="mb-4">
                <div class="prodi-nav p-3">
                    <a class="prodi-nav-link" href="#info"><i class="fa-solid fa-address-card me-2"></i>Info</a>
                    <a class="prodi-nav-link" href="#form"><i class="fa-solid fa-message me-2"></i>Form</a>
                    <a class="prodi-nav-link" href="#map"><i class="fa-solid fa-map me-2"></i>Maps</a>
                    <a class="prodi-nav-link" href="#faq"><i class="fa-solid fa-circle-question me-2"></i>FAQ</a>
                </div>
            </section>

            {{-- INFO CONTACT --}}
            <section id="info" class="mb-5">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="prodi-card p-4 p-lg-5 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-phone-volume"></i></div>
                                <div>
                                    <div class="prodi-card-title">Kontak Utama</div>
                                    <div class="prodi-card-sub">Hubungi kami lewat channel resmi</div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="prodi-pill">
                                        <i class="fa-regular fa-envelope"></i>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Email</span>
                                            <a href="mailto:{{ $email }}"
                                                class="text-decoration-none">{{ $email }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="prodi-pill">
                                        <i class="fa-solid fa-phone"></i>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Telepon</span>
                                            <a href="tel:{{ preg_replace('/\s+/', '', $telp) }}"
                                                class="text-decoration-none">{{ $telp }}</a>
                                        </div>
                                    </div>
                                </div>

                                @if ($wa)
                                    <div class="col-12">
                                        <div class="prodi-pill">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold">WhatsApp</span>
                                                <a href="https://wa.me/{{ $wa }}" target="_blank"
                                                    rel="noopener" class="text-decoration-none">Chat via WhatsApp</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($instagram)
                                    <div class="col-12">
                                        <div class="prodi-pill">
                                            <i class="fa-brands fa-instagram"></i>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold">Instagram</span>
                                                <a href="{{ $instagram }}" target="_blank" rel="noopener"
                                                    class="text-decoration-none">Kunjungi Instagram</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="prodi-pill">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Alamat</span>
                                            <span class="text-muted">{{ $alamat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-muted small mt-3">
                                *Pastikan hanya menghubungi channel resmi untuk menghindari penipuan.
                            </div>
                        </div>
                    </div>

                    {{-- FORM --}}
                    <div class="col-lg-7">
                        <section id="form" class="prodi-card p-4 p-lg-5 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-message"></i></div>
                                <div>
                                    <div class="prodi-card-title">Kirim Pesan</div>
                                    <div class="prodi-card-sub">Isi form singkat di bawah ini</div>
                                </div>
                            </div>

                            {{-- Alert success/error (optional) --}}
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="fw-semibold mb-1">Periksa kembali:</div>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ $submitUrl }}" method="POST" class="row g-3" id="contactForm"
                                novalidate>
                                @csrf

                                <div class="col-md-6">
                                    <label class="text-muted small mb-2">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap"
                                        value="{{ old('nama') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-muted small mb-2">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="nama@email.com" value="{{ old('email') }}" required
                                        autocomplete="email">
                                </div>

                                <div class="col-md-6">
                                    <label class="text-muted small mb-2">No. HP (opsional)</label>
                                    <input type="text" name="hp" class="form-control" placeholder="08xx..."
                                        value="{{ old('hp') }}" autocomplete="tel">
                                </div>

                                <div class="col-md-6">
                                    <label class="text-muted small mb-2">Subjek</label>
                                    <select name="subjek" class="form-select" required>
                                        <option value="" disabled {{ old('subjek') ? '' : 'selected' }}>Pilih subjek
                                        </option>
                                        @foreach ($subjects as $s)
                                            <option value="{{ $s }}"
                                                {{ old('subjek') === $s ? 'selected' : '' }}>
                                                {{ $s }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="text-muted small mb-2">Pesan</label>
                                    <textarea name="pesan" rows="5" class="form-control" placeholder="Tulis pesan kamu..." required>{{ old('pesan') }}</textarea>
                                    <div class="text-muted small mt-2 d-flex justify-content-between">
                                        <span>Minimal 10 karakter.</span>
                                        <span id="charCount">0</span>
                                    </div>
                                </div>

                                {{-- Honeypot anti-spam sederhana --}}
                                <div class="d-none">
                                    <label>Website</label>
                                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="col-12 d-flex gap-2 flex-wrap">
                                    <button type="submit" class="btn btn-cta fw-semibold px-4 py-2">
                                        Kirim Pesan <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>

                                    @if ($wa)
                                        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener"
                                            class="btn btn-see-all fw-semibold px-4 py-2">
                                            Chat WhatsApp <i class="fa-brands fa-whatsapp ms-2"></i>
                                        </a>
                                    @else
                                        <a href="mailto:{{ $email }}"
                                            class="btn btn-see-all fw-semibold px-4 py-2">
                                            Kirim via Email <i class="fa-solid fa-envelope ms-2"></i>
                                        </a>
                                    @endif
                                </div>

                                <div class="text-muted small">
                                    Dengan mengirim pesan, kamu setuju informasi ini dipakai untuk keperluan balasan saja.
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </section>

            {{-- MAPS --}}
            <section id="map" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div class="prodi-card-head mb-0">
                            <div class="prodi-ic"><i class="fa-solid fa-map-location-dot"></i></div>
                            <div>
                                <div class="prodi-card-title">Lokasi</div>
                                <div class="prodi-card-sub">Kunjungi kami jika diperlukan</div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <a href="#info" class="btn btn-see-all fw-semibold px-3 py-2">
                                Info Kontak <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                    @if ($mapsEmbed)
                        <div class="ratio ratio-16x9">
                            {!! $mapsEmbed !!}
                        </div>
                    @else
                        <div class="prodi-card p-4" style="background: rgba(255,255,255,.03);">
                            <div class="text-muted mb-1">
                                Embed Google Maps belum diisi. Kamu bisa kirim iframe dari Google Maps ke controller sebagai
                                <code>$kontak['maps_embed']</code>.
                            </div>
                            <div class="text-muted small">
                                Contoh: buka Google Maps → Share → Embed a map → copy iframe.
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            {{-- FAQ --}}
            <section id="faq" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="prodi-card-head mb-3">
                        <div class="prodi-ic"><i class="fa-solid fa-circle-question"></i></div>
                        <div>
                            <div class="prodi-card-title">FAQ</div>
                            <div class="prodi-card-sub">Jawaban cepat untuk pertanyaan umum</div>
                        </div>
                    </div>

                    @php
                        $faq = $faq ?? [];
                    @endphp

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
                        <h3 class="fw-bold mb-1">Butuh jawaban cepat?</h3>
                        <p class="text-muted mb-0">Pilih channel yang paling nyaman buat kamu.</p>
                    </div>
                    <div class="col-lg-4 d-flex gap-2 justify-content-lg-end flex-wrap">
                        @if ($wa)
                            <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener"
                                class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                                Chat WhatsApp <i class="fa-brands fa-whatsapp ms-2"></i>
                            </a>
                        @else
                            <a href="mailto:{{ $email }}"
                                class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto">
                                Email Sekarang <i class="fa-solid fa-envelope ms-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection

@push('scripts')
    <script>
        (function() {
            // Char counter pesan
            const textarea = document.querySelector('textarea[name="pesan"]');
            const counter = document.getElementById('charCount');
            const form = document.getElementById('contactForm');

            function updateCount() {
                if (!textarea || !counter) return;
                counter.textContent = `${(textarea.value || '').length} karakter`;
            }

            if (textarea) {
                textarea.addEventListener('input', updateCount);
                updateCount();
            }

            // Validasi ringan (tanpa bikin ribet)
            if (form) {
                form.addEventListener('submit', (e) => {
                    const msgLen = (textarea?.value || '').trim().length;
                    if (textarea && msgLen < 10) {
                        e.preventDefault();
                        textarea.focus();
                        textarea.classList.add('is-invalid');

                        // bikin alert kecil kalau belum ada
                        if (!document.getElementById('msgAlert')) {
                            const div = document.createElement('div');
                            div.id = 'msgAlert';
                            div.className = 'alert alert-danger mt-3';
                            div.textContent = 'Pesan minimal 10 karakter ya.';
                            form.appendChild(div);
                        }
                    }
                });
            }
        })();
    </script>
@endpush
