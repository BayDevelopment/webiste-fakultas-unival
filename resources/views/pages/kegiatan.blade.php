@extends('layouts.app')

@section('content')
    @php
        use Illuminate\Support\Carbon;
        use Illuminate\Support\Facades\Route;

        // dari controller (sudah gabungan mendatang + selesai, max 3)
        $kegiatan = $kegiatan ?? collect();

        $pageTitle = $navlink ?? 'Kegiatan';
        $pageTagline = 'Agenda, seminar, workshop, dan kegiatan terbaru.';

        $heroCover = $heroCover ?? asset('images/kegiatan-cover.jpg');
        $heroCoverFallback =
            'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1400&q=70';

        $detailUrl = function ($id) {
            return Route::has('kegiatan.show') ? route('kegiatan.show', $id) : url('/kegiatan/' . $id);
        };

        // kalender opsional (anchor saja, bukan route)
        $kalenderUrl = '#kalender';

        $today = Carbon::today();
    @endphp

    <main class="py-5 prodi-page">
        <div class="container">

            {{-- Breadcrumb + Title --}}
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-4">
                <div>
                    <div class="text-muted small mb-1">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted">Beranda</a>
                        <span class="mx-2">/</span>
                        <span class="text-muted">Informasi</span>
                        <span class="mx-2">/</span>
                        <span class="text-muted">{{ $pageTitle }}</span>
                    </div>

                    <h1 class="fw-bold prodi-title mb-1">{{ $pageTitle }}</h1>

                    <p class="text-muted mb-0 prodi-subtitle">
                        {{ $pageTagline }}
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="#kegiatan" class="btn btn-see-all fw-semibold px-3 py-2">
                        Lihat Kegiatan <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>

                    <a href="{{ $kalenderUrl }}" class="btn btn-cta fw-semibold px-4 py-2">
                        Lihat Kalender <i class="fa-solid fa-calendar-days ms-2"></i>
                    </a>
                </div>
            </div>

            {{-- HERO --}}
            <section class="row g-4 align-items-center mb-5">
                <div class="col-lg-7">
                    <div class="prodi-hero-card p-4 p-lg-5 h-100">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-bullhorn me-2"></i>
                                Update Agenda
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-users me-2"></i>
                                Terbuka untuk Mahasiswa
                            </span>
                            <span class="badge prodi-badge">
                                <i class="fa-solid fa-certificate me-2"></i>
                                Sertifikat (opsional)
                            </span>
                        </div>

                        <h2 class="fw-bold mb-3 prodi-h2">
                            Jangan ketinggalan kegiatan terbaru!
                        </h2>

                        <p class="text-muted mb-4">
                            Menampilkan <span class="fw-semibold">maksimal 3 kegiatan</span> (gabungan
                            <span class="fw-semibold">mendatang + selesai</span>) yang aktif.
                        </p>

                        {{-- STAT BOX (pakai data controller: semua data aktif, bukan hanya yang tampil) --}}
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $jumlahMendatang ?? '—' }}</div>
                                    <div class="text-muted small">Mendatang</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $jumlahSelesai ?? '—' }}</div>
                                    <div class="text-muted small">Selesai</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $totalKegiatan ?? '—' }}</div>
                                    <div class="text-muted small">Total</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prodi-stat">
                                    <div class="prodi-stat-num">{{ $totalKategori ?? '—' }}</div>
                                    <div class="text-muted small">Kategori</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="#kegiatan" class="btn btn-modern-primary fw-semibold px-3 py-2">
                                <i class="fa-solid fa-layer-group me-2"></i> Lihat Kegiatan
                            </a>
                            <a href="#kalender" class="btn btn-see-all fw-semibold px-3 py-2">
                                <i class="fa-solid fa-calendar-days me-2"></i> Cek Kalender
                            </a>
                        </div>

                        <div class="prodi-mini mt-4">
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Hanya yang aktif tampil
                            </div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Mendatang + selesai
                                digabung</div>
                            <div class="prodi-mini-item"><i class="fa-solid fa-circle-check"></i> Ringkas & jelas</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="prodi-image-wrap h-100">
                        <img src="{{ $heroCover }}" alt="Cover Kegiatan" class="prodi-image"
                            onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                        <div class="prodi-image-overlay"></div>

                        <div class="prodi-float-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="prodi-float-ic"><i class="fa-solid fa-bolt"></i></div>
                                <div>
                                    <div class="fw-bold">Stay updated</div>
                                    <div class="text-muted small">Agenda resmi & info kegiatan terbaru.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- KEGIATAN (maks 3 item gabungan) --}}
            <section id="kegiatan" class="mb-5">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                    <div>
                        <h2 class="fw-bold mb-1 prodi-h3">Kegiatan Terbaru</h2>
                        <p class="text-muted mb-0">Menampilkan maksimal 3 kegiatan aktif (mendatang + selesai).</p>
                    </div>
                </div>

                @if ($kegiatan->count())
                    <div class="row g-4">
                        @foreach ($kegiatan as $k)
                            @php
                                // Karena di model sudah cast date, aman pakai $k->activity_date sebagai Carbon
                                $tgl = $k->activity_date ?? null;
                                $tglText = $tgl ? Carbon::parse($tgl)->translatedFormat('d M Y') : 'TBA';

                                $kat = $k->type ?? 'Umum';

                                $cover = !empty($k->cover_image)
                                    ? asset('storage/' . $k->cover_image)
                                    : 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=70';

                                $link = $detailUrl($k->id);

                                // accessor model kamu sudah auto, tapi kita tetap aman:
                                $badgeBg = !empty($k->warna_kalender)
                                    ? 'background:' . e($k->warna_kalender) . ';'
                                    : '';

                                // ✅ SELARAS controller: mendatang kalau >= hari ini (today termasuk mendatang)
                                $isUpcoming = $tgl ? Carbon::parse($tgl)->gte($today) : null;
                            @endphp

                            <div class="col-md-6 col-lg-4">
                                <div class="card rounded-4 h-100 overflow-hidden border-0 shadow-sm kegiatan-card">
                                    <div class="position-relative" style="height:210px; background:#f4f6f8;">
                                        <img src="{{ $cover }}" class="w-100 h-100 object-fit-cover"
                                            alt="{{ $k->title ?? 'Kegiatan' }}"
                                            onerror="this.src='{{ $heroCoverFallback }}'; this.onerror=null;">
                                        <div class="position-absolute top-0 start-0 w-100 h-100"
                                            style="background:linear-gradient(to bottom, rgba(0,0,0,.05), rgba(0,0,0,.55));">
                                        </div>

                                        <div class="position-absolute top-0 start-0 p-3 d-flex gap-2 flex-wrap">
                                            <span class="badge rounded-pill px-3 py-2 prodi-badge"
                                                style="{{ $badgeBg }}">
                                                <i class="fa-solid fa-tag me-1"></i> {{ $kat }}
                                            </span>

                                            @if (!empty($k->status_kegiatan))
                                                <span class="badge rounded-pill px-3 py-2 prodi-badge">
                                                    <i class="fa-solid fa-flag me-1"></i> {{ $k->status_kegiatan }}
                                                </span>
                                            @endif

                                            @if (!is_null($isUpcoming))
                                                <span
                                                    class="badge rounded-pill px-3 py-2 {{ $isUpcoming ? 'bg-success' : 'bg-dark' }}">
                                                    <i
                                                        class="fa-solid {{ $isUpcoming ? 'fa-clock' : 'fa-check' }} me-1"></i>
                                                    {{ $isUpcoming ? 'Mendatang' : 'Selesai' }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="text-muted small mb-2">
                                            <i class="fa-regular fa-calendar me-1"></i> {{ $tglText }}
                                        </div>

                                        <h5 class="fw-bold text-dark mb-2"
                                            style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                            {{ $k->title ?? 'Judul Kegiatan' }}
                                        </h5>

                                        @if (!empty($k->excerpt))
                                            <p class="text-muted mb-0"
                                                style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                                                {{ $k->excerpt }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="prodi-card p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="prodi-ic"><i class="fa-solid fa-circle-info"></i></div>
                            <div>
                                <div class="prodi-card-title">Belum ada kegiatan</div>
                                <div class="text-muted">Kegiatan akan muncul di sini jika sudah diaktifkan.</div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>

            {{-- KALENDER --}}
            <section id="kalender" class="mb-5">
                <div class="prodi-card p-4 p-lg-5">
                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-2 mb-3">
                        <div class="prodi-card-head mb-0">
                            <div class="prodi-ic"><i class="fa-solid fa-calendar-days"></i></div>
                            <div>
                                <div class="prodi-card-title">Kalender Kegiatan</div>
                                <div class="prodi-card-sub">Pantau jadwal dalam format kalender</div>
                            </div>
                        </div>
                    </div>

                    {{-- ✅ FullCalendar container --}}
                    <div id="kegiatanCalendar" style="min-height:650px"></div>
                </div>
            </section>


        </div>
    </main>
@endsection

{{-- ✅ taruh di bawah (paling aman pakai @push jika layout punya @stack('scripts')) --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">
    <style>
        /* ===== Container card feel ===== */
        #kegiatanCalendar.gc-like {
            background: #fff;
            border-radius: 20px;
            padding: 14px;
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: 0 6px 18px rgba(15, 23, 42, .06);
        }

        /* ===== Toolbar (Google-ish) ===== */
        .fc .fc-header-toolbar {
            margin: 4px 2px 14px !important;
            gap: 10px;
            align-items: center;
        }

        .fc .fc-toolbar-title {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .2px;
        }

        /* buttons */
        .fc .fc-button {
            border-radius: 999px !important;
            padding: 7px 12px !important;
            font-weight: 700 !important;
            border: 1px solid rgba(15, 23, 42, .14) !important;
            background: #fff !important;
            box-shadow: 0 1px 0 rgba(15, 23, 42, .04);
        }

        .fc .fc-button:hover {
            background: rgba(15, 23, 42, .04) !important;
        }

        .fc .fc-button:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .12) !important;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active {
            background: rgba(37, 99, 235, .10) !important;
            border-color: rgba(37, 99, 235, .25) !important;
            color: inherit !important;
        }

        .fc .fc-button:disabled {
            opacity: .55;
        }

        /* ===== Grid look ===== */
        .fc .fc-scrollgrid,
        .fc .fc-scrollgrid table {
            border-color: rgba(15, 23, 42, .08) !important;
        }

        /* header hari */
        .fc .fc-col-header-cell {
            background: rgba(15, 23, 42, .025);
        }

        .fc .fc-col-header-cell-cushion {
            padding: 10px 0 !important;
            font-weight: 800;
            font-size: 11.5px;
            letter-spacing: .8px;
            text-transform: uppercase;
            color: rgba(15, 23, 42, .55);
        }

        /* cell */
        .fc .fc-daygrid-day-frame {
            padding: 8px;
            min-height: 120px;
        }

        .fc .fc-daygrid-day {
            transition: background .15s ease;
        }

        .fc .fc-daygrid-day:hover {
            background: rgba(37, 99, 235, .04);
        }

        /* angka tanggal */
        .fc .fc-daygrid-day-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 999px;
            font-weight: 800;
            color: rgba(15, 23, 42, .62);
        }

        /* today highlight lebih halus */
        .fc .fc-day-today {
            background: rgba(37, 99, 235, .06) !important;
        }

        .fc .fc-day-today .fc-daygrid-day-number {
            background: rgba(37, 99, 235, .14);
            color: rgba(15, 23, 42, .85);
        }

        /* ===== Event pill ===== */
        .fc .fc-daygrid-event {
            border: 0 !important;
            border-radius: 999px !important;
            padding: 3px 10px !important;
            font-weight: 800;
            font-size: 12px;
            line-height: 1.2;
            box-shadow: 0 1px 0 rgba(15, 23, 42, .08);
            transition: transform .12s ease, filter .12s ease;
        }

        .fc .fc-daygrid-event:hover {
            transform: translateY(-1px);
            filter: brightness(.98);
        }

        .fc .fc-daygrid-event .fc-event-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* “+ more” */
        .fc .fc-daygrid-more-link {
            font-weight: 800;
            color: rgba(37, 99, 235, .9);
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            #kegiatanCalendar.gc-like {
                padding: 12px;
                border-radius: 16px;
            }

            .fc .fc-toolbar-title {
                font-size: 16px;
            }

            .fc .fc-button {
                padding: 6px 10px !important;
                font-size: 12px !important;
            }

            .fc .fc-daygrid-day-frame {
                min-height: 100px;
                padding: 7px;
            }
        }

        @media (max-width: 576px) {

            /* toolbar jadi 2 baris rapi */
            .fc .fc-header-toolbar {
                flex-wrap: wrap;
                gap: 8px;
            }

            .fc .fc-toolbar-chunk {
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .fc .fc-toolbar-chunk:first-child {
                justify-content: space-between;
            }

            .fc .fc-toolbar-title {
                font-size: 15px;
                text-align: center;
            }

            .fc .fc-daygrid-day-frame {
                min-height: 88px;
                padding: 6px;
            }

            .fc .fc-daygrid-event {
                font-size: 11.5px;
                padding: 3px 8px !important;
            }
        }

        /* ===== Fix arrow prev / next ===== */
        .fc .fc-button .fc-icon {
            color: #1f2937 !important;
            /* gray-800 */
            font-size: 14px;
        }

        .fc .fc-button-primary:not(:disabled) .fc-icon {
            color: #1f2937 !important;
        }

        /* hover */
        .fc .fc-button:hover .fc-icon {
            color: #111827 !important;
        }

        /* disabled */
        .fc .fc-button:disabled .fc-icon {
            color: #9ca3af !important;
            /* gray-400 */
        }

        .fc .fc-button {
            background: #fff !important;
        }

        .fc .fc-button:hover {
            background: rgba(37, 99, 235, .08) !important;
        }

        .fc .fc-button:active {
            background: rgba(37, 99, 235, .14) !important;
        }

        /* ===== FORCE CONSISTENT TOOLBAR BUTTONS ===== */
        .fc .fc-button {
            background: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, .18) !important;
            color: #1f2937 !important;
            border-radius: 999px !important;
            padding: 7px 12px !important;
            font-weight: 700 !important;
            box-shadow: 0 1px 2px rgba(15, 23, 42, .06) !important;
            opacity: 1 !important;
        }

        /* icons (prev / next) */
        .fc .fc-button .fc-icon {
            color: #1f2937 !important;
            font-size: 14px;
        }

        /* hover */
        .fc .fc-button:hover {
            background: rgba(37, 99, 235, .08) !important;
            border-color: rgba(37, 99, 235, .35) !important;
        }

        /* active / pressed */
        .fc .fc-button:active,
        .fc .fc-button.fc-button-active {
            background: rgba(37, 99, 235, .16) !important;
            border-color: rgba(37, 99, 235, .45) !important;
        }

        /* disabled */
        .fc .fc-button:disabled {
            opacity: .45 !important;
            background: #f9fafb !important;
            border-color: rgba(15, 23, 42, .12) !important;
        }

        /* REMOVE ghost background from groups */
        .fc .fc-button-group {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
        }

        /* spacing antar tombol */
        .fc .fc-button-group>.fc-button {
            margin: 0 4px !important;
        }
    </style>
@endpush



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.getElementById('kegiatanCalendar');
            if (!el) return;

            const mq = window.matchMedia('(max-width: 576px)');

            const getToolbar = (mobile) => mobile ? {
                left: 'prev,next',
                center: 'title',
                right: 'today'
            } : {
                left: 'today prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listMonth'
            };

            const getInitialView = (mobile) => mobile ? 'listMonth' : 'dayGridMonth';

            let lastIsMobile = mq.matches;

            const calendar = new FullCalendar.Calendar(el, {
                initialView: getInitialView(lastIsMobile),
                height: 'auto',
                locale: 'id',

                nowIndicator: true,
                dayMaxEvents: true,
                fixedWeekCount: false,
                expandRows: true,

                headerToolbar: getToolbar(lastIsMobile),

                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    list: 'List'
                },

                events: "{{ route('kegiatan.events') }}",

                eventDisplay: 'block',
            });

            calendar.render();

            // ✅ hanya berubah saat breakpoint mobile/desktop BERUBAH (bukan tiap resize kecil)
            mq.addEventListener('change', (e) => {
                const isMobile = e.matches;
                if (isMobile === lastIsMobile) return;

                lastIsMobile = isMobile;

                calendar.setOption('headerToolbar', getToolbar(isMobile));
                calendar.changeView(getInitialView(isMobile));

                // biar layout rapi setelah switch
                setTimeout(() => calendar.updateSize(), 50);
            });
        });
    </script>
@endpush
