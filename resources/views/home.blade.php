@extends('layouts.app-public')

@section('title', 'SMK Negeri 1 Cijati')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
@vite(['resources/css/home.css'])
@endpush

@section('content')

<div id="heroCarousel"
     class="carousel slide carousel-fade hero-carousel"
     data-bs-ride="carousel"
     data-bs-interval="2500"
     data-bs-pause="hover">

    <div class="hero-topbar">
        <span class="hero-identity">SMK NEGERI 1 CIJATI</span>
    </div>

    <div class="carousel-inner">

        @php
            $heroSlides = [
                [
                    'img'     => 'hero-1.jpg',
                    'title'   => 'Tempat Tumbuh, Tempat Berkarya',
                    'desc'    => 'Membangun generasi kompeten, berkarakter, dan siap menghadapi masa depan.',
                ],
                [
                    'img'     => 'hero-2.jpg',
                    'title'   => 'Tumbuh Bersama, Melangkah Bersama',
                    'desc'    => 'Membangun kedisiplinan, kebersamaan, dan karakter untuk masa depan.',
                ],
            ];
        @endphp

        @foreach ($heroSlides as $i => $slide)
            <div class="carousel-item @if ($i === 0) active @endif">
                <div class="hero-slide">
                    <div class="hero-slide__bg" style="background-image: url('{{ asset('images/' . $slide['img']) }}');"></div>
                    <div class="hero-slide__scrim"></div>

                    <div class="hero-slide__content">
                        <div class="hero-slide__content-inner">
                            <h1 class="hero-title">{{ $slide['title'] }}</h1>
                            <p class="hero-desc">{{ $slide['desc'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- TOMBOL PREVIOUS -->
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <!-- TOMBOL NEXT -->
    <button class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

<!-- KEPALA SEKOLAH + STATISTIK -->
<section class="py-5" style="background:#f8f9fc;">
    <div class="container">

        <div class="bg-white p-4 p-md-5" style="border-radius:24px; box-shadow: 0 20px 50px -15px rgba(0,0,0,.10);">

            <div class="row g-4">

                <!-- FOTO KEPALA SEKOLAH -->
                <div class="col-md-2 text-center mb-4 mb-mb-0">
                    <div class="bg-white text-center d-inline-block position-relative"
                         style="border-radius: 20px; padding: 10px; max-width: 300px; box-shadow: 0 20px 40px rgba(0,0,0,.12); border: 1px solid #eef0f3;">

                        <img src="{{ asset('images/kepala-sekolah.png') }}"
                             class="img-fluid rounded-3"
                             style="width: 150%; height: 250px; object-fit: cover; object-position: center 20%;"
                             alt="Kepala Sekolah">

                        <h6 class="fw-bold mt-3 mb-0" style="color:#1f2937; font-size:.95rem;">
                            {{ $profil->kepala_sekolah ?? 'A. Rahmat Dimyati' }}
                        </h6>

                        <span class="d-inline-block mb-1 px-3 py-1"
                              style="color:#2563eb; border-radius:20px; font-size:.85rem; font-weight:600;">
                            Kepala Sekolah
                        </span>
                    </div>
                </div>


                <!-- SAMBUTAN -->
                <div class="col-md-5 d-flex flex-column justify-content-center">

                    <div class="kepsek-nama-judul mb-3">
                        <h3 class="fw-bold mb-0" style="color:#1f2937; font-size:1.3rem;">
                            {{ $profil->kepala_sekolah ?? 'A. Rahmat Dimyati S.Pd, M.Pd.' }}
                        </h3>
                    </div>
                    <div style="width:45px; height:4px; background:#228be6; border-radius:10px; margin-bottom:20px;"></div>

                    <p style="line-height: 1.85; font-size: .95rem; color:#4b5563; margin-bottom:20px;">
                        Assalamu'alaikum Warahmatullahi Wabarakatuh, Puji syukur kita panjatkan ke hadirat Allah SWT atas limpahan rahmat dan karunia-Nya, sehingga SMKN 1 Cijati terus berkembang sebagai lembaga pendidikan vokasi yang unggul, berdaya saing, dan berorientasi pada kemajuan teknologi serta kebutuhan dunia kerja.
                    </p>
                    <p style="line-height: 1.85; font-size: .95rem; color:#4b5563; margin-bottom:24px;">
                        Dalam era digitalisasi ini, kami berkomitmen untuk menghadirkan layanan pendidikan yang inovatif, berbasis teknologi, dan sesuai dengan perkembangan industri.
                    </p>

                    <a href="{{ route('profil') }}"
                       class="btn fw-semibold d-inline-flex align-items-center gap-2"
                       style="width:fit-content; border:1.5px solid #228be6; color:#228be6; border-radius:12px; padding:10px 22px;">
                        Lihat Profil Lengkap
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>


                <!-- STATISTIK -->
                <div class="col-md-5">

                    <div class="statistik-judul-wrap mb-3">
                        <h4 class="fw-bold mb-0" style="color:#1f2937; font-size:1.25rem; margin-top:8px;">Statistik Sekolah</h4>
                    </div>
                    <div style="width:45px; height:4px; background:#228be6; border-radius:10px; margin-bottom:20px; margin-top:-8px;"></div>

                    <div class="row g-3">

                        <div class="col-6">
                            <div class="stat-card-modern">
                                <div class="stat-icon-circle" style="background:#e7f1ff;">
                                    <i class="fas fa-chalkboard-teacher" style="color:#2563eb; font-size:1.3rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-0" style="color:#1f2937;">{{ $jumlahGuru }}</h3>
                                <small class="text-muted">Guru & Staf</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="stat-card-modern">
                                <div class="stat-icon-circle" style="background:#e6f9ee;">
                                    <i class="fas fa-user-graduate" style="color:#22c55e; font-size:1.3rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-0" style="color:#1f2937;">{{ $jumlahSiswa }}</h3>
                                <small class="text-muted">Siswa Aktif</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="stat-card-modern">
                                <div class="stat-icon-circle" style="background:#fff4e6;">
                                    <i class="fas fa-graduation-cap" style="color:#f59e0b; font-size:1.3rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-0" style="color:#1f2937;">{{ $jumlahJurusan }}</h3>
                                <small class="text-muted">Program Keahlian</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="stat-card-modern">
                                <div class="stat-icon-circle" style="background:#fde8ec;">
                                    <i class="fas fa-trophy" style="color:#e11d48; font-size:1.3rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-0" style="color:#1f2937;">{{ $jumlahEkskul }}</h3>
                                <small class="text-muted">ekstrakurikuler</small>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <!-- ================= KEUNGGULAN SEKOLAH ================= -->
            <div class="row g-3 mt-2 pt-4" style="border-top: 1px solid #f1f3f5;">

                <div class="col-md-3">
                    <div class="keunggulan-mini-card">
                        <div class="keunggulan-mini-icon">
                            <i class="fas fa-award" style="color:#2563eb; font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color:#1f2937; font-size:.9rem;">Akreditasi A</h6>
                        <p class="small text-muted mb-0" style="font-size:.78rem;">Terakreditasi dari BAN-S/M</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="keunggulan-mini-card">
                        <div class="keunggulan-mini-icon">
                            <i class="fas fa-trophy" style="color:#2563eb; font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color:#1f2937; font-size:.9rem;">Prestasi Sekolah</h6>
                        <p class="small text-muted mb-0" style="font-size:.78rem;">Berbagai pencapaian siswa dalam berbagai bidang akademik dan nonakademik</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="keunggulan-mini-card">
                        <div class="keunggulan-mini-icon">
                            <i class="fas fa-school" style="color:#2563eb; font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color:#1f2937; font-size:.9rem;">Lingkungan Belajar Inovatif</h6>
                        <p class="small text-muted mb-0" style="font-size:.78rem;">Menciptakan suasana belajar yang nyaman, aman, dan inspiratif.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="keunggulan-mini-card">
                        <div class="keunggulan-mini-icon">
                            <i class="fas fa-seedling" style="color:#2563eb; font-size:1.1rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-1" style="color:#1f2937; font-size:.9rem;">Program Kebiasaan</h6>
                        <p class="small text-muted mb-0" style="font-size:.78rem;">Membentuk karakter siswa melalui kebiasaan positif sehari-hari</p>
                    </div>
                </div>

            </div>


        </div>

    </div>
</section>


<!-- ======================= BERITA & AGENDA ======================= -->
<section class="py-5 " style="padding-top: 4rem !important;">
    <div class="container">

        <div class="text-center mb-5">
           <h2 class="berita-agenda-title d-inline-block" style="color:#1f2937;">
                Berita & Agenda Sekolah
            </h2>
            <p class="text-muted mt-2 mb-0">
                Informasi dan kegiatan terkini {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
            </p>
        </div>

        <div class="row g-5">

            <!-- ======================= BERITA (CAROUSEL) ======================= -->
            <div class="col-lg-8">

                <h4 class="mb-4 text-center" style="color:#1f2937; font-weight:400;">Berita Terbaru</h4>

                <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">

                        @php $chunks = $berita->chunk(2); @endphp

                        @foreach($chunks as $index => $chunk)
                            <div class="carousel-item @if($index === 0) active @endif">
                                <div class="row g-4 align-items-stretch">
                                    @foreach($chunk as $b)
                                        <div class="col-md-6">
                                            <div class="berita-carousel-card bg-white h-100">
                                                @if($b->gambar)
                                                  <img src="{{ asset('storage/' . $b->gambar) }}"
                                                    class="w-100" style="height:220px; object-fit:cover;"
                                                    alt="{{ $b->judul }}">
                                                @endif
                                                    <div class="p-3 ">
                                                        <div class="berita-tanggal mb-2">
                                                            <i class="fas fa-calendar-alt me-1"></i>
                                                            {{ \Carbon\Carbon::parse($b->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                                        </div>
                                                        <h5 class="berita-judul mb-2">{{ $b->judul }}</h5>
                                                        <p class="small text-muted mb-2">
                                                            {{ Str::limit(strip_tags($b->isi), 90) }}
                                                        </p>
                                                           <a href="{{ route('berita.show', $b->id) }}" class="berita-link small">
                                                              Baca selengkapnya →
                                                            </a>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="mt-4 text-center">
                    <div class="d-flex gap-2 mb-3 justify-content-center">
                        <button class="carousel-nav-btn" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-nav-btn" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <a href="{{ route('berita') }}" class="berita-link">
                        → Lihat Semua Berita
                    </a>
                </div>

            </div>


            <!-- ======================= AGENDA ======================= -->
            <div class="col-lg-4 position-relative" style="padding-left: 40px;">
                <div style="position:absolute; left:0; top:0; width:1px; height:500px; background:#e5e7eb;"></div>

                <h4 class="mb-4 text-center" style="color:#1f2937; font-weight:400;">Agenda Sekolah</h4>

                @foreach($agenda->take(5) as $a)
                    <div class="agenda-item">
                        <div class="agenda-tanggal mb-1">
                            <i class="fas fa-calendar me-1"></i>
                            {{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </div>
                        <div class="fw-semibold" style="color:#1f2937; font-size:.92rem;">
                            {{ $a->judul }}
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-3">
                    <a href="{{ route('agenda') }}" class="agenda-link">
                        → Lihat Semua Agenda
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>


<!-- ======================= JURUSAN (KONSENTRASI KEAHLIAN) ======================= -->
<section id="jurusan" class="py-5" style="background:#f8f9fc;">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="jurusan-home-title d-inline-block" style="color:#1f2937; font-weight:400;">
                Konsentrasi Keahlian
            </h2>
            <p class="text-muted mt-2 mb-0">
                Program keahlian unggulan yang mendukung kompetensi dan kesiapan kerja
            </p>
        </div>

        <div class="row g-4 pt-3">

            @foreach($jurusan as $j)
                <div class="col-md-6 col-lg-3">
                    <div class="jurusan-home-card h-100">

                        <div class="jurusan-home-foto-wrap" style="height:180px;">
                            @if($j->gambar)
                                <img src="{{ asset('storage/' . $j->gambar) }}"
                                     class="w-100 h-100" style="object-fit:cover;"
                                     alt="{{ $j->nama }}">
                            @endif
                        </div>

                        <div class="jurusan-home-badge">
                            @if($j->logo)
                                <img src="{{ asset('storage/' . $j->logo) }}" alt="Logo {{ $j->nama }}">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Logo Sekolah">
                            @endif
                        </div>

                        <div class="px-2">
                            <span class="jurusan-home-tag">Program Keahlian</span>
                            <h5 class="jurusan-home-judul">
                                {{ $j->nama }}
                            </h5>
                            <p class="jurusan-home-desc">
                                {{ Str::limit($j->deskripsi, 130) }}
                            </p>
                            <a href="{{ route('jurusan.show', $j->id) }}" class="jurusan-home-link">
                                Selengkapnya
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>


<!-- ======================= EKSTRAKURIKULER ======================= -->
<section class="gs-section">

    <div class="gs-container">

        <div class="gs-head">
            <h2 class="jurusan-home-title d-inline-block" style="color:#1f2937; font-weight:400;">
                Ekstrakurikuler Sekolah
            </h2>
            <p>Wadah pengembangan bakat dan minat siswa di luar kegiatan akademik SMK Negeri 1 Cijati.</p>
        </div>

        @php
            $itemUtama = $ekskul->firstWhere('nama', 'MARCHING BAND') ?? $ekskul->first();

            $namaKecil = ['Pramuka', 'Paskibra', 'Marching Band', 'PMR'];
            $itemKecil = collect($namaKecil)
                ->map(fn($nama) => $ekskul->firstWhere('nama', $nama))
                ->filter();
        @endphp

        @if($itemUtama)
        <div class="gs-grid">

            {{-- CARD UTAMA --}}
            <a href="{{ route('ekstrakurikuler.show', $itemUtama->id) }}" class="gs-card gs-main">
                @if($itemUtama->gambar)
                    <img src="{{ asset('storage/' . $itemUtama->gambar) }}" alt="{{ $itemUtama->nama }}">
                @else
                    <div style="position:absolute; inset:0; background:linear-gradient(135deg,#1e3a8a,#2f5fe0);"></div>
                @endif
                <div class="gs-card-body">
                    @if($itemUtama->jadwal)
                        <span class="gs-card-tag">{{ $itemUtama->jadwal }}</span>
                    @endif
                    <div class="gs-card-title">{{ $itemUtama->nama }}</div>
                    @if($itemUtama->deskripsi)
                        <p class="gs-card-desc">{{ Str::limit($itemUtama->deskripsi, 110) }}</p>
                    @endif
                    <span class="gs-card-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </span>
                </div>
            </a>

            {{-- CARD KECIL 2x2 --}}
            @if($itemKecil->count() > 0)
            <div class="gs-small-grid">
                @php
                    $fallbackGradients = [
                        'linear-gradient(135deg,#0f4c5c,#1a8a9e)',
                        'linear-gradient(135deg,#3b2f7a,#7457e0)',
                        'linear-gradient(135deg,#7a3a1f,#e0793e)',
                        'linear-gradient(135deg,#22357a,#3552c4)',
                    ];
                @endphp
                @foreach($itemKecil as $i => $item)
                    <a href="{{ route('ekstrakurikuler.show', $item->id) }}" class="gs-card">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                        @else
                            <div style="position:absolute; inset:0; background:{{ $fallbackGradients[$i % 4] }};"></div>
                        @endif
                        <div class="gs-card-body">
                            <div class="gs-card-title">{{ $item->nama }}</div>
                            <span class="gs-card-arrow">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif

        </div>
        @else
        <p class="text-center text-muted">Belum ada data ekstrakurikuler.</p>
        @endif

        <div class="gs-cta">
            <a href="{{ route('ekstrakurikuler.public') }}" class="gs-btn-outline">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                Lihat Semua Ekstrakurikuler
            </a>
        </div>

    </div>
</section>


{{--
==========================================================
    PARTIAL: Galeri Kegiatan (untuk halaman Beranda)
==========================================================
--}}

<section class="gk-section" aria-label="Galeri Kegiatan">

    {{-- ===== Judul & subtitle section ===== --}}
    <div class="gk-header">
        <h2 class="gk-title">
            Galeri Kegiatan
        </h2>
        <div class="gk-rule"></div>
        <p class="gk-subtitle">Dokumentasi berbagai kegiatan dan aktivitas di SMKN 1 Cijati</p>
    </div>

    {{-- ===== Stage carousel ===== --}}
    <div class="gk-stage-wrap">

        {{-- tombol panah kiri --}}
        <button class="gk-nav prev" aria-label="Foto sebelumnya" id="gkPrev">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>

        <div class="gk-stage">
            {{--
                Di sini kartu foto dirender pakai @foreach dari data database.
                Setiap kartu diberi atribut data-index (dipakai JS untuk
                menghitung posisi tengah/kiri/kanan di carousel).
            --}}
            <div class="gk-track" id="gkTrack">
                @foreach ($galeri as $index => $item)
                    <div class="gk-card" data-index="{{ $index }}">
                        {{-- ganti asset() sesuai cara kamu menyimpan file foto --}}
                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->judul }}"
                            loading="lazy"
                        >

                        {{-- tombol zoom, muncul saat hover --}}
                        <button
                            type="button"
                            class="gk-zoom-btn"
                            data-img="{{ asset('storage/' . $item->gambar) }}"
                            data-title="{{ $item->judul }}"
                            aria-label="Perbesar foto {{ $item->judul }}"
                        >
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="7"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                <line x1="11" y1="8" x2="11" y2="14"/>
                                <line x1="8" y1="11" x2="14" y2="11"/>
                            </svg>
                        </button>

                        <div class="gk-card-overlay">
                            <p class="gk-card-title">{{ $item->judul }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- tombol panah kanan --}}
        <button class="gk-nav next" aria-label="Foto berikutnya" id="gkNext">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
    </div>

    {{--
        ===== Pagination dots =====
        Dots juga dirender dari jumlah data, supaya otomatis
        menyesuaikan berapa pun jumlah foto di database.
    --}}
    <div class="gk-dots" id="gkDots">
        @foreach ($galeri as $index => $item)
            <button class="gk-dot" data-index="{{ $index }}" aria-label="Ke foto {{ $index + 1 }}"></button>
        @endforeach
    </div>

    {{-- ===== Modal Lightbox ===== --}}
    <div class="gk-lightbox" id="gkLightbox">
        <button type="button" class="gk-lightbox-close" id="gkLightboxClose" aria-label="Tutup">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

        <div class="gk-lightbox-content">
            <img src="" alt="" id="gkLightboxImg">
            <p class="gk-lightbox-title" id="gkLightboxTitle"></p>
        </div>
    </div>

</section>

@endsection

@push('scripts')
@vite(['resources/js/home.js'])
@endpush