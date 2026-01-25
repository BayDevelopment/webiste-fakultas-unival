@extends('layouts.app')

@section('content')
    @php
        // PASTI dari controller: $akreditasi
        $title = $akreditasi['title'] ?? 'Sertifikat Akreditasi';
        $subtitle = $akreditasi['subtitle'] ?? 'Silakan pilih program studi untuk melihat/unduh sertifikat akreditasi.';
        $desc = $akreditasi['desc'] ?? 'Klik tombol di bawah untuk membuka sertifikat.';
        $links = $akreditasi['links'] ?? [];

        // FIX: kalau link kosong tetap fallback
        $tiLink = filled($links['ti'] ?? null) ? $links['ti'] : '#';
        $miLink = filled($links['mi'] ?? null) ? $links['mi'] : '#';

        $items = [
            ['label' => 'Teknik Informatika', 'icon' => 'fa-solid fa-certificate', 'link' => $tiLink],
            ['label' => 'Manajemen Informatika', 'icon' => 'fa-solid fa-certificate', 'link' => $miLink],
        ];

        $isExternal = fn($url) => str_starts_with($url, 'http://') || str_starts_with($url, 'https://');
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Header + Back --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $title }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $title }}</h1>
                    <p class="text-muted mb-0 prodi-subtitle">{{ $subtitle }}</p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ url()->previous() }}" class="btn btn-see-all fw-semibold px-4 py-2">
                        <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>

            {{-- Cards --}}
            <section class="row g-4 justify-content-center">
                @foreach ($items as $it)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="prodi-card p-4 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="{{ $it['icon'] }}"></i></div>
                                <div>
                                    <div class="prodi-card-title">{{ $title }}</div>
                                    <div class="prodi-card-sub">{{ $it['label'] }}</div>
                                </div>
                            </div>

                            <p class="text-muted mb-4">{{ $desc }}</p>

                            @php
                                $rawLink = $it['link'] ?? null;

                                // anggap tidak valid jika: null, '', 0, '0', '#'
                                $isValidLink = !blank($rawLink) && !in_array((string) $rawLink, ['0', '#'], true);

                                // href aman
                                $href = $isValidLink ? $rawLink : 'javascript:void(0)';

                                // attribute eksternal hanya jika valid dan memang url http(s)
                                $externalAttr =
                                    $isValidLink && $isExternal($rawLink) ? ' target="_blank" rel="noopener"' : '';
                            @endphp
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
                @endforeach
            </section>

        </div>
    </main>
@endsection
