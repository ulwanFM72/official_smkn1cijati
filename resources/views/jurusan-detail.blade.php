@extends('layouts.app-public')

@section('title', $jurusan->nama . ' - SMK Negeri 1 Cijati')

@section('content')

<style>
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    :root {
        --jd-blue: #0d63f0;
        --jd-blue-dark: #0a4fc2;
        --jd-blue-soft: #eaf2ff;
        --jd-ink: #101827;
        --jd-ink-soft: #5b6472;
    }

    /* ===== HERO ===== */
    .jd-hero {
        position: relative;
        height: 400px;
        overflow: hidden;
    }
    .jd-hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .jd-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10,20,40,.55) 0%, rgba(10,20,40,.35) 45%, rgba(10,20,40,.75) 100%);
    }
    .jd-hero-content {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0 20px;
        z-index: 2;
    }
    .jd-hero-badge {
        width: 84px;
        height: 84px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 14px 32px -8px rgba(0,0,0,.35);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        overflow: hidden;
        animation: fadeSlideUp .5s ease both;
    }
    .jd-hero-badge img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
    }
    .jd-hero-content h1 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.3rem, 2.4vw, 1.8rem);
        letter-spacing: -0.01em;
        margin-bottom: 10px;
        animation: fadeSlideUp .6s ease both .05s;
    }
    .jd-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #eaf2ff;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.25);
        padding: 6px 16px;
        border-radius: 999px;
        backdrop-filter: blur(4px);
        animation: fadeSlideUp .6s ease both .1s;
    }

    /* ===== SECTION SHARED ===== */
    .jd-section {
        padding: 64px 0;
    }
    .jd-section-head {
        max-width: 680px;
        margin: 0 auto 40px;
        text-align: center;
    }
    .jd-section-eyebrow {
        display: inline-block;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--jd-blue);
        background: var(--jd-blue-soft);
        padding: 5px 14px;
        border-radius: 999px;
        margin-bottom: 14px;
    }
    .jd-section-head h2 {
        font-weight: 800;
        font-size: clamp(1.4rem, 2.4vw, 1.8rem);
        color: var(--jd-ink);
        letter-spacing: -0.01em;
        margin-bottom: 10px;
    }
    .jd-section-head p {
        color: var(--jd-ink-soft);
        font-size: .98rem;
        margin: 0;
    }

    /* ===== DESKRIPSI ===== */
    .jd-desc-card {
        background: #fff;
        border-radius: 26px;
        border-left: 7px solid var(--jd-blue);
       box-shadow: 0 0 40px rgba(16,24,39,.10), 0 24px 50px -20px rgba(13,99,240,.32);
        padding: 44px 48px;
        max-width: 880px;
        margin: 0 auto;
    }
    .jd-desc-card p {
        line-height: 1.9;
        color: #374151;
        font-size: 1.02rem;
        margin-bottom: 20px;
    }
    .jd-desc-card p:last-child {
        margin-bottom: 0;
    }

    /* ===== KOMPETENSI ===== */
    .jd-kompetensi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 22px;
    }
    .jd-kompetensi-card {
        background: #fff;
        border-radius: 18px;
        padding: 28px 24px;
        box-shadow: 0 14px 30px -18px rgba(16,24,39,.18);
        text-align: center;
        transition: transform .3s ease, box-shadow .3s ease;
        animation: fadeSlideUp .5s ease both;
    }
    .jd-kompetensi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -16px rgba(13,99,240,.22);
    }
    .jd-kompetensi-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: var(--jd-blue-soft);
        color: var(--jd-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin: 0 auto 16px;
    }
    .jd-kompetensi-card h5 {
        font-weight: 700;
        font-size: 1rem;
        color: var(--jd-ink);
        margin-bottom: 8px;
    }
    .jd-kompetensi-card p {
        font-size: .88rem;
        color: var(--jd-ink-soft);
        line-height: 1.6;
        margin: 0;
    }

    /* ===== MATA PELAJARAN ===== */
    .jd-mapel-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
    }
    .jd-mapel-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff;
        border: 1px solid #eef1f8;
        border-radius: 16px;
        padding: 18px 20px;
        transition: border-color .25s ease, transform .25s ease;
    }
    .jd-mapel-card:hover {
        border-color: var(--jd-blue);
        transform: translateY(-3px);
    }
    .jd-mapel-dot {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: linear-gradient(140deg, var(--jd-blue), var(--jd-blue-dark));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }
    .jd-mapel-card span {
        font-weight: 600;
        font-size: .92rem;
        color: var(--jd-ink);
        line-height: 1.35;
    }

    /* ===== GURU PRODUKTIF ===== */
    .jd-guru-section {
    padding: 56px 0 32px;
    }
    .jd-guru-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 220px));
        justify-content: center;
        gap: 24px;
    }
    .jd-guru-card {
        background: #fff;
        border-radius: 20px;
        padding: 18px 18px 22px;
        text-align: center;
        box-shadow: 0 16px 34px -20px rgba(16,24,39,.20);
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .jd-guru-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 22px 42px -18px rgba(13,99,240,.25);
    }
    .jd-guru-photo {
        width: 100%;
        aspect-ratio: 3 / 4;
        border-radius: 14px;
        overflow: hidden;
        background: var(--jd-blue-soft);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .jd-guru-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .jd-guru-photo i {
        color: var(--jd-blue);
        font-size: 2.4rem;
    }
    .jd-guru-nama {
        font-weight: 600;
        font-size: .95rem;
        color: var(--jd-ink);
        line-height: 1.35;
    }

    /* ===== KEPALA JURUSAN ===== */
    .jd-kepala-card {
        max-width: 350px;
        margin: 24px auto 0;
        background: #fff;
        border-radius: 24px;
        padding: 27px 22px 23px;
        text-align: center;
        box-shadow: 0 24px 50px -22px rgba(16,24,39,.22);
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .jd-kepala-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 30px 58px -20px rgba(13,99,240,.28);
    }
    .jd-kepala-title {
        font-weight: 700;
        font-size: 1.15rem;
        color: var(--jd-ink);
        margin-bottom: 22px;
    }
    .jd-kepala-photo {
        width: 100%;
        max-width: 250px;
        margin: 0 auto 22px;
        border-radius: 18px;
        overflow: hidden;
        background: var(--jd-blue-soft);
        aspect-ratio: 3 / 4;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .jd-kepala-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .jd-kepala-photo i {
        color: var(--jd-blue);
        font-size: 3.5rem;
    }
    .jd-kepala-label {
        display: inline-block;
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: var(--jd-blue);
        margin-bottom: 6px;
    }
    .jd-kepala-nama {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--jd-ink);
        line-height: 1.3;
    }
    .jd-kepala-jabatan {
        font-size: .88rem;
        color: var(--jd-ink-soft);
        margin: 4px 0 0;
    }

    @media (max-width: 480px) {
        .jd-desc-card { padding: 28px 22px; }
        .jd-kepala-card { padding: 28px 20px; }
    }
</style>


<!-- ======================= 1. HEADER DETAIL JURUSAN ======================= -->
<section class="jd-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="{{ $jurusan->nama }}">
    <div class="jd-hero-content">
        @if($jurusan->logo)
            <div class="jd-hero-badge">
                <img src="{{ asset('storage/' . $jurusan->logo) }}" alt="Logo {{ $jurusan->nama }}">
            </div>
        @endif
        <span class="jd-hero-eyebrow">{{ $jurusan->nama }}</span>
    </div>
</section>


<!-- ======================= 2. DESKRIPSI JURUSAN ======================= -->
<section class="jd-section" style="background:#fff;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow" style= "font-size:1.3rem;">Tentang Program</span>
            <p>Membangun kompetensi menuju dunia kerja</p>
        </div>

        <div class="jd-desc-card">
            @foreach(explode("\n", trim($jurusan->deskripsi)) as $paragraf)
                @if(trim($paragraf) !== '')
                    <p>{{ trim($paragraf) }}</p>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- =======================  KEPALA JURUSAN ======================= -->
@if($jurusan->guru)
<section class="jd-section" style="background:#f8f9fc;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Penanggung Jawab Program</span>
            <p>Guru koordinator program</p>

        <div class="jd-kepala-card">
            <div class="jd-kepala-title">Kepala Konsentrasi Keahlian</div>

           <div class="jd-kepala-photo">
                @if($jurusan->guru->foto)
                    <img src="{{ asset('storage/' . $jurusan->guru->foto) }}" alt="{{ $jurusan->guru->nama }}">
                @else
                    <img src="{{ asset('images/kepala-rpl.jpg') }}" alt="{{ $jurusan->guru->nama }}">
                @endif
             </div>

            <div class="jd-kepala-nama">{{ $jurusan->guru->nama }}</div>

        </div>

    </div>

</section>

@endif

<!-- ======================= GURU PRODUKTIF ======================= -->
<section class="jd-section jd-guru-section">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Tenaga Pengajar</span>
            <p>Didukung tenaga pengajar yang kompeten</p>
        </div>

        {{--
            Daftar guru produktif diatur MANUAL di sini per jurusan,
            berdasarkan potongan nama (tanpa gelar) yang ada di kolom
            `nama` tabel guru. Pencocokan pakai LIKE '%nama%' supaya
            tidak gagal gara-gara beda titik/spasi pada gelar.
            RPL = 1, APHP = 2, BDP = 3, TKR = 4
        --}}
        @php
            $namaGuruProduktif = match($jurusan->id) {
                1 => [ // RPL
                    'Didi Mei Somantri',
                    'Silvi Danu Respita',
                    'Bani Fudoly',
                    'Wahyudin',
                    'Sima Kristiana',
                ],
                2 => [ // APHP
                    'Budiana',
                    'Ende Iskandar',
                ],
                3 => [ // BDP / Pemasaran
                    'Eli Maryamah',
                    'Nanang Suryana',
                    'Setiawan, S.E',
                    'Dini Andriani',
                    'Kamalia',
                ],
                4 => [ // TKR / Otomotif
                    'Andri Muhoir',
                    'Jajang Ridwan',
                ],
                default => [],
            };

            $guruProduktif = collect($namaGuruProduktif)
                ->map(function ($nama) {
                    return \App\Models\Guru::where('nama', 'like', '%' . trim($nama) . '%')->first();
                })
                ->filter();
        @endphp

        <div class="jd-guru-grid">
            @foreach($guruProduktif as $gp)
                <div class="jd-guru-card">
                    <div class="jd-guru-photo">
                        @if($gp->foto)
                            <img src="{{ asset('storage/' . $gp->foto) }}" alt="{{ $gp->nama }}">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <div class="jd-guru-nama">{{ $gp->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ======================= 3. KOMPETENSI YANG DIPELAJARI ======================= -->
<section class="jd-section" style="background:#f8f9fc;">
    <div class="container">
        <div class="jd-section-head">
            <span class="jd-section-eyebrow">Kompetensi yang Dipelajari</span>
            <p>Keterampilan utama yang dibangun sepanjang program {{ $jurusan->nama }}</p>
        </div>

        @php
            $kompetensi = match($jurusan->id) {
                1 => [ // RPL - Rekayasa Perangkat Lunak
                    ['icon' => 'fa-code', 'judul' => 'Pemrograman', 'desc' => 'Menulis dan menguji kode program secara terstruktur dan efisien.'],
                    ['icon' => 'fa-database', 'judul' => 'Basis Data', 'desc' => 'Merancang dan mengelola basis data untuk kebutuhan aplikasi.'],
                    ['icon' => 'fa-diagram-project', 'judul' => 'Rekayasa Sistem', 'desc' => 'Merancang alur dan struktur sistem sesuai kebutuhan pengguna.'],
                    ['icon' => 'fa-mobile-screen-button', 'judul' => 'Pengembangan Aplikasi', 'desc' => 'Membangun aplikasi berbasis web maupun mobile.'],
                ],
                2 => [ // APHP - Agribisnis Pengolahan Hasil Pertanian
                    ['icon' => 'fa-seedling', 'judul' => 'Pengolahan Hasil Pertanian', 'desc' => 'Mengolah bahan pertanian menjadi produk pangan bernilai jual.'],
                    ['icon' => 'fa-flask', 'judul' => 'Uji Mutu Produk', 'desc' => 'Menguji kualitas dan keamanan produk hasil olahan.'],
                    ['icon' => 'fa-box', 'judul' => 'Pengemasan Produk', 'desc' => 'Mengemas produk agar aman, menarik, dan tahan lama.'],
                    ['icon' => 'fa-industry', 'judul' => 'Manajemen Produksi', 'desc' => 'Mengelola proses produksi pangan secara efisien.'],
                ],
                3 => [ // BDP - Bisnis Daring dan Pemasaran
                    ['icon' => 'fa-cart-shopping', 'judul' => 'Pemasaran Digital', 'desc' => 'Memasarkan produk dan jasa melalui platform digital.'],
                    ['icon' => 'fa-chart-line', 'judul' => 'Analisis Pasar', 'desc' => 'Menganalisis peluang dan tren pasar untuk strategi bisnis.'],
                    ['icon' => 'fa-handshake', 'judul' => 'Komunikasi Bisnis', 'desc' => 'Melakukan negosiasi dan pelayanan pelanggan secara profesional.'],
                    ['icon' => 'fa-file-invoice-dollar', 'judul' => 'Administrasi Transaksi', 'desc' => 'Mengelola pencatatan dan administrasi penjualan.'],
                ],
                4 => [ // TKR - Teknik Kendaraan Ringan
                    ['icon' => 'fa-car', 'judul' => 'Perawatan Kendaraan', 'desc' => 'Melakukan perawatan berkala pada kendaraan ringan.'],
                    ['icon' => 'fa-wrench', 'judul' => 'Perbaikan Mesin', 'desc' => 'Mendiagnosis dan memperbaiki kerusakan mesin kendaraan.'],
                    ['icon' => 'fa-car-battery', 'judul' => 'Kelistrikan Otomotif', 'desc' => 'Menangani sistem kelistrikan dan komponen elektronik kendaraan.'],
                    ['icon' => 'fa-gauge', 'judul' => 'Sistem Kemudi & Rem', 'desc' => 'Memeriksa dan memperbaiki sistem kemudi, rem, dan suspensi.'],
                ],
                default => [
                    ['icon' => 'fa-graduation-cap', 'judul' => 'Kompetensi Umum', 'desc' => 'Kompetensi dasar sesuai bidang keahlian.'],
                ],
            };
        @endphp

        <div class="jd-kompetensi-grid">
            @foreach($kompetensi as $k)
                <div class="jd-kompetensi-card">
                    <div class="jd-kompetensi-icon">
                        <i class="fas {{ $k['icon'] }}"></i>
                    </div>
                    <h5>{{ $k['judul'] }}</h5>
                    <p>{{ $k['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection