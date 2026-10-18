@extends('layouts.app-public')

@section('title', 'Program Kebiasaan - SMK Negeri 1 Cijati')

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
        <span class="jd-hero-eyebrow">Program Kebiasaan</span>
        <p>Pembiasaan positif setiap hari di SMK Negeri 1 Cijati{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</p>
    </div>
</section>


{{-- ======================= CARD PROGRAM KEBIASAAN (MODERN) ======================= --}}

<style>
    .pk-section{
        background:#f8f9fc;
    }

    .pk-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
    }

    .pk-card{
        position:relative;
        background:#fff;
        border-radius:22px;
        padding:36px 28px;
        text-align:center;
        overflow:hidden;
        box-shadow:0 10px 30px -18px rgba(16,24,39,.15);
        transition:transform .3s ease, box-shadow .3s ease;
        animation:fadeSlideUp .55s ease both;
        --pk-accent:#2563eb;
        --pk-tint:#eaf1fd;
        --pk-shadow:rgba(37,99,235,.28);
    }

    .pk-card:hover{
        transform:translateY(-8px);
        box-shadow:0 22px 40px -18px var(--pk-shadow, rgba(37,99,235,.32));
    }

    .pk-card::before{
        content:'';
        position:absolute;
        top:0; left:0; right:0;
        height:5px;
        background:var(--pk-accent, #2563eb);
    }

    .pk-icon{
        width:64px;
        height:64px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 18px;
        background:var(--pk-tint, #eaf1fd);
        transition:transform .3s ease;
    }

    .pk-card:hover .pk-icon{
        transform:scale(1.08) rotate(-4deg);
    }

    .pk-icon i{
        font-size:1.5rem;
        color:var(--pk-accent, #2563eb);
    }

    .pk-day{
        display:inline-block;
        font-size:.72rem;
        font-weight:800;
        letter-spacing:.14em;
        text-transform:uppercase;
        color:var(--pk-accent, #2563eb);
        background:var(--pk-tint, #eaf1fd);
        padding:4px 14px;
        border-radius:999px;
        margin-bottom:12px;
    }

    .pk-title{
        font-size:1.15rem;
        font-weight:800;
        color:#152238;
        margin-bottom:10px;
    }

    .pk-desc{
        font-size:.9rem;
        color:#5b6b84;
        line-height:1.65;
        margin:0;
    }

    /* item terakhir (ganjil) di-center, lebar sama dengan satu kolom */
    .pk-card--center{
        grid-column:1 / -1;
        max-width:calc(50% - 12px);
        margin:0 auto;
    }

    @media (max-width:767px){
        .pk-grid{
            grid-template-columns:1fr;
        }
        .pk-card--center{
            max-width:100%;
        }
    }
</style>

<section class="pk-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="pk-grid">

                    <!-- SENIN -->
                    <div class="pk-card">
                        <div class="pk-icon"><i class="fas fa-flag"></i></div>
                        <span class="pk-day">Senin</span>
                        <h5 class="pk-title">Upacara Bendera</h5>
                        <p class="pk-desc">
                            Dilaksanakan setiap pagi untuk menumbuhkan rasa nasionalisme dan kedisiplinan peserta didik.
                        </p>
                    </div>

                    <!-- SELASA -->
                    <div class="pk-card">
                        <div class="pk-icon"><i class="fa-duotone fa-solid fa-person-running"></i></div>
                        <span class="pk-day">Selasa</span>
                        <h5 class="pk-title">SEHATI (Senam Sehat SMKN 1 Cijati)</h5>
                        <p class="pk-desc">
                            Dilaksanakan setiap pagi sebelum kegiatan belajar mengajar dimulai.
                        </p>
                    </div>

                    <!-- RABU -->
                    <div class="pk-card">
                        <div class="pk-icon"><i class="fas fa-book-open"></i></div>
                        <span class="pk-day">Rabu</span>
                        <h5 class="pk-title">RELASI (Rabu Literasi)</h5>
                        <p class="pk-desc">
                            Dilaksanakan setiap pagi sebelum kegiatan belajar mengajar dimulai.
                            Membaca 15 menit sebelum jam pelajaran pertama untuk menumbuhkan minat baca siswa.
                        </p>
                    </div>

                    <!-- KAMIS -->
                    <div class="pk-card">
                        <div class="pk-icon"><i class="fas fa-flag"></i></div>
                        <span class="pk-day">Kamis</span>
                        <h5 class="pk-title">APEL Pagi</h5>
                        <p class="pk-desc">
                           Dilaksanakan setiap pagi sebelum kegiatan belajar mengajar dimulai.
                        </p>
                    </div>

                    <!-- JUMAT (di-center karena ganjil) -->
                    <div class="pk-card pk-card--center">
                        <div class="pk-icon"><i class="fas fa-praying-hands"></i></div>
                        <span class="pk-day">Jumat</span>
                        <h5 class="pk-title">Istigosah</h5>
                        <p class="pk-desc">
                            Gotong royong membersihkan lingkungan sekolah untuk menanamkan kepedulian lingkungan.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection