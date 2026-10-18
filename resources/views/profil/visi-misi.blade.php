@extends('layouts.app-public')

@section('title', 'Visi & Misi - SMK Negeri 1 Cijati')

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
        <span class="jd-hero-eyebrow">Visi & Misi</span>
        <p>arah Dan Tujuan{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</p>
    </div>
</section>

<!-- ======================= ISI ======================= -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="bg-white h-100 p-4"
                             style="border-radius:16px; border-left: 5px solid #228be6; box-shadow: 0 10px 25px rgba(0,0,0,.08);">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-eye fa-2x text-primary me-3"></i>
                                <h4 class="fw-bold mb-0">Visi</h4>
                            </div>
                            <p class="mb-0" style="line-height: 1.8; color:#4b5563;">
                                {{ $profil->visi ?? 'Visi sekolah belum tersedia.' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white h-100 p-4"
                             style="border-radius:16px; border-left: 5px solid #228be6; box-shadow: 0 10px 25px rgba(0,0,0,.08);">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-bullseye fa-2x text-primary me-3"></i>
                                <h4 class="fw-bold mb-0">Misi</h4>
                            </div>
                          @if($profil->misi)
                            @php
                                $misiItems = array_filter(array_map('trim', explode("\n", trim($profil->misi))));
                            @endphp
                            <ol class="ps-3 mb-0" style="line-height: 1.8; color:#4b5563;">
                                @foreach($misiItems as $item)
                                    <li class="mb-1">{{ preg_replace('/^\d+\.\s*/', '', $item) }}</li>
                                @endforeach
                            </ol>
                        @else
                            <p class="mb-0" style="line-height: 1.8; color:#4b5563;">
                                Misi sekolah belum tersedia.
                            </p>
                        @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection