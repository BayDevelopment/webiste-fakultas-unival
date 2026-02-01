@extends('layouts.app')

@section('content')
    @php
        $subtitle = $subtitle ?? 'Silakan pilih kuisioner yang tersedia.';
        $isExternal = fn($url) => str_starts_with($url, 'http://') || str_starts_with($url, 'https://');
        $q = $q ?? '';
        $jenis_user = $jenis_user ?? null;

        // sumber data:
        // - jika search: $results (pagination)
        // - jika tidak search: $latest3 (collection)

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

            {{-- Search --}}
            <form method="GET" action="{{ route('kuisioner.index', ['jenis_user' => $jenis_user]) }}" class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>

                    <input type="text" name="q" value="{{ $q }}" class="form-control"
                        placeholder="Cari periode / judul / deskripsi...">

                    @if (!empty($q))
                        <a class="btn btn-outline-secondary"
                            href="{{ route('kuisioner.index', ['jenis_user' => $jenis_user]) }}">
                            Reset
                        </a>
                    @endif

                    <button class="btn btn-modern-primary fw-semibold" type="submit">
                        Cari
                    </button>
                </div>
            </form>

            {{-- Cards / Alert --}}
            <section class="row g-4">
                @if (!empty($q))
                    {{-- MODE SEARCH --}}
                    @if (isset($results) && $results->count() > 0)
                        @foreach ($results as $it)
                            @php
                                $link = $it->url_kuisioner ?? '#';
                                $isDisabled = $link === '#' || empty($link);
                            @endphp

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="prodi-card p-4 h-100">
                                    <div class="prodi-card-head mb-3">
                                        <div class="prodi-ic">
                                            <i class="fa-solid fa-clipboard-list"></i>
                                        </div>
                                        <div>
                                            <div class="prodi-card-title">{{ $it->judul_kartu ?? 'Kuisioner' }}</div>
                                            <div class="prodi-card-sub">
                                                {{ $it->periode ?? '-' }}
                                                <span class="ms-2 badge bg-secondary text-uppercase">
                                                    {{ $it->jenis_user ?? '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-muted mb-4">
                                        {{ $it->deskripsi ?? 'Klik tombol di bawah untuk membuka kuisioner.' }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($isDisabled)
                                            <button class="btn btn-secondary fw-semibold px-4 py-2" disabled>
                                                {{ $it->teks_tombol ?? 'Klik Disini' }}
                                                <i class="fa-solid fa-lock ms-2"></i>
                                            </button>
                                        @else
                                            <a href="{{ $link }}"
                                                class="btn btn-modern-primary fw-semibold px-4 py-2"
                                                @if ($isExternal($link)) target="_blank" rel="noopener" @endif>
                                                {{ $it->teks_tombol ?? 'Klik Disini' }}
                                                <i class="fa-solid fa-arrow-right ms-2"></i>
                                            </a>
                                        @endif
                                    </div>

                                    @if (!empty($it->catatan))
                                        <div class="text-muted small mt-3">
                                            {{ $it->catatan }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mt-2">
                            {{ $results->links() }}
                        </div>
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-start gap-3 p-4 rounded-3" role="alert">
                                <div class="fs-3">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <div class="fw-bold mb-1">Tidak ada hasil</div>
                                    <div class="mb-2">
                                        Kuisioner dengan kata kunci <b>{{ $q }}</b> tidak ditemukan.
                                    </div>
                                    <div class="small text-muted">
                                        Coba kata kunci lain, misalnya: <b>Ganjil</b>, <b>2024/2025</b>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    {{-- MODE DEFAULT: 3 TERBARU --}}
                    @if (isset($latest3) && $latest3->count() > 0)
                        @foreach ($latest3 as $it)
                            @php
                                $link = $it->url_kuisioner ?? '#';
                                $isDisabled = $link === '#' || empty($link);
                            @endphp

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="prodi-card p-4 h-100">
                                    <div class="prodi-card-head mb-3">
                                        <div class="prodi-ic">
                                            <i class="fa-solid fa-clipboard-list"></i>
                                        </div>
                                        <div>
                                            <div class="prodi-card-title">{{ $it->judul_kartu ?? 'Kuisioner' }}</div>
                                            <div class="prodi-card-sub">
                                                {{ $it->periode ?? '-' }}
                                                <span class="ms-2 badge bg-secondary text-uppercase">
                                                    {{ $it->jenis_user ?? '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-muted mb-4">
                                        {{ $it->deskripsi ?? 'Klik tombol di bawah untuk membuka kuisioner.' }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($isDisabled)
                                            <button class="btn btn-secondary fw-semibold px-4 py-2" disabled>
                                                {{ $it->teks_tombol ?? 'Klik Disini' }}
                                                <i class="fa-solid fa-lock ms-2"></i>
                                            </button>
                                        @else
                                            <a href="{{ $link }}"
                                                class="btn btn-modern-primary fw-semibold px-4 py-2"
                                                @if ($isExternal($link)) target="_blank" rel="noopener" @endif>
                                                {{ $it->teks_tombol ?? 'Klik Disini' }}
                                                <i class="fa-solid fa-arrow-right ms-2"></i>
                                            </a>
                                        @endif
                                    </div>

                                    @if (!empty($it->catatan))
                                        <div class="text-muted small mt-3">
                                            {{ $it->catatan }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- ALERT CARD: jika data kosong --}}
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-start gap-3 p-4 rounded-3" role="alert">
                                <div class="fs-3">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <div class="fw-bold mb-1">Kuisioner belum ditampilkan</div>
                                    <div class="mb-2">
                                        Saat ini kuisioner belum tersedia. Silakan hubungi admin untuk mengaktifkan
                                        kuisioner.
                                    </div>
                                    <div class="small text-muted">
                                        *Pastikan data kuisioner diinput melalui panel admin dan status <b>aktif</b>
                                        dinyalakan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </section>

        </div>
    </main>
@endsection
