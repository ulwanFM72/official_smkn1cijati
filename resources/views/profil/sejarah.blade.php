@extends('layouts.app-public')

@section('title', 'Sejarah Sekolah - SMK Negeri 1 Cijati')

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
        <span class="jd-hero-eyebrow">Sejarah Sekolah</span>
        <p>Perjalanan dan perkembangan {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</p>
    </div>
</section>


<!-- ======================= ISI ======================= -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="bg-white p-4"
                     style="border-radius:16px; border-left: 5px solid #228be6; box-shadow: 0 10px 25px rgba(0,0,0,.08);">
                    <p style="line-height:1.9; color:#4b5563; text-align:justify; margin-bottom:0;">
                        {{ $profil->sejarah ?? '

                           SMK Negeri 1 Cijati merupakan salah satu sekolah menengah kejuruan yang berada di Kecamatan Cijati, Kabupaten Cianjur, Jawa Barat. Sekolah ini didirikan sebagai upaya pemerintah untuk meningkatkan kualitas pendidikan vokasi serta menyiapkan sumber daya manusia yang terampil, kompeten, dan siap menghadapi dunia kerja.

                           Sejak awal berdirinya, SMK Negeri 1 Cijati berkomitmen untuk memberikan pendidikan yang menyeimbangkan antara teori dan praktik sesuai dengan kebutuhan dunia industri. Dengan dukungan tenaga pendidik yang profesional serta sarana dan prasarana yang terus berkembang, sekolah ini mampu mencetak lulusan yang memiliki keterampilan, disiplin, dan karakter yang baik.

                           Dalam perjalanannya, SMK Negeri 1 Cijati terus mengalami perkembangan, baik dari segi jumlah peserta didik, program keahlian, maupun fasilitas pembelajaran. Berbagai prestasi di bidang akademik dan nonakademik juga berhasil diraih sebagai bukti kualitas pendidikan yang diberikan.

                           Hingga saat ini, SMK Negeri 1 Cijati terus berupaya menjadi sekolah kejuruan yang unggul, inovatif, dan berdaya saing, serta berperan aktif dalam menciptakan generasi muda yang siap bekerja, berwirausaha, maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.' }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection