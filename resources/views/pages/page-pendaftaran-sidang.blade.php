@extends('layouts.app')

@section('content')
    @php
        $subtitle = $subtitle ?? 'Silakan pilih jenis sidang yang akan didaftarkan.';
        $navlink = $navlink ?? 'Form Pendaftaran Sidang';
        $title = $title ?? 'Form Sidang';
        $q = $q ?? '';

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
                        <span class="text-muted">{{ $navlink }}</span>
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

            {{-- Search --}}
            <form method="GET" action="{{ url()->current() }}" class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="q" value="{{ $q }}" class="form-control"
                        placeholder="Cari jenis / judul / subjudul / deskripsi...">

                    @if (!empty($q))
                        <a class="btn btn-outline-secondary" href="{{ url()->current() }}">Reset</a>
                    @endif

                    <button class="btn btn-modern-primary fw-semibold" type="submit">
                        Cari
                    </button>
                </div>
            </form>

            {{-- Alert info saat search dan hasil ada --}}
            @if (!empty($q) && isset($results) && $results->count() > 0)
                <div class="alert alert-info d-flex align-items-start gap-3 p-3 rounded-3 mb-4" role="alert">
                    <div class="fs-4">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Hasil pencarian ditemukan</div>
                        <div class="small">
                            Menampilkan <b>{{ $results->count() }}</b> data pada halaman ini untuk kata kunci:
                            <b>{{ $q }}</b>.
                        </div>
                    </div>
                </div>
            @endif

            {{-- Cards --}}
            <section class="row g-4">

                @if (!empty($q))
                    {{-- MODE SEARCH --}}
                    @if (isset($results) && $results->count() > 0)
                        @foreach ($results as $it)
                            @php
                                $link = $it->url_form ?? '#';
                                $isDisabled = $link === '#' || empty($link);

                                // Icon beda biar cakep (optional)
                                $icon =
                                    ($it->jenis_sidang ?? '') === 'proposal'
                                        ? 'fa-solid fa-file-pen'
                                        : 'fa-solid fa-graduation-cap';
                            @endphp

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="prodi-card p-4 h-100">
                                    <div class="prodi-card-head mb-3">
                                        <div class="prodi-ic"><i class="{{ $icon }}"></i></div>
                                        <div>
                                            <div class="prodi-card-title">{{ $it->judul_kartu ?? 'Form Sidang' }}</div>
                                            <div class="prodi-card-sub">
                                                {{ $it->subjudul ?? '-' }}
                                                <span class="ms-2 badge bg-secondary text-uppercase">
                                                    {{ $it->jenis_sidang ?? '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-muted mb-4">
                                        {{ $it->deskripsi ?? 'Klik tombol di bawah untuk membuka form.' }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($isDisabled)
                                            <button class="btn btn-secondary fw-semibold px-4 py-2" disabled
                                                title="Link belum tersedia">
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
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 mt-2">
                            {{ $results->links() }}
                        </div>
                    @else
                        {{-- ALERT: search kosong --}}
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-start gap-3 p-4 rounded-3" role="alert">
                                <div class="fs-3">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <div class="fw-bold mb-1">Tidak ada hasil</div>
                                    <div class="mb-2">
                                        Data tidak ditemukan untuk kata kunci <b>{{ $q }}</b>.
                                    </div>
                                    <div class="small text-muted">
                                        Coba kata kunci lain, misalnya: <b>proposal</b>, <b>akhir</b>, atau tahun/semester.
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
                                $link = $it->url_form ?? '#';
                                $isDisabled = $link === '#' || empty($link);

                                $icon =
                                    ($it->jenis_sidang ?? '') === 'proposal'
                                        ? 'fa-solid fa-file-pen'
                                        : 'fa-solid fa-graduation-cap';
                            @endphp

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="prodi-card p-4 h-100">
                                    <div class="prodi-card-head mb-3">
                                        <div class="prodi-ic"><i class="{{ $icon }}"></i></div>
                                        <div>
                                            <div class="prodi-card-title">{{ $it->judul_kartu ?? 'Form Sidang' }}</div>
                                            <div class="prodi-card-sub">
                                                {{ $it->subjudul ?? '-' }}
                                                <span class="ms-2 badge bg-secondary text-uppercase">
                                                    {{ $it->jenis_sidang ?? '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-muted mb-4">
                                        {{ $it->deskripsi ?? 'Klik tombol di bawah untuk membuka form.' }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($isDisabled)
                                            <button class="btn btn-secondary fw-semibold px-4 py-2" disabled
                                                title="Link belum tersedia">
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
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- ALERT: default kosong --}}
                        <div class="col-12">
                            <div class="alert alert-warning d-flex align-items-start gap-3 p-4 rounded-3" role="alert">
                                <div class="fs-3">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <div class="fw-bold mb-1">Form sidang belum ditampilkan</div>
                                    <div class="mb-2">
                                        Saat ini form sidang belum tersedia. Silakan hubungi admin/prodi untuk mengaktifkan
                                        form.
                                    </div>
                                    <div class="small text-muted">
                                        *Pastikan data form sudah diinput dan status <b>aktif</b> dinyalakan.
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
