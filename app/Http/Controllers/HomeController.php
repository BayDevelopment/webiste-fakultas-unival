<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomeControl()
    {
        $data = [
            'title' => 'Fakultas Ilmu Komputer - Universitas Al-Khairiyah',
            'navlink' => 'Beranda'
        ];
        return view('pages.index', $data);
    }

    public function PageTentangKami()
    {
        $data = [
            'title' => 'Tentang Kami - Fakultas Ilmu Komputer',
            'navlink' => 'Tentang Kami'
        ];
        return view('pages.tentang', $data);
    }
    public function show(string $slug)
    {
        $data = [
            'title' => 'Profile Prodi Informatika - Fakultas Ilmu Komputer',
            'navlink' => 'teknik-informatika',

            'teknik-informatika' => [
                'nama' => 'Teknik Informatika',
                'slug' => 'teknik-informatika',
                'slug' => 'teknik-informatika',
                'tagline' => 'Teknik Informatika.',
                'jenjang' => 'S1',
                'headline' => 'Belajar praktikal, bangun portofolio, dan siap masuk industri.',
                'deskripsi' => 'Fokus pada pemrograman, sistem, data, cloud, dan praktik pengembangan software modern.',

                // ✅ VISI & MISI
                'visi' => 'Menjadi Program Studi Teknik Informatika yang unggul dalam bidang Teknologi Informasi pada tahun 2030 di Banten.',
                'misi' => [
                    'Menyiapkan generasi muda umat yang mampu menghadapi tantangan globalisasi dengan membekali diri pada kemampuan hidup pada bidang teknologi informasi menuju insan kamil yang berakhlak mulia.',
                ],

                // ✅ SEJARAH (dipindah keluar dari misi)
                'sejarah' => 'Teknik Informatika adalah salah satu Program Studi yang ada pada Fakultas Ilmu Komputer Universitas Al-Khairiyah yang berada dibawah naungan Yayasan Al-Khairiyah Kota Cilegon melalui SK Mendiknas NO. 203/D/0/2004 tanggal 30 Desember 2004 dengan program studi Teknik Informatika (S1) berdiri pada saat masih berstatus sekolah tinggi ilmu komputer yang sekarang beralih status menjadi Universitas Al-Khairiyah. Saat ini di usianya yang ke 18 tahun, Program Studi Teknik Informatika terus bergeliat untuk berbenah dan mengembangkan diri menjadi Program Studi Teknik Informatika di Kota Cilegon yang unggul dan terbaik di Provinsi Banten. Untuk itu dengan didukung tenaga pendidik (dosen) dan tenaga kependidikan yang profesional, Program Studi Teknik Informatika memiliki komitmen untuk terus berupaya menghasilkan lulusan yang menguasai ilmu pengetahuan teknologi informasi, komunikasi dan multimedia yang handal serta mampu menghadapi persaingan global. Selanjutnya sebagai institusi Pendidikan Tinggi yang patuh pada Peraturan Menteri Riset, Teknologi, Dan Pendidikan Tinggi Republik Indonesia Nomor 32 Tahun 2016 tentang keharusan Akreditasi, Alhamdulillah Program Studi Teknik Informatika baik institusi maupun seluruh Program Studi telah terakreditasi oleh Badan Akreditasi Nasional Pendidikan Tinggi (BAN-PT).',

                'highlights' => [
                    ['icon' => 'fa-solid fa-code', 'text' => 'Kurikulum relevan industri'],
                    ['icon' => 'fa-solid fa-database', 'text' => 'Dasar data & sistem kuat'],
                    ['icon' => 'fa-solid fa-cloud', 'text' => 'Cloud & deployment'],
                    ['icon' => 'fa-solid fa-shield-halved', 'text' => 'Security awareness'],
                ],
                'karier_list' => [
                    'Web / Mobile Developer',
                    'Backend Engineer',
                    'Data Analyst / BI',
                    'QA Engineer',
                    'DevOps (junior)',
                    'IT Support / SysAdmin',
                ],
            ],

            'manajemen-informatika' => [
                'nama' => 'Manajemen Informatika',
                'slug' => 'manajemen-informatika',
                'navlink' => 'manajemen-informatika',
                'tagline' => 'Manajemen Informatika.',
                'jenjang' => 'D3',
                'headline' => 'Belajar manajemen + teknologi untuk bisnis digital & sistem informasi.',
                'deskripsi' => 'Memadukan skill teknologi dengan analisis proses bisnis, pelaporan data, dan implementasi sistem informasi.',

                // ✅ VISI & MISI
                'visi' => 'Menjadi Program Studi Manajemen Informatika yang unggul dalam bidang Teknologi Informasi pada tahun 2030 di Banten.',
                'misi' => [
                    'Menyiapkan umat yang mampu menghadapi tantangan globalisasi dengan membekali diri pada kemampuan hidup pada bidang manajemen informatika menuju insan yang berakhlak mulia.',
                ],

                // ✅ SEJARAH (sudah benar posisinya)
                'sejarah' => 'Manajemen Informatika adalah salah satu Program Studi yang ada pada Fakultas Ilmu Komputer Universitas Al-Khairiyah yang berada dibawah naungan Yayasan Al-Khairiyah Kota Cilegon melalui SK Mendiknas NO. 203/D/0/2004 tanggal 30 Desember 2004 dengan program studi Manajemen Informatika (D3) berdiri pada saat masih berstatus sekolah tinggi ilmu komputer yang sekarang beralih status menjadi Universitas Al-Khairiyah. Saat ini di usianya yang ke 18 tahun, Program Studi Manajemen Informatika terus bergeliat untuk berbenah dan mengembangkan diri menjadi Program Studi Manajemen Informatika di Kota Cilegon yang unggul dan terbaik di Provinsi Banten. Untuk itu dengan didukung tenaga pendidik (dosen) dan tenaga kependidikan yang profesional, Program Studi Manajemen Informatika memiliki komitmen untuk terus berupaya menghasilkan lulusan yang menguasai ilmu pengetahuan teknologi informasi, komunikasi dan multimedia yang handal serta mampu menghadapi persaingan global. Selanjutnya sebagai institusi Pendidikan Tinggi yang patuh pada Peraturan Menteri Riset, Teknologi, Dan Pendidikan Tinggi Republik Indonesia Nomor 32 Tahun 2016 tentang keharusan Akreditasi, Alhamdulillah Program Studi Manajemen Informatika baik institusi maupun seluruh Program Studi telah terakreditasi oleh Badan Akreditasi Nasional Pendidikan Tinggi (BAN-PT).',

                'highlights' => [
                    ['icon' => 'fa-solid fa-sitemap', 'text' => 'Analisis proses bisnis'],
                    ['icon' => 'fa-solid fa-diagram-project', 'text' => 'Manajemen proyek TI'],
                    ['icon' => 'fa-solid fa-chart-line', 'text' => 'Reporting & BI dasar'],
                    ['icon' => 'fa-solid fa-people-group', 'text' => 'Kolaborasi & komunikasi'],
                ],
                'karier_list' => [
                    'Business / System Analyst',
                    'IT Project Coordinator / PMO',
                    'Data Reporting / Analyst',
                    'Product / Project Support',
                    'IT Governance (junior)',
                    'Helpdesk / IT Support',
                ],
            ],
        ];

        abort_unless(isset($data[$slug]), 404);

        $prodi = $data[$slug];

        $skList = [
            ['judul' => 'SK Pendirian Program Studi', 'nomor' => 'No. 123/ABC/2020', 'file' => '#'],
            ['judul' => 'SK Kurikulum & Pedoman Akademik', 'nomor' => 'No. 456/DEF/2022', 'file' => '#'],
        ];

        $dosen = [
            ['name' => 'Dr. Nama Dosen', 'role' => 'Kaprodi', 'img' => 'https://i.pravatar.cc/200?img=11'],
            ['name' => 'Nama Dosen, M.Kom', 'role' => 'Dosen', 'img' => 'https://i.pravatar.cc/200?img=22'],
            ['name' => 'Nama Dosen, M.T', 'role' => 'Dosen', 'img' => 'https://i.pravatar.cc/200?img=33'],
        ];

        return view('pages.profile-prodi', compact('prodi', 'skList', 'dosen'), $data);
    }



    public function PageKegiatan()
    {
        $data = [
            'title' => 'Kegiatan - Fakultas Ilmu Komputer',
            'navlink' => 'kegiatan'
        ];
        return view('pages.kegiatan', $data);
    }
    public function PageKontak()
    {
        $data = [
            'title' => 'Kontak - Fakultas Ilmu Komputer',
            'navlink' => 'Kontak'
        ];
        return view('pages.kontak', $data);
    }
    public function PageKuisioner($slug)
    {
        $maps = [
            'dosen' => [
                'title' => 'Kuisioner Dosen - Fakultas Ilmu Komputer',
                'subtitle' => 'Silakan isi kuisioner dosen sesuai periode yang tersedia.',
                'items' => [
                    ['label' => 'Ganjil tahun ajaran 2018/2019', 'key' => 'ganjil_2018_2019', 'link' => '#'],
                    ['label' => 'Genap tahun ajaran 2018/2019',  'key' => 'genap_2018_2019',  'link' => '#'],
                    ['label' => 'Ganjil tahun ajaran 2019/2020', 'key' => 'ganjil_2019_2020', 'link' => '#'],
                    ['label' => 'Genap tahun ajaran 2019/2020',  'key' => 'genap_2019_2020',  'link' => '#'],
                    ['label' => 'Ganjil tahun ajaran 2020/2021', 'key' => 'ganjil_2020_2021', 'link' => '#'],
                    ['label' => 'Genap tahun ajaran 2020/2021',  'key' => 'genap_2020_2021',  'link' => '#'],
                    ['label' => 'Ganjil tahun ajaran 2021/2022', 'key' => 'ganjil_2021_2022', 'link' => '#'],
                    ['label' => 'Genap tahun ajaran 2021/2022',  'key' => 'genap_2021_2022',  'link' => '#'],
                ],
            ],
            'mahasiswa' => [
                'title' => 'Kuisioner Mahasiswa - Fakultas Ilmu Komputer',
                'subtitle' => 'Silakan isi angket kepuasan mahasiswa sesuai tahun yang tersedia.',
                'items' => [
                    ['label' => 'ANGKET KEPUASAN MAHASISWA 2019 STIKOM', 'key' => 'mhs_2019_stikom', 'link' => '#'],
                    ['label' => 'ANGKET KEPUASAN MAHASISWA 2020 STIKOM', 'key' => 'mhs_2020_stikom', 'link' => '#'],
                    ['label' => 'ANGKET KEPUASAN MAHASISWA 2021 FIK UNIVAL', 'key' => 'mhs_2021_fikunival', 'link' => '#'],
                    ['label' => 'ANGKET KEPUASAN MAHASISWA 2022 FIK UNIVAL', 'key' => 'mhs_2022_fikunival', 'link' => '#'],
                ],
            ],
        ];

        // fallback kalau slug aneh
        $payload = $maps[$slug] ?? $maps['mahasiswa'];

        $data = [
            'title' => $payload['title'],
            'navlink' => 'Kuisioner',
            'slug' => $slug,
            'subtitle' => $payload['subtitle'],
            'items' => $payload['items'],
        ];

        return view('pages.kuisioner', $data);
    }
    public function PagePendaftaranSidang()
    {
        $data = [
            'title'   => 'Form Pendaftaran Sidang - Fakultas Ilmu Komputer',
            'navlink' => 'Pendaftaran Sidang',

            // dikirim ke view pages/pendaftaran-sidang.blade.php
            'sidang' => [
                'title'    => 'Form Pendaftaran Sidang',
                'subtitle' => 'Silakan pilih jenis sidang yang akan didaftarkan.',
                'desc'     => 'Klik tombol di bawah untuk membuka form pendaftaran.',
                'links'    => [
                    'proposal' => '#', // isi link Google Form sidang proposal
                    'akhir'    => '#', // isi link Google Form sidang akhir
                ],
            ],
        ];

        return view('pages.page-pendaftaran-sidang', $data);
    }
    public function PageSertifikatAkreditasi()
    {
        $data = [
            'title'   => 'Sertifikat Akreditasi - Fakultas Ilmu Komputer',
            'navlink' => 'Sertifikat Akreditasi',

            'akreditasi' => [
                'title'    => 'Sertifikat Akreditasi',
                'subtitle' => 'Silakan pilih program studi untuk melihat/unduh sertifikat akreditasi.',
                'desc'     => 'Klik tombol di bawah untuk membuka sertifikat.',
                'links' => [
                    'ti' => 'https://drive.google.com/file/d/1tpHO7BDFdFkm5REExsMrV6XyKeWo1V4j/view',
                    'mi' => null,
                ],

            ],
        ];

        return view('pages.sertifikat-akreditasi', $data);
    }

    public function PageFormBimbingan()
    {
        return view('pages.form-bimbingan', [
            'title' => 'Form Bimbingan - Fakultas Ilmu Komputer',
            'navlink' => 'Form Bimbingan',
            'bimbingan' => [
                'title' => 'Form Bimbingan',
                'subtitle' => 'Silakan pilih jenis bimbingan.',
                'desc' => 'Klik tombol di bawah untuk membuka form.',
                'links' => [
                    'kkp' => '#',      // isi link form bimbingan KKP
                    'skripsi' => '#',  // isi link form bimbingan Skripsi
                ],
            ],
        ]);
    }
}
