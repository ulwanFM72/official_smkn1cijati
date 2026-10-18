@extends('layouts.app-public')

@section('title', 'Kontak')

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

    /* ===== HERO ===== */
    .gl-hero {
        position: relative;
        padding: 200px 20px 70px;
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

    /* ===================================================
       ===== SECTION DI BAWAH HERO ========================
       =================================================== */

    .kt-section {
        padding: 56px 0;
    }
    .kt-section-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--gl-ink);
        margin-bottom: 6px;
    }
    .kt-section-sub {
        font-size: .92rem;
        color: var(--gl-ink-soft);
        margin-bottom: 30px;
    }

    /* ---- Informasi Sekolah: 4 card sejajar ---- */
    .kt-info-card {
        position: relative;
        overflow: hidden;
        background: #fff;
        border: 1px solid #E7ECF4;
        border-radius: 18px;
        box-shadow: 0 10px 26px -18px rgba(13,99,240,.20), 0 2px 8px rgba(16,24,39,.04);
        padding: 22px 22px 54px;
        height: 100%;
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .kt-info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 34px -18px rgba(13,99,240,.26);
    }
    .kt-info-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }
    .kt-info-icon {
        flex-shrink: 0;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--gl-blue-soft);
        color: var(--gl-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
    }
    .kt-info-title {
        font-size: .98rem;
        font-weight: 800;
        color: var(--gl-ink);
    }
    .kt-info-value {
        font-size: .84rem;
        color: var(--gl-ink-soft);
        line-height: 1.55;
        margin: 0;
        word-break: break-word;
        position: relative;
        z-index: 2;
    }
    .kt-info-value a {
        color: var(--gl-ink-soft);
        text-decoration: none;
    }
    .kt-info-value a:hover {
        color: var(--gl-blue);
    }
    .kt-info-dots {
        position: absolute;
        left: 22px;
        bottom: 18px;
        display: grid;
        grid-template-columns: repeat(3, 6px);
        gap: 5px;
        z-index: 1;
    }
    .kt-info-dots span {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #dbe2ee;
    }
    .kt-info-ghost {
        position: absolute;
        right: 14px;
        bottom: 4px;
        font-size: 2.8rem;
        color: var(--gl-blue-soft);
        z-index: 1;
        pointer-events: none;
    }

    /* ---- Media Sosial Kami: card horizontal ---- */
    .kt-social-card {
        position: relative;
        overflow: hidden;
        background: #fff;
        border: 1px solid #E7ECF4;
        border-radius: 18px;
        box-shadow: 0 10px 26px -18px rgba(13,99,240,.18), 0 2px 8px rgba(16,24,39,.04);
        padding: 30px 30px 26px;
        text-align: center;
    }
    .kt-social-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--gl-ink);
        margin: 0 0 8px;
    }
    .kt-social-underline {
        width: 34px;
        height: 3px;
        background: var(--gl-yellow);
        border-radius: 999px;
        margin: 0 auto 28px;
    }
    .kt-social-row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0;
    }
    .kt-social-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0 30px;
        position: relative;
        text-decoration: none;
        transition: transform .2s ease;
    }
    .kt-social-item:hover {
        transform: translateY(-3px);
    }
    .kt-social-item + .kt-social-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 4px;
        width: 1px;
        background: #E7ECF4;
    }
    .kt-social-icon-circle {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #fff;
        margin-bottom: 12px;
    }
    .kt-social-icon-circle.is-website {
        border-radius: 50%;
        background: #fff;
        border: 2px solid var(--gl-blue);
        color: var(--gl-blue);
        font-size: 1.6rem;
    }
    .kt-social-icon-circle.is-instagram {
        border-radius: 30%;
        background: linear-gradient(135deg, #f9ce34, #ee2a7b, #6228d7);
    }
    .kt-social-icon-circle.is-facebook {
        border-radius: 50%;
        background: #1877f2;
    }
    .kt-social-icon-circle.is-youtube {
        border-radius: 30%;
        background: #ff0000;
    }
    .kt-social-icon-circle.is-tiktok {
        border-radius: 50%;
        background: #010101;
    }
    .kt-social-name {
        font-size: .84rem;
        font-weight: 600;
        color: var(--gl-ink);
    }
    .kt-social-dots {
        position: absolute;
        top: 26px;
        display: grid;
        grid-template-columns: repeat(3, 6px);
        gap: 6px;
    }
    .kt-social-dots span {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #dbe2ee;
    }
    .kt-social-dots.is-left { left: 22px; }
    .kt-social-dots.is-right { right: 22px; }

    @media (max-width: 767px) {
        .kt-social-dots { display: none; }
        .kt-social-item { padding: 0 16px; }
    }

    /* ---- Tentang Kami ---- */
    .kt-tentang-card {
        background: #fff;
        border: 1px solid #E7ECF4;
        border-radius: 22px;
        box-shadow: 0 14px 34px -20px rgba(13,99,240,.20), 0 2px 8px rgba(16,24,39,.04);
        padding: 22px;
    }
    .kt-tentang-foto-wrap {
        height: 100%;
    }
    .kt-tentang-foto {
        width: 100%;
        height: 100%;
        min-height: 260px;
        border-radius: 16px;
        background-size: cover;
        background-position: center;
    }
    .kt-tentang-body {
        padding: 6px 6px 6px 28px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .kt-tentang-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--gl-ink);
        margin-bottom: 8px;
    }
    .kt-tentang-underline {
        width: 30px;
        height: 3px;
        background: var(--gl-blue);
        border-radius: 999px;
        margin-bottom: 16px;
    }
    .kt-tentang-desc {
        font-size: .88rem;
        color: var(--gl-ink-soft);
        line-height: 1.7;
        margin-bottom: 24px;
    }
    .kt-poin-row {
        display: flex;
        flex-wrap: wrap;
    }
    .kt-poin-item {
        flex: 1 1 0;
        min-width: 150px;
        padding: 0 18px;
        position: relative;
    }
    .kt-poin-item:first-child {
        padding-left: 0;
    }
    .kt-poin-item + .kt-poin-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 2px;
        bottom: 2px;
        width: 1px;
        background: #E7ECF4;
    }
    .kt-poin-head {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }
    .kt-poin-head i {
        color: var(--gl-blue);
        font-size: .95rem;
    }
    .kt-poin-title {
        font-size: .86rem;
        font-weight: 800;
        color: var(--gl-ink);
    }
    .kt-poin-desc {
        font-size: .76rem;
        color: var(--gl-ink-soft);
        line-height: 1.55;
        margin: 0;
    }

    @media (max-width: 991px) {
        .kt-tentang-foto { min-height: 220px; }
        .kt-tentang-body { padding: 24px 6px 6px; }
    }
    @media (max-width: 767px) {
        .kt-poin-row { flex-direction: column; gap: 16px; }
        .kt-poin-item { padding-left: 0 !important; }
        .kt-poin-item + .kt-poin-item::before { display: none; }
    }
</style>


<!-- ======================= HERO (tidak diubah) ======================= -->
<section class="gl-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Kontak SMK Negeri 1 Cijati">
    <span class="gl-hero-eyebrow">Kontak Sekolah</span>
    <p>Silakan hubungi SMK Negeri 1 Cijati melalui informasi berikut.</p>
</section>


<!-- ======================= INFORMASI SEKOLAH ======================= -->
<section class="kt-section">
    <div class="container">

        <h2 class="kt-section-title text-center">Informasi Sekolah</h2>
        <p class="kt-section-sub text-center">Detail kontak resmi SMK Negeri 1 Cijati.</p>

        <div class="row g-4">

            <div class="col-6 col-lg-3">
                <div class="kt-info-card">
                    <div class="kt-info-header">
                        <div class="kt-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="kt-info-title">Alamat</div>
                    </div>
                    <p class="kt-info-value">{{ $profil->alamat ?? 'Jl. Raya Cijati, Kecamatan Cijati, Kabupaten Cianjur, Jawa Barat 43277' }}</p>
                    <div class="kt-info-dots"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                    <i class="fas fa-landmark kt-info-ghost"></i>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="kt-info-card">
                    <div class="kt-info-header">
                        <div class="kt-info-icon"><i class="fas fa-phone"></i></div>
                        <div class="kt-info-title">Telepon</div>
                    </div>
                    <p class="kt-info-value">{{ $profil->telepon ?? '(0263) 2360657' }}</p>
                    <div class="kt-info-dots"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                    <i class="fas fa-phone-volume kt-info-ghost"></i>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="kt-info-card">
                    <div class="kt-info-header">
                        <div class="kt-info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="kt-info-title">Email</div>
                    </div>
                    <p class="kt-info-value">{{ $profil->email ?? 'smkn.1cijati@yahoo.co.id' }}</p>
                    <div class="kt-info-dots"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                    <i class="fas fa-envelope-open-text kt-info-ghost"></i>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="kt-info-card">
                    <div class="kt-info-header">
                        <div class="kt-info-icon"><i class="fas fa-globe"></i></div>
                        <div class="kt-info-title">Website</div>
                    </div>
                    <p class="kt-info-value">
                        <a href="{{ $profil->website ?? 'https://smkn1cijati.sch.id' }}" target="_blank">
                            {{ $profil->website ?? 'https://smkn1cijati.sch.id' }}
                        </a>
                    </p>
                    <div class="kt-info-dots"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                    <i class="fas fa-globe kt-info-ghost"></i>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ======================= MEDIA SOSIAL KAMI ======================= -->
<section class="kt-section" style="padding-top:0;">
    <div class="container">

        <div class="kt-social-card">

            <div class="kt-social-dots is-left"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
            <div class="kt-social-dots is-right"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>

            <h4 class="kt-social-title">Media Sosial Kami</h4>
            <div class="kt-social-underline"></div>

            <div class="kt-social-row">

                <a href="https://smkn1cijati.sch.id" target="_blank" class="kt-social-item">
                    <div class="kt-social-icon-circle is-website">🌐</div>
                    <div class="kt-social-name">Website</div>
                </a>

                <a href="https://www.instagram.com/smkn1cijatiofficial" target="_blank" class="kt-social-item">
                    <div class="kt-social-icon-circle is-instagram"><i class="fab fa-instagram"></i></div>
                    <div class="kt-social-name">Instagram</div>
                </a>

                <a href="https://www.facebook.com/smkn1cijatiofficial" target="_blank" class="kt-social-item">
                    <div class="kt-social-icon-circle is-facebook"><i class="fab fa-facebook-f"></i></div>
                    <div class="kt-social-name">Facebook</div>
                </a>

                <a href="https://youtube.com/@smkncijatitv" target="_blank" class="kt-social-item">
                    <div class="kt-social-icon-circle is-youtube"><i class="fab fa-youtube"></i></div>
                    <div class="kt-social-name">YouTube</div>
                </a>

                <a href="https://www.tiktok.com/@smkn1cijati" target="_blank" class="kt-social-item">
                    <div class="kt-social-icon-circle is-tiktok"><i class="fab fa-tiktok"></i></div>
                    <div class="kt-social-name">TikTok</div>
                </a>

            </div>

        </div>

    </div>
</section>


<!-- ======================= TENTANG KAMI ======================= -->
<section class="kt-section" style="padding-top:0;">
    <div class="container">

        <div class="kt-tentang-card">
            <div class="row g-4 align-items-stretch">

                <div class="col-lg-5">
                    <div class="kt-tentang-foto-wrap">
                        <div class="kt-tentang-foto" style="background-image:url('{{ asset('images/sekolah.jpg') }}');"></div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="kt-tentang-body">

                        <h3 class="kt-tentang-title">Tentang Kami</h3>
                        <div class="kt-tentang-underline"></div>
                        <p class="kt-tentang-desc">
                            {{ $profil->deskripsi ?? 'SMK Negeri 1 Cijati merupakan sekolah menengah kejuruan yang berkomitmen mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja. Kami terus berinovasi dan berkolaborasi untuk memberikan pendidikan terbaik bagi siswa-siswi kami.' }}
                        </p>

                        <div class="kt-poin-row">

                            <div class="kt-poin-item">
                                <div class="kt-poin-head">
                                    <i class="fas fa-shield-alt"></i>
                                    <div class="kt-poin-title">Kompeten</div>
                                </div>
                                <p class="kt-poin-desc">Membekali siswa dengan keterampilan dan pengetahuan sesuai standar industri.</p>
                            </div>

                            <div class="kt-poin-item">
                                <div class="kt-poin-head">
                                    <i class="fas fa-user-friends"></i>
                                    <div class="kt-poin-title">Berkarakter</div>
                                </div>
                                <p class="kt-poin-desc">Menanamkan nilai-nilai moral, etika, dan tanggung jawab sejak dini.</p>
                            </div>

                            <div class="kt-poin-item">
                                <div class="kt-poin-head">
                                    <i class="fas fa-briefcase"></i>
                                    <div class="kt-poin-title">Siap Kerja</div>
                                </div>
                                <p class="kt-poin-desc">Mempersiapkan siswa agar siap terjun ke dunia kerja maupun berwirausaha.</p>
                            </div>

                            <div class="kt-poin-item">
                                <div class="kt-poin-head">
                                    <i class="fas fa-chart-line"></i>
                                    <div class="kt-poin-title">Terus Berkembang</div>
                                </div>
                                <p class="kt-poin-desc">Selalu berinovasi untuk mengikuti perkembangan zaman dan teknologi.</p>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection