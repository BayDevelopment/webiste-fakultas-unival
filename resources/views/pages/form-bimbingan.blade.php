{{-- resources/views/pages/form-bimbingan.blade.php --}}
@extends('layouts.app')

@section('content')
    @php
        /**
         * Controller optional:
         * $bimbingan = [
         *   'title' => 'Form Bimbingan',
         *   'subtitle' => 'Silakan pilih jenis bimbingan.',
         *   'desc' => 'Klik tombol di bawah untuk membuka form.',
         *   'links' => [
         *     'kkp' => 'https://...',
         *     'skripsi' => 'https://...',
         *   ],
         * ];
         */
        $bimbingan = $bimbingan ?? [];

        $title = $bimbingan['title'] ?? 'Form Bimbingan';
        $subtitle = $bimbingan['subtitle'] ?? 'Silakan pilih jenis bimbingan.';
        $desc = $bimbingan['desc'] ?? 'Klik tombol di bawah untuk membuka form.';
        $links = $bimbingan['links'] ?? [];

        $items = [
            [
                'label' => 'Form Bimbingan KKP',
                'key' => 'kkp',
                'icon' => 'fa-solid fa-briefcase',
                'link' => $links['kkp'] ?? null,
            ],
            [
                'label' => 'Form Bimbingan Skripsi',
                'key' => 'skripsi',
                'icon' => 'fa-solid fa-graduation-cap',
                'link' => $links['skripsi'] ?? null,
            ],
        ];

        $isExternal = fn($url) => str_starts_with($url, 'http://') || str_starts_with($url, 'https://');
    @endphp

    <main class="py-5 prodi-page mb-5">
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
                    @php
                        $rawLink = $it['link'] ?? null;

                        // invalid jika: null, '', 0, '0', '#'
                        $isValidLink = !blank($rawLink) && !in_array((string) $rawLink, ['0', '#'], true);
                        $href = $isValidLink ? $rawLink : 'javascript:void(0)';
                    @endphp

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

                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ $href }}"
                                    class="btn btn-modern-primary fw-semibold px-4 py-2 {{ $isValidLink ? '' : 'disabled' }}"
                                    @if (!$isValidLink) aria-disabled="true" tabindex="-1" @endif
                                    @if ($isValidLink && $isExternal($rawLink)) target="_blank" rel="noopener" @endif>
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
