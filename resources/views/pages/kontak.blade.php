{{-- resources/views/kontak.blade.php --}}
@extends('layouts.app')

@section('content')
    <main class="py-5 prodi-page">
        <div class="container">

            @if ($ContactSet)
                {{-- Breadcrumb + Title --}}
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                    <div>
                        <div class="text-muted small mb-1">
                            <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                            <span class="mx-2">/</span>
                            <span class="text-muted">{{ $ContactSet->page_title }}</span>
                        </div>

                        <h1 class="fw-bold prodi-title mb-1">{{ $ContactSet->page_title }}</h1>

                        <p class="text-muted mb-0 prodi-subtitle">
                            {{ $ContactSet->page_subtitle }}
                        </p>
                    </div>

                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ $ContactSet->primary_button_url ?: '#' }}"
                            class="btn btn-see-all fw-semibold px-3 py-2">
                            {{ $ContactSet->primary_button_text }}
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>

                        <a href="{{ filled($ContactSet->contact_email) ? 'mailto:' . $ContactSet->contact_email : '#' }}"
                            class="btn btn-cta fw-semibold px-4 py-2 {{ filled($ContactSet->contact_email) ? '' : 'disabled' }}">
                            {{ $ContactSet->secondary_button_text }}
                            <i class="fa-solid fa-envelope ms-2"></i>
                        </a>
                    </div>
                </div>

                {{-- HERO --}}
                <section class="row g-4 align-items-center mb-5">
                    <div class="col-lg-7">
                        <div class="prodi-hero-card p-4 p-lg-5 h-100">

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @if (filled($ContactSet->badge_1))
                                    <span class="badge prodi-badge">
                                        <i class="fa-solid fa-headset me-2"></i> {{ $ContactSet->badge_1 }}
                                    </span>
                                @endif
                                @if (filled($ContactSet->badge_2))
                                    <span class="badge prodi-badge">
                                        <i class="fa-solid fa-bolt me-2"></i> {{ $ContactSet->badge_2 }}
                                    </span>
                                @endif
                                @if (filled($ContactSet->badge_3))
                                    <span class="badge prodi-badge">
                                        <i class="fa-solid fa-shield-halved me-2"></i> {{ $ContactSet->badge_3 }}
                                    </span>
                                @endif
                            </div>

                            <h2 class="fw-bold mb-3 prodi-h2">{{ $ContactSet->card_title }}</h2>
                            <p class="text-muted mb-4">{{ $ContactSet->card_description }}</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="prodi-stat">
                                        <div class="prodi-stat-num"><i class="fa-regular fa-clock"></i></div>
                                        <div class="text-muted small">
                                            {{ $ContactSet->office_hours_label }},
                                            {{ $ContactSet->office_hours_time }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="prodi-stat">
                                        <div class="prodi-stat-num"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="text-muted small">
                                            {{ filled($ContactSet->address_text) ? $ContactSet->address_text : '-' }}
                                        </div>
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
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="prodi-image-wrap h-100">
                            <img src="{{ $ContactSet->hero_image
                                ? asset('storage/' . $ContactSet->hero_image)
                                : asset('images/avatar-placeholder.jpg') }}"
                                alt="Kontak" class="prodi-image">

                            <div class="prodi-float-card">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="prodi-float-ic"><i class="fa-solid fa-paper-plane"></i></div>
                                    <div>
                                        <div class="fw-bold">{{ $ContactSet->cta_title }}</div>
                                        <div class="text-muted small">{{ $ContactSet->cta_subtitle }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- MAP --}}
                <section id="map" class="mb-5">
                    <div class="prodi-card p-4 p-lg-5">
                        @if (filled($ContactSet->location_embed))
                            <div class="ratio ratio-16x9">
                                {!! $ContactSet->location_embed !!}
                            </div>
                        @else
                            <div class="ratio ratio-16x9 d-flex align-items-center justify-content-center">
                                <span>-</span>
                            </div>
                        @endif
                    </div>
                </section>

                {{-- FAQS --}}
                @php
                    $hasFaqs = !empty($FaqsData) && $FaqsData->isNotEmpty();
                @endphp

                @if ($hasFaqs)
                    <section id="faq" class="mb-5">
                        <div class="prodi-card p-4 p-lg-5">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-circle-question"></i></div>
                                <div>
                                    <div class="prodi-card-title">FAQ</div>
                                    <div class="prodi-card-sub">Jawaban cepat untuk pertanyaan umum</div>
                                </div>
                            </div>

                            <div class="accordion" id="faqAccordion">
                                @foreach ($FaqsData as $i => $faq)
                                    @php
                                        $q = $faq->question ?? null;
                                        $a = $faq->answer ?? null;
                                    @endphp

                                    @continue(blank($q) || blank($a))

                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" id="faqHeading{{ $i }}">
                                            <button class="accordion-button {{ $i !== 0 ? 'collapsed' : '' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faqCollapse{{ $i }}"
                                                aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                                aria-controls="faqCollapse{{ $i }}">
                                                {{ $q }}
                                            </button>
                                        </h2>

                                        <div id="faqCollapse{{ $i }}"
                                            class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                                            aria-labelledby="faqHeading{{ $i }}" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                {!! nl2br(e($a)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </section>
                @endif



                {{-- CTA --}}
                <section class="prodi-cta p-4 p-lg-5">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-8">
                            <h3 class="fw-bold mb-1">Butuh jawaban cepat?</h3>
                            <p class="text-muted mb-0">Pilih channel yang paling nyaman buat kamu.</p>
                        </div>

                        <div class="col-lg-4 d-flex gap-2 justify-content-lg-end flex-wrap">
                            <a href="{{ filled($ContactSet->contact_email) ? 'mailto:' . $ContactSet->contact_email : '#' }}"
                                class="btn btn-cta fw-semibold px-4 py-2 w-100 w-lg-auto {{ filled($ContactSet->contact_email) ? '' : 'disabled' }}">
                                Email Sekarang <i class="fa-solid fa-envelope ms-2"></i>
                            </a>
                        </div>
                    </div>
                </section>
            @endif

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
