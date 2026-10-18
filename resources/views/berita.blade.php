@extends('layouts.app-public')

@section('title', 'Berita Sekolah - SMK Negeri 1 Cijati')

@section('content')

<style>
@keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
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
.jd-hero-content h1 {
    color: #fff;
    font-weight: 800;
    font-size: clamp(1.3rem, 2.4vw, 1.8rem);
    letter-spacing: -0.01em;
    margin-bottom: 10px;
    animation: fadeSlideUp .6s ease both .05s;
}
.jd-hero-content p {
    color: rgba(255,255,255,.85);
    font-size: .95rem;
    margin: 0;
    animation: fadeSlideUp .6s ease both .1s;
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
    margin-bottom: 16px;
    animation: fadeSlideUp .6s ease both .1s;
}
</style>


<!-- ======================= HERO ======================= -->
<section class="jd-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Sejarah Sekolah">
    <div class="jd-hero-content">
        <span class="jd-hero-eyebrow">berita sekolah</span>
        <p>Informasi terbaru SMK Negeri 1 Cijati</p>
    </div>
</section>


<!-- ======================= GRID BERITA ======================= -->
<section class="py-5">
    <div class="container">

        <div class="row g-4">

            @forelse($berita as $b)
                <div class="col-md-4">
                    <div class="bg-white h-100 berita-page-card">

                        @if($b->gambar)
                            <div style="overflow:hidden;">
                                <img src="{{ asset('storage/' . $b->gambar) }}"
                                     class="w-100" style="height:210px; object-fit:cover;"
                                     alt="{{ $b->judul }}">
                            </div>
                        @endif

                        <div class="p-3">
                            <div class="berita-page-tanggal mb-2">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
                            </div>

                            <h5 class="fw-bold mb-2" style="font-size:1.05rem; line-height:1.4;">
                                {{ $b->judul }}
                            </h5>

                            <p class="small text-muted mb-3">
                                {{ Str::limit(strip_tags($b->isi), 100) }}
                            </p>

                            <a href="{{ route('berita.show', $b->id) }}" class="berita-page-link">
                                Baca selengkapnya →
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection