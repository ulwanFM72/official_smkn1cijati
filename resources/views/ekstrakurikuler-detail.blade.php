@extends('layouts.app-public')

@section('title', $ekstrakurikuler->nama . ' - SMK Negeri 1 Cijati')

@section('content')

<style>
    :root {
        --ed-blue: #0d63f0;
        --ed-blue-dark: #0a4fc2;
        --ed-blue-soft: #eaf2ff;
        --ed-ink: #101827;
        --ed-ink-soft: #5b6472;
    }

    .ed-section {
        background: #fff;
        padding: 160px 0 80px;
    }
    .ed-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .ed-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: start;
        margin-bottom: 60px;
    }

    /* ===== KOLOM KIRI: FOTO ===== */
    .ed-main-photo {
        width: 100%;
        aspect-ratio: 4 / 3.2;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 20px 42px -20px rgba(16,24,39,.25);
        margin-bottom: 16px;
        background: var(--ed-blue-soft);
    }
    .ed-main-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ed-thumb-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .ed-thumb-nav {
        flex-shrink: 0;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #e5e9f2;
        color: var(--ed-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease;
    }
    .ed-thumb-nav:hover {
        background: var(--ed-blue-soft);
        border-color: var(--ed-blue);
    }
    .ed-thumb-nav svg { width: 16px; height: 16px; }

    .ed-thumb-track {
        flex: 1;
        display: flex;
        gap: 10px;
        overflow: hidden;
    }
    .ed-thumb {
        flex: 1;
        aspect-ratio: 1 / 1;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color .2s ease;
    }
    .ed-thumb.active {
        border-color: var(--ed-blue);
    }
    .ed-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ===== TOMBOL DAFTAR ESKUL ===== */
    .ed-daftar-wrap {
        margin-top: 20px;
    }
    .ed-daftar-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        font-weight: 600;
        font-size: .95rem;
        color: #228be6;
        background: transparent;
        border: 1.5px solid #228be6;
        border-radius: 12px;
        padding: 10px 22px;
        text-decoration: none;
        transition: background .2s ease, color .2s ease, gap .2s ease;
    }
    .ed-daftar-btn:hover {
        background: #228be6;
        color: #fff;
        gap: 12px;
    }
    .ed-daftar-btn svg { width: 16px; height: 16px; flex-shrink: 0; }

    /* ===== KOLOM KANAN: KONTEN ===== */
    .ed-badge {
        display: inline-block;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--ed-blue);
        background: var(--ed-blue-soft);
        padding: 5px 14px;
        border-radius: 999px;
        margin-bottom: 16px;
    }
    .ed-title {
        font-weight: 400;
        font-size: clamp(1.8rem, 3.4vw, 2.4rem);
        color: var(--ed-ink);
        letter-spacing: -0.01em;
        text-transform: uppercase;
        margin-bottom: 16px;
    }
    .ed-desc {
        font-size: 1rem;
        line-height: 1.85;
        color: var(--ed-ink-soft);
        margin-bottom: 28px;
    }

    /* ===== CARD FOKUS KEGIATAN ===== */
    .ed-fokus-card {
        background: #fff;
        border: 1px solid #e9edf5;
        box-shadow: 0 16px 34px -24px rgba(16,24,39,.20);
        border-radius: 20px;
        padding: 28px 26px;
    }
    .ed-fokus-card h3 {
        font-weight: 800;
        font-size: 1.05rem;
        color: var(--ed-ink);
        margin-bottom: 4px;
    }
    .ed-fokus-card > p {
        font-size: .86rem;
        color: var(--ed-ink-soft);
        margin-bottom: 20px;
    }
    .ed-fokus-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }
    .ed-fokus-item {
        background: #fff;
        border: 1px solid #e9edf5;
        border-radius: 14px;
        padding: 18px 14px;
        text-align: center;
    }
    .ed-fokus-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--ed-blue-soft);
        color: var(--ed-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
    }
    .ed-fokus-icon svg { width: 20px; height: 20px; }
    .ed-fokus-item h5 {
        font-weight: 700;
        font-size: .88rem;
        color: var(--ed-ink);
        margin-bottom: 6px;
    }
    .ed-fokus-item p {
        font-size: .78rem;
        color: var(--ed-ink-soft);
        line-height: 1.5;
        margin: 0;
    }

    /* ===== INFO CARD HORIZONTAL ===== */
    .ed-info-card {
        background: #fff;
        border: 1px solid #e9edf5;
        border-radius: 18px;
        box-shadow: 0 16px 34px -24px rgba(16,24,39,.20);
        padding: 30px 10px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }
    .ed-info-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 0 24px;
        position: relative;
    }
    .ed-info-item + .ed-info-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 6px;
        bottom: 6px;
        width: 1px;
        background: #e9edf5;
    }
    .ed-info-icon {
        flex-shrink: 0;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--ed-blue-soft);
        color: var(--ed-blue);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ed-info-icon svg { width: 20px; height: 20px; }
    .ed-info-label {
        font-size: .74rem;
        color: var(--ed-ink-soft);
        font-weight: 600;
        margin-bottom: 3px;
    }
    .ed-info-value {
        font-size: .92rem;
        font-weight: 700;
        color: var(--ed-ink);
        line-height: 1.3;
    }

    @media (max-width: 900px) {
        .ed-grid { grid-template-columns: 1fr; }
        .ed-info-card { grid-template-columns: 1fr 1fr; row-gap: 22px; }
        .ed-info-item + .ed-info-item::before { display: none; }
        .ed-fokus-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 480px) {
        .ed-section { padding: 140px 0 56px; }
        .ed-info-card { grid-template-columns: 1fr; }
    }
</style>

<section class="ed-section">
    <div class="ed-container">

        <div class="ed-grid">

            {{-- ===== KOLOM KIRI: FOTO ===== --}}
            <div>
                <div class="ed-main-photo" id="edMainPhoto">
                    @if($ekstrakurikuler->gambar)
                        <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama }}" id="edMainPhotoImg">
                    @else
                        <div style="width:100%; height:100%; background:linear-gradient(135deg,#1e3a8a,#2f5fe0);"></div>
                    @endif
                </div>

                {{--
                    GALERI THUMBNAIL: dinamis dari database
                    (gambar utama + foto2, foto3, foto4). Kalau salah satu foto
                    belum diisi di admin, thumbnail itu otomatis di-skip.
                --}}
                @php
                    $semuaFoto = collect([
                        $ekstrakurikuler->gambar,
                        $ekstrakurikuler->foto2,
                        $ekstrakurikuler->foto3,
                        $ekstrakurikuler->foto4,
                    ])->filter();
                @endphp

                @if($semuaFoto->count() > 1)
                <div class="ed-thumb-row">
                    <div class="ed-thumb-nav" onclick="edScrollThumb(-1)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                    </div>

                    <div class="ed-thumb-track" id="edThumbTrack">
                        @foreach($semuaFoto as $i => $foto)
                            <div class="ed-thumb {{ $i === 0 ? 'active' : '' }}" onclick="edSetActiveThumb(this)">
                                <img src="{{ asset('storage/' . $foto) }}" alt="{{ $ekstrakurikuler->nama }} {{ $i + 1 }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="ed-thumb-nav" onclick="edScrollThumb(1)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                    </div>
                </div>
                @endif

                {{-- TOMBOL DAFTAR ESKUL: ganti href dengan link website pendaftaran --}}
                <div class="ed-daftar-wrap">
                    <a href="https://reg-eskul.smkn1cijati.sch.id/" target="_blank" rel="noopener noreferrer" class="ed-daftar-btn">
                        Daftar Ekstrakurikuler
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </a>
                </div>
            </div>

            {{-- ===== KOLOM KANAN: KONTEN ===== --}}
            <div>
                <h1 class="ed-title">{{ $ekstrakurikuler->nama }}</h1>
                <p class="ed-desc">
                    {{ $ekstrakurikuler->deskripsi ?? 'Deskripsi kegiatan belum tersedia.' }}
                </p>

                {{--
                    FOKUS KEGIATAN: sekarang beda-beda per ekstrakurikuler,
                    dicocokkan lewat $ekstrakurikuler->id.
                    ID: 1 Bahasa Jepang, 2 Cinematik, 3 Futsal Ball, 4 Volly Ball,
                        5 Karawitan, 6 Rohis, 7 Marching Band, 8 PMR,
                        9 Pramuka, 10 Paskibra
                    Kalau ada ekskul baru ditambahkan di admin, tambahkan
                    case id barunya di sini juga (fallback ke 'default' kalau lupa).
                --}}
                @php
                    $iconPaths = [
                        'star' => '<path d="M12 2l3 6.5 7 1-5 5 1.2 7-6.2-3.4L5.8 21.5 7 14.5l-5-5 7-1L12 2z"/>',
                        'people' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
                        'target' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>',
                        'heart' => '<path d="M20.8 8.6c0 4.4-8.8 10.4-8.8 10.4S3.2 13 3.2 8.6a4.8 4.8 0 019-2.2 4.8 4.8 0 018.6 2.2z"/>',
                        'book' => '<path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M4 4.5A2.5 2.5 0 016.5 2H20v18H6.5A2.5 2.5 0 004 17.5v-13z"/>',
                        'music' => '<path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>',
                        'shield' => '<path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/>',
                        'compass' => '<circle cx="12" cy="12" r="9"/><path d="M16 8l-2 6-6 2 2-6 6-2z"/>',
                    ];

                    
$fokusKegiatan = match($ekstrakurikuler->id) {
    1 => [ // Cinematik
        ['icon' => 'star', 'judul' => 'Kreativitas', 'desc' => 'Mengembangkan ide dan kreativitas dalam produksi video.'],
        ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Berkolaborasi dalam proses produksi film dan video.'],
        ['icon' => 'book', 'judul' => 'Kemampuan Bercerita', 'desc' => 'Melatih penyampaian pesan lewat visual dan naskah.'],
    ],
    2 => [ // Pramuka
        ['icon' => 'compass', 'judul' => 'Kemandirian', 'desc' => 'Melatih kemandirian dan keterampilan hidup.'],
        ['icon' => 'shield', 'judul' => 'Kedisiplinan', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
        ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
    ],
    3 => [ // PMR
        ['icon' => 'heart', 'judul' => 'Kepedulian Sosial', 'desc' => 'Menumbuhkan kepedulian dan sikap tolong-menolong.'],
        ['icon' => 'shield', 'judul' => 'Kesiapsiagaan', 'desc' => 'Melatih kesiapsiagaan dalam pertolongan pertama.'],
        ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Bekerja sama saat penanganan situasi darurat.'],
    ],
    4 => [ // Futsal
        ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Melatih kekompakan dan strategi bermain bersama tim.'],
        ['icon' => 'shield', 'judul' => 'Sportivitas', 'desc' => 'Menjunjung tinggi sikap sportif dan fair play.'],
        ['icon' => 'target', 'judul' => 'Stamina & Ketangkasan', 'desc' => 'Meningkatkan kebugaran fisik dan ketangkasan.'],
    ],
    5 => [ // Volly
        ['icon' => 'people', 'judul' => 'Kerja Sama Tim', 'desc' => 'Melatih kekompakan dan komunikasi antar pemain.'],
        ['icon' => 'shield', 'judul' => 'Sportivitas', 'desc' => 'Menjunjung tinggi sikap sportif dan fair play.'],
        ['icon' => 'target', 'judul' => 'Ketangkasan', 'desc' => 'Meningkatkan refleks dan ketangkasan bermain.'],
    ],
    6 => [ // Bahasa Jepang
        ['icon' => 'book', 'judul' => 'Kemampuan Bahasa', 'desc' => 'Melatih kemampuan membaca, menulis, dan berbicara bahasa Jepang.'],
        ['icon' => 'heart', 'judul' => 'Wawasan Budaya', 'desc' => 'Mengenal budaya dan kebiasaan masyarakat Jepang.'],
        ['icon' => 'star', 'judul' => 'Percaya Diri', 'desc' => 'Membangun rasa percaya diri berkomunikasi bahasa asing.'],
    ],
    7 => [ // Karawitan
        ['icon' => 'music', 'judul' => 'Pelestarian Budaya', 'desc' => 'Melestarikan seni musik tradisional daerah.'],
        ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Melatih keselarasan bermain gamelan bersama.'],
        ['icon' => 'heart', 'judul' => 'Kepekaan Seni', 'desc' => 'Mengasah rasa seni dan apresiasi budaya.'],
    ],
    8 => [ // Rohis
        ['icon' => 'heart', 'judul' => 'Keimanan', 'desc' => 'Memperkuat keimanan dan ketakwaan siswa.'],
        ['icon' => 'star', 'judul' => 'Akhlak Mulia', 'desc' => 'Membentuk akhlak dan karakter yang baik.'],
        ['icon' => 'people', 'judul' => 'Kepedulian Sosial', 'desc' => 'Menumbuhkan kepedulian terhadap sesama.'],
    ],
    9 => [ // Marching Band
        ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Melatih kekompakan formasi dan barisan.'],
        ['icon' => 'shield', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
        ['icon' => 'music', 'judul' => 'Ketepatan Irama', 'desc' => 'Mengasah ketepatan irama dan harmoni musik.'],
    ],
    10 => [ // Paskibra
        ['icon' => 'star', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
        ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Meningkatkan kerja sama tim dan solidaritas.'],
        ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
    ],
    default => [
        ['icon' => 'star', 'judul' => 'Disiplin', 'desc' => 'Membentuk sikap disiplin dan tanggung jawab.'],
        ['icon' => 'people', 'judul' => 'Kekompakan', 'desc' => 'Meningkatkan kerja sama tim dan solidaritas.'],
        ['icon' => 'star', 'judul' => 'Kepemimpinan', 'desc' => 'Melatih jiwa kepemimpinan dan percaya diri.'],
    ],
};

                @endphp

                <div class="ed-fokus-card">
                    <h3>Fokus Kegiatan</h3>
                    <p>Nilai-nilai utama yang dikembangkan dalam {{ $ekstrakurikuler->nama }}.</p>

                    <div class="ed-fokus-grid">
                        @foreach($fokusKegiatan as $f)
                            <div class="ed-fokus-item">
                                <div class="ed-fokus-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        {!! $iconPaths[$f['icon']] ?? $iconPaths['star'] !!}
                                    </svg>
                                </div>
                                <h5>{{ $f['judul'] }}</h5>
                                <p>{{ $f['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        {{-- ===== INFO CARD HORIZONTAL ===== --}}
        <div class="ed-info-card">

            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Jadwal Latihan</div>
                    <div class="ed-info-value">{{ $ekstrakurikuler->jadwal ?? '-' }}</div>
                </div>
            </div>

            {{-- "Waktu" belum ada kolom terpisah di database, masih placeholder manual --}}
            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Waktu</div>
                    <div class="ed-info-value">15.30 - 17.30 WIB</div>
                </div>
            </div>

            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Pembina</div>
                    <div class="ed-info-value">{{ $ekstrakurikuler->pembina ?? '-' }}</div>
                </div>
            </div>

            {{-- "Lokasi" belum ada kolom terpisah di database, masih placeholder manual --}}
            <div class="ed-info-item">
                <div class="ed-info-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.1 7-11.5A7 7 0 105 9.5C5 14.9 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.4"/></svg>
                </div>
                <div>
                    <div class="ed-info-label">Lokasi</div>
                    <div class="ed-info-value">Lapangan Sekolah</div>
                </div>
            </div>

        </div>

    </div>
</section>

<script>
    function edSetActiveThumb(el) {
        document.querySelectorAll('.ed-thumb').forEach(t => t.classList.remove('active'));
        el.classList.add('active');

        const img = el.querySelector('img');
        const mainImg = document.getElementById('edMainPhotoImg');
        if (img && mainImg) {
            mainImg.src = img.src;
        }
    }

    function edScrollThumb(direction) {
        const thumbs = Array.from(document.querySelectorAll('.ed-thumb'));
        const activeIndex = thumbs.findIndex(t => t.classList.contains('active'));
        let nextIndex = activeIndex + direction;

        if (nextIndex < 0) nextIndex = thumbs.length - 1;
        if (nextIndex >= thumbs.length) nextIndex = 0;

        edSetActiveThumb(thumbs[nextIndex]);
    }
</script>

@endsection