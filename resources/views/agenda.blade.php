@extends('layouts.app-public')

@section('title', 'Agenda Sekolah - SMK Negeri 1 Cijati')

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
    .jd-hero-subtitle {
        color: #eaf2ff;
        margin: 0;
        font-size: .98rem;
        animation: fadeSlideUp .6s ease both .15s;
    }
</style>


<!-- ======================= HERO ======================= -->
<div class="jd-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Agenda Sekolah">
    <div class="jd-hero-content">
        <span class="jd-hero-eyebrow">Agenda Sekolah</span>
        <p class="jd-hero-subtitle">Informasi kegiatan dan agenda SMKN 1 Cijati</p>
    </div>
</div>


{{-- ======================= GRID AGENDA (MODERN, senada Program Kebiasaan) ======================= --}}

<style>
    .ag-section{
        background:#f8f9fc;
    }

    .ag-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
    }

    .ag-card{
        position:relative;
        background:#fff;
        border-radius:22px;
        padding:30px 28px;
        overflow:hidden;
        box-shadow:0 10px 30px -18px rgba(16,24,39,.15);
        transition:transform .3s ease, box-shadow .3s ease;
        animation:fadeSlideUp .55s ease both;
    }

    .ag-card:hover{
        transform:translateY(-8px);
        box-shadow:0 22px 40px -18px rgba(13,99,240,.32);
    }

    .ag-card::before{
        content:'';
        position:absolute;
        top:0; left:0; right:0;
        height:5px;
        background:var(--jd-blue);
    }

    .ag-title{
        color:var(--jd-ink);
        font-weight:800;
        font-size:1.15rem;
        margin-bottom:18px;
        padding-bottom:14px;
        border-bottom:1px solid #f1f3f5;
    }

    .ag-meta{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:14px;
    }

    .ag-meta-icon{
        width:40px;
        height:40px;
        border-radius:50%;
        background:var(--jd-blue-soft);
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
        transition:transform .3s ease, background .3s ease;
    }

    .ag-card:hover .ag-meta-icon{
        transform:scale(1.08) rotate(-4deg);
    }

    .ag-meta-icon i{
        color:var(--jd-blue);
        font-size:.9rem;
    }

    .ag-meta-text{
        color:#4b5563;
        font-size:.92rem;
        font-weight:600;
    }

    .ag-desc{
        color:var(--jd-ink-soft);
        font-size:.9rem;
        line-height:1.75;
        margin-top:18px;
    }

    @media (max-width:767px){
        .ag-grid{
            grid-template-columns:1fr;
        }
    }
</style>

<section class="ag-section py-5">
    <div class="container">

        <div class="ag-grid">

            @forelse($agenda as $a)
                <div class="ag-card">

                    <div class="ag-title">
                        {{ $a->judul }}
                    </div>

                    <div class="ag-meta">
                        <div class="ag-meta-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="ag-meta">
                        <div class="ag-meta-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ \Carbon\Carbon::parse($a->waktu)->format('H:i') }} WIB
                        </div>
                    </div>

                    <div class="ag-meta mb-0">
                        <div class="ag-meta-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ag-meta-text">
                            {{ $a->lokasi }}
                        </div>
                    </div>

                    @if($a->deskripsi)
                        <p class="ag-desc mb-0">
                            {{ $a->deskripsi }}
                        </p>
                    @endif

                </div>
            @empty
                <div class="text-center py-5" style="grid-column:1 / -1;">
                    <p class="text-muted mb-0">Belum ada agenda yang tersedia.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection