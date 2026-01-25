@extends('layouts.app')

@section('content')
    @php
        $subtitle = $subtitle ?? 'Silakan pilih kuisioner yang tersedia.';
        $items = $items ?? [];
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
                        <span class="text-muted">{{ $navlink ?? 'Kuisioner' }}</span>
                        @if (!empty($slug))
                            <span class="mx-2">/</span>
                            <span class="text-muted text-capitalize">{{ $slug }}</span>
                        @endif
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $title ?? 'Kuisioner' }}</h1>
                    <p class="text-muted mb-0 prodi-subtitle">{{ $subtitle }}</p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ url()->previous() }}" class="btn btn-see-all fw-semibold px-4 py-2">
                        <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>

            {{-- Cards --}}
            <section class="row g-4">
                @foreach ($items as $it)
                    @php $link = $it['link'] ?? '#'; @endphp

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="prodi-card p-4 h-100">
                            <div class="prodi-card-head mb-3">
                                <div class="prodi-ic"><i class="fa-solid fa-clipboard-list"></i></div>
                                <div>
                                    <div class="prodi-card-title">Kuisioner</div>
                                    <div class="prodi-card-sub">{{ $it['label'] ?? '-' }}</div>
                                </div>
                            </div>

                            <p class="text-muted mb-4">
                                Klik tombol di bawah untuk membuka kuisioner.
                            </p>

                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ $link }}" class="btn btn-modern-primary fw-semibold px-4 py-2"
                                    @if ($isExternal($link)) target="_blank" rel="noopener" @endif>
                                    Klik Disini <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>

                            <div class="text-muted small mt-3">
                                *Jika link belum tersedia, silakan hubungi admin.
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

        </div>
    </main>
@endsection
