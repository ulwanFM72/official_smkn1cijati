@extends('layouts.app-public')

@section('title', 'Galeri')

@section('content')

<style>
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    :root {
        --gl-blue: #0d63f0;
        --gl-blue-dark: #0a4fc2;
        --gl-blue-soft: #eaf2ff;
        --gl-yellow: #f5b301;
        --gl-yellow-soft: #fff6df;
        --gl-ink: #101827;
        --gl-ink-soft: #5b6472;
    }

    /* ===== HERO (TIDAK DIUBAH) ===== */
    .gl-hero {
        position: relative;
        padding: 180px 20px 70px;
        text-align: center;
        overflow: hidden;
    }
    .gl-hero img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }
    .gl-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10,20,40,.55) 0%, rgba(10,20,40,.35) 45%, rgba(10,20,40,.75) 100%);
        z-index: 1;
    }
    .gl-hero-eyebrow,
    .gl-hero h1,
    .gl-hero p {
        position: relative;
        z-index: 2;
    }
    .gl-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #eaf2ff;
        background: rgba(255,255,255,.14);
        border: 1px solid rgba(255,255,255,.28);
        padding: 6px 16px;
        border-radius: 999px;
        backdrop-filter: blur(4px);
        margin-bottom: 18px;
        animation: fadeSlideUp .6s ease both;
    }
    .gl-hero h1 {
        color: #fff;
        font-weight: 800;
        font-size: clamp(1.8rem, 3.6vw, 2.6rem);
        letter-spacing: -0.01em;
        margin-bottom: 12px;
        animation: fadeSlideUp .6s ease both .05s;
    }
    .gl-hero p {
        color: rgba(255,255,255,.88);
        font-size: 1rem;
        max-width: 520px;
        margin: 0 auto;
        animation: fadeSlideUp .6s ease both .1s;
    }

    /* ================================================
       ISI GALERI
       ================================================ */
    .gl-section {
        background: #f8f9fc;
        padding: 64px 0 90px;
        font-family: 'Inter', sans-serif;
    }
    .gl-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ===== TOOLBAR: filter pills ===== */
    .gl-toolbar {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        animation: fadeSlideUp .5s ease both;
    }
    .gl-filters {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }
    .gl-filter-btn {
        font-family: 'Inter', sans-serif;
        font-size: .85rem;
        font-weight: 600;
        color: var(--gl-ink-soft);
        background: #fff;
        border: 1px solid #e7eaf0;
        padding: 9px 20px;
        border-radius: 999px;
        cursor: pointer;
        transition: all .2s ease;
        white-space: nowrap;
    }
    .gl-filter-btn:hover {
        border-color: var(--gl-blue);
        color: var(--gl-blue);
    }
    .gl-filter-btn.active {
        background: var(--gl-blue);
        border-color: var(--gl-blue);
        color: #fff;
        box-shadow: 0 8px 18px -8px rgba(13,99,240,.5);
    }

    /* ===== GRID 4 KOLOM ===== */
    .gl-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 26px;
    }
    @media (max-width: 1100px) { .gl-grid{ grid-template-columns: repeat(3,1fr); } }
    @media (max-width: 780px)  { .gl-grid{ grid-template-columns: repeat(2,1fr); gap:18px; } }
    @media (max-width: 480px)  { .gl-grid{ grid-template-columns: 1fr; } }

    /* ===== CARD ===== */
    .gl-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 26px -16px rgba(16,24,39,.16);
        transition: transform .3s ease, box-shadow .3s ease;
        animation: fadeSlideUp .5s ease both;
        display: flex;
        flex-direction: column;
    }
    .gl-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 38px -18px rgba(13,99,240,.28);
    }

    .gl-card-photo {
        position: relative;
        aspect-ratio: 4 / 3.1;
        overflow: hidden;
        background: var(--gl-blue-soft);
    }
    .gl-card-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .5s ease;
    }
    .gl-card:hover .gl-card-photo img {
        transform: scale(1.07);
    }

    .gl-card-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        font-size: .64rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--gl-blue);
        background: rgba(255,255,255,.95);
        padding: 5px 12px;
        border-radius: 999px;
        box-shadow: 0 4px 10px rgba(16,24,39,.12);
    }

    /* overlay gelap saat hover, biar tombol zoom kontras */
    .gl-card-photo::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(15,23,42,0);
        transition: background .3s ease;
        z-index: 2;
        pointer-events: none;
    }
    .gl-card:hover .gl-card-photo::after {
        background: rgba(15,23,42,.28);
    }

    /* tombol zoom di tengah foto, muncul saat hover */
    .gl-zoom-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) scale(.8);
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255,255,255,.95);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity .25s ease, transform .25s ease, visibility .25s ease;
        z-index: 3;
        box-shadow: 0 10px 22px -8px rgba(15,23,42,.4);
    }
    .gl-zoom-btn svg { width: 20px; height: 20px; stroke: var(--gl-blue); }
    .gl-card:hover .gl-zoom-btn {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%,-50%) scale(1);
    }
    @media (hover:none) {
        .gl-zoom-btn { opacity: 1; visibility: visible; transform: translate(-50%,-50%) scale(1); }
    }

    .gl-card-body {
        padding: 18px 20px 20px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .gl-card-title {
        font-weight: 700;
        font-size: .98rem;
        color: var(--gl-ink);
        line-height: 1.4;
        margin: 0 0 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.75em;
    }

    .gl-card-footer {
        display: flex;
        align-items: center;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #f1f3f8;
    }
    .gl-card-date {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: .76rem;
        font-weight: 600;
        color: var(--gl-ink-soft);
    }
    .gl-card-date svg { width: 13px; height: 13px; flex-shrink:0; color: var(--gl-yellow); }

    /* ===== EMPTY STATE ===== */
    .gl-empty {
        grid-column: 1 / -1;
        text-align: center;
        background: #fff;
        border-radius: 20px;
        padding: 64px 24px;
        color: var(--gl-ink-soft);
        box-shadow: 0 12px 30px -18px rgba(16,24,39,.16);
    }
    .gl-empty i {
        font-size: 2.1rem;
        color: var(--gl-yellow);
        margin-bottom: 14px;
        display: block;
    }

    /* ===== LIGHTBOX MODAL ===== */
    .gl-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(15,23,42,.86);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity .25s ease, visibility .25s ease;
        padding: 24px;
    }
    .gl-lightbox.active { opacity: 1; visibility: visible; }

    .gl-lightbox-content {
        max-width: 900px;
        width: 100%;
        max-height: 85vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .gl-lightbox-content img {
        max-width: 100%;
        max-height: 72vh;
        border-radius: 16px;
        box-shadow: 0 30px 60px -20px rgba(0,0,0,.5);
        object-fit: contain;
    }
    .gl-lightbox-title {
        color: #fff;
        margin-top: 18px;
        font-family: 'Inter', sans-serif;
        font-size: 18px;
        font-weight: 700;
        text-align: center;
    }
    .gl-lightbox-tag {
        display: inline-block;
        margin-top: 8px;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: #eaf2ff;
        background: rgba(255,255,255,.14);
        border: 1px solid rgba(255,255,255,.28);
        padding: 5px 14px;
        border-radius: 999px;
    }

    .gl-lightbox-close {
        position: absolute;
        top: 24px;
        right: 28px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255,255,255,.12);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s ease;
    }
    .gl-lightbox-close:hover { background: rgba(255,255,255,.24); }
    .gl-lightbox-close svg { width: 20px; height: 20px; stroke: #fff; }

    @media (max-width: 640px) {
        .gl-lightbox-content img { max-height: 62vh; }
    }
</style>

<!-- ======================= HERO (TIDAK DIUBAH) ======================= -->
<section class="gl-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Galeri Kegiatan SMK Negeri 1 Cijati">
    <span class="gl-hero-eyebrow">Galeri Kegiatan</span>
    <p>Dokumentasi kegiatan, prestasi, dan momen berharga siswa SMK Negeri 1 Cijati.</p>
</section>

<!-- ======================= ISI GALERI ======================= -->
<section class="gl-section">
    <div class="gl-container">

        <!-- TOOLBAR: filter pills -->
        <div class="gl-toolbar">
            <div class="gl-filters" id="glFilters">
                <button class="gl-filter-btn active" data-filter="Semua">Semua</button>
                <button class="gl-filter-btn" data-filter="Akademik">Akademik</button>
                <button class="gl-filter-btn" data-filter="Prestasi">Prestasi</button>
                <button class="gl-filter-btn" data-filter="Kegiatan Rutin">Kegiatan Rutin</button>
            </div>
        </div>

        <!-- GRID -->
        <div class="gl-grid" id="glGrid">

            @forelse($galeri as $g)
                <div class="gl-card" data-kategori="{{ $g->kategori ?? 'Semua' }}">

                    <div class="gl-card-photo">
                        @if($g->gambar)
                            <img src="{{ asset('storage/' . $g->gambar) }}" alt="{{ $g->judul }}">

                            {{-- tombol zoom, muncul saat hover --}}
                            <button
                                type="button"
                                class="gl-zoom-btn"
                                data-img="{{ asset('storage/' . $g->gambar) }}"
                                data-title="{{ $g->judul }}"
                                data-kategori="{{ $g->kategori ?? '' }}"
                                aria-label="Perbesar foto {{ $g->judul }}"
                            >
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="7"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                    <line x1="11" y1="8" x2="11" y2="14"/>
                                    <line x1="8" y1="11" x2="14" y2="11"/>
                                </svg>
                            </button>
                        @else
                            <div style="position:absolute; inset:0; background:linear-gradient(135deg,#1e3a8a,#2f5fe0);"></div>
                        @endif

                        @if($g->kategori)
                            <span class="gl-card-tag">{{ $g->kategori }}</span>
                        @endif
                    </div>

                    <div class="gl-card-body">
                        <div class="gl-card-title">{{ $g->judul }}</div>
                    </div>
                </div>
            @empty
                <div class="gl-empty">
                    <i class="fas fa-images"></i>
                    Belum ada foto di galeri.
                </div>
            @endforelse

        </div>

    </div>
</section>

<!-- ======================= LIGHTBOX MODAL ======================= -->
<div class="gl-lightbox" id="glLightbox">
    <button type="button" class="gl-lightbox-close" id="glLightboxClose" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>

    <div class="gl-lightbox-content">
        <img src="" alt="" id="glLightboxImg">
        <p class="gl-lightbox-title" id="glLightboxTitle"></p>
        <span class="gl-lightbox-tag" id="glLightboxTag" style="display:none;"></span>
    </div>
</div>

<script>
(function(){
    const filterBtns = document.querySelectorAll('.gl-filter-btn');
    const cards = document.querySelectorAll('#glGrid .gl-card');

    function applyFilters(activeFilter){
        cards.forEach(card => {
            const kategori = card.dataset.kategori;
            const match = (activeFilter === 'Semua' || kategori === activeFilter);
            card.style.display = match ? '' : 'none';
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyFilters(btn.dataset.filter);
        });
    });

    // ===== Lightbox zoom =====
    const lightbox      = document.getElementById('glLightbox');
    const lightboxImg   = document.getElementById('glLightboxImg');
    const lightboxTitle = document.getElementById('glLightboxTitle');
    const lightboxTag   = document.getElementById('glLightboxTag');
    const lightboxClose = document.getElementById('glLightboxClose');

    function openLightbox(imgSrc, title, kategori){
        lightboxImg.src = imgSrc;
        lightboxImg.alt = title;
        lightboxTitle.textContent = title;

        if (kategori) {
            lightboxTag.textContent = kategori;
            lightboxTag.style.display = 'inline-block';
        } else {
            lightboxTag.style.display = 'none';
        }

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(){
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.gl-zoom-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            openLightbox(btn.dataset.img, btn.dataset.title, btn.dataset.kategori);
        });
    });

    lightboxClose.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
    });
})();
</script>

@endsection