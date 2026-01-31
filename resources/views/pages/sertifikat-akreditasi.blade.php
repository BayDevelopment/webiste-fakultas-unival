@extends('layouts.app')

{{-- resources/views/pages/akreditasi.blade.php --}}

@section('content')
    @php
        $title = 'Sertifikat Akreditasi';
        $subtitle = 'Klik tombol di bawah untuk membuka sertifikat akreditasi program studi.';
        $desc = 'Klik tombol di bawah untuk membuka sertifikat.';

        $isExternal = fn($url) => is_string($url) &&
            (str_starts_with($url, 'http://') || str_starts_with($url, 'https://'));

        // data 1 prodi
        $label = $prodi->nama_program_studi;
        $rawLink = $prodi->link_akreditasi;

        $isValidLink = !blank($rawLink) && !in_array((string) $rawLink, ['0', '#'], true);
        $href = $isValidLink ? $rawLink : 'javascript:void(0)';
        $externalAttr = $isValidLink && $isExternal($rawLink) ? ' target="_blank" rel="noopener"' : '';
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Header + Back --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('profil.prodi', $prodi->slug) }}" class="text-decoration-none text-muted">
                            {{ $prodi->nama_program_studi }}
                        </a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $title }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $title }}</h1>
                    <p class="text-muted mb-0 prodi-subtitle">{{ $subtitle }}</p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('profil.prodi', $prodi->slug) }}" class="btn btn-see-all fw-semibold px-4 py-2">
                        <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>

            {{-- Card tunggal --}}
            <section class="row g-4 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="prodi-card p-4 h-100">
                        <div class="prodi-card-head mb-3">
                            <div class="prodi-ic"><i class="fa-solid fa-certificate"></i></div>
                            <div>
                                <div class="prodi-card-title">{{ $title }}</div>
                                <div class="prodi-card-sub">{{ $label }}</div>
                            </div>
                        </div>

                        <p class="text-muted mb-4">{{ $desc }}</p>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ $href }}"
                                class="btn btn-modern-primary fw-semibold px-4 py-2 {{ $isValidLink ? '' : 'disabled' }}"
                                @if (!$isValidLink) aria-disabled="true" tabindex="-1" @endif
                                {!! $externalAttr !!}>
                                Klik Disini <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>

                        <div class="text-muted small mt-3">
                            *Jika link belum tersedia, silakan hubungi admin/prodi.
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
