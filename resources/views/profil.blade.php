@extends('layouts.app-public')

@section('title', 'Profil Sekolah - SMK Negeri 1 Cijati')

@section('content')

{{-- ======================= TENTANG SEKOLAH ======================= --}}

<style>
  @keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .ts2-section{
    --navy:#173F7A;
    --blue:#52525B;
    --blue-tint:#EAF1FD;
    --ink:#152238;
    --ink-soft:#5B6B84;
    --line:#E3E9F2;

    font-family:'Inter',sans-serif;
    color:var(--ink);
    position:relative;
    padding:140px 0;
    background:#fff;
    border-bottom:12px solid #fff;
  }

  .ts2-wrap{
    max-width:1120px;
    margin:0 auto;
    padding:0 28px;
  }

  .ts2-badge-row{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:40px;
    animation:fadeSlideUp .5s ease both;
  }

  .ts2-badge-num{
    width:34px;
    height:34px;
    border-radius:50%;
    background:var(--blue);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:800;
    font-size:15px;
    flex-shrink:0;
  }

  .ts2-badge-label{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:800;
    font-size:15px;
    letter-spacing:.04em;
    text-transform:uppercase;
    color:var(--navy);
  }

  .ts2-grid{
    display:grid;
    grid-template-columns:1fr 1.05fr;
    gap:56px;
    align-items:flex-start;
  }

  .ts2-photo{
    position:relative;
    aspect-ratio:4/3.1;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 24px 48px -20px rgba(23,63,122,.28);
    animation:fadeSlideUp .6s ease both .05s;
  }

  .ts2-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
  }

  .ts2-photo-cut{
    position:absolute;
    top:0;
    right:0;
    width:70px;
    height:70px;
    background:#f8f9fc;
    clip-path:polygon(100% 0, 0 0, 100% 100%);
  }

  .ts2-photo-dots{
    position:absolute;
    width:110px;
    height:80px;
    bottom:-18px;

    left:-18px;
    z-index:-1;
    background-image:radial-gradient(var(--blue) 2px, transparent 2px);
    background-size:14px 14px;
    opacity:.35;
  }

  .ts2-title-eyebrow{
    font-size:1.15rem;
    font-weight:500;
    color:var(--ink-soft);
    margin:0 0 2px;
    animation:fadeSlideUp .55s ease both .1s;
  }

  .ts2-title-main{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:clamp(1.5rem,3vw,2rem);
    font-weight:600;
    color:var(--blue);
    letter-spacing:-0.01em;
    line-height:1.2;
    margin:0 0 16px;
    animation:fadeSlideUp .55s ease both .12s;
  }

  .ts2-desc{
    font-size:15px;
    line-height:1.8;
    color:var(--ink-soft);
    margin:0 0 26px;
    max-width:56ch;
    animation:fadeSlideUp .55s ease both .16s;
  }

  .ts2-divider{
    height:1px;
    background:var(--line);
    margin-bottom:26px;
  }

  .ts2-info-grid{
    display:grid;
    grid-template-columns:1fr 1fr 1fr;
    gap:22px 20px;
    animation:fadeSlideUp .6s ease both .2s;
  }

  .ts2-info-item{
    display:flex;
    align-items:flex-start;
    gap:10px;
  }

  .ts2-info-item.ts2-wide{
    grid-column:span 2;
  }

  .ts2-info-icon{
    width:34px;
    height:34px;
    flex:none;
    border-radius:50%;
    background:var(--blue-tint);
    display:flex;
    align-items:center;
    justify-content:center;
  }

  .ts2-info-icon svg{
    width:16px;
    height:16px;
    color:var(--blue);
  }

  .ts2-info-label{
    font-size:10.5px;
    color:var(--ink-soft);
    font-weight:600;
    letter-spacing:.03em;
    text-transform:uppercase;
    margin-bottom:3px;
  }

  .ts2-info-value{
    font-size:13.5px;
    font-weight:500;
    color:#152238;
    line-height:1.35;
  }

  @media (max-width:860px){
    .ts2-grid{
      grid-template-columns:1fr;
      gap:36px;
    }

    .ts2-info-grid{
      grid-template-columns:1fr 1fr;
    }
  }

  @media (max-width:480px){
    .ts2-info-grid{
      grid-template-columns:1fr;
    }
  }
</style>

<section class="ts2-section">
  <div class="ts2-wrap">

    <div class="ts2-grid">

      <div class="ts2-photo">
  @if($profil->foto ?? false)
    <img src="{{ asset('images/'.$profil->foto) }}"
         alt="Gedung {{ $profil->nama_sekolah ?? 'SMKN 1 Cijati' }}">
  @else
    <img src="{{ asset('images/sekolah.jpg') }}"
         alt="Gedung SMKN 1 Cijati">
  @endif

  <div class="ts2-photo-cut"></div>
  <div class="ts2-photo-dots"></div>
</div>

      <div>

        <h2 class="ts2-title-main">
          {{ strtoupper($profil->nama_sekolah ?? 'SMKN 1 Cijati') }}
        </h2>

        <p class="ts2-desc">
          {{ $profil->deskripsi ?? 'SMK Negeri 1 Cijati merupakan sekolah menengah kejuruan yang berkomitmen mencetak lulusan kompeten, berkarakter, dan siap bersaing di dunia kerja maupun dunia usaha melalui pembelajaran berbasis praktik dan kompetensi keahlian.' }}
        </p>

        <div class="ts2-divider"></div>

        <div class="ts2-info-grid">

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Nama Sekolah</div>
              <div class="ts2-info-value">
                {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 12l2 2 4-4"/>
                <circle cx="12" cy="12" r="9"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Status</div>
              <div class="ts2-info-value">
                {{ $profil->status ?? 'Negeri' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="17" rx="2"/>
                <path d="M3 9h18M8 2v4M16 2v4"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Tahun Berdiri</div>
              <div class="ts2-info-value">
                {{ $profil->tahun_berdiri ?? '-' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item ts2-wide">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 21s7-6.1 7-11.5A7 7 0 105 9.5C5 14.9 12 21 12 21z"/>
                <circle cx="12" cy="9.5" r="2.4"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Alamat</div>
              <div class="ts2-info-value">
                {{ $profil->alamat ?? '-' }}
              </div>
            </div>
          </div>

          <div class="ts2-info-item">
            <div class="ts2-info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M8 21h8M12 17v4M7 4h10v4a5 5 0 01-10 0V4z"/>
                <path d="M7 5H4a1 1 0 00-1 1c0 2.5 1.8 4.5 4 5M17 5h3a1 1 0 011 1c0 2.5-1.8 4.5-4 5"/>
              </svg>
            </div>

            <div>
              <div class="ts2-info-label">Akreditasi</div>
              <div class="ts2-info-value">
                {{ $profil->akreditasi ?? 'A' }}
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

{{-- ======================= TABEL INFORMASI PROFIL SEKOLAH ======================= --}}

<section style="padding:60px 0; background:#fff;">
  <div style="max-width:1120px; margin:0 auto; padding:0 28px; text-align:center;">

    <h2 class="sb-title">Tabel Informasi Profil Sekolah</h2>
    <div class="sb-underline" style="background:#2B6FEA;"></div>

    <div class="table-responsive" style="text-align:left;">
      <table class="table table-bordered table-striped align-middle">
        <tbody>
          <tr>
            <th style="width:220px;">Nama Sekolah</th>
            <td>{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>{{ $profil->status ?? 'Negeri' }}</td>
          </tr>
          <tr>
            <th>Tahun Berdiri</th>
            <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
          </tr>
          <tr>
            <th>Akreditasi</th>
            <td>{{ $profil->akreditasi ?? 'A' }}</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>{{ $profil->alamat ?? '-' }}</td>
          </tr>
          <tr>
            <th>Kepala Sekolah</th>
            <td>{{ $profil->kepala_sekolah ?? '-' }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ $profil->email ?? '-' }}</td>
          </tr>
          <tr>
            <th>Telepon</th>
            <td>{{ $profil->telepon ?? '-' }}</td>
          </tr>
          <tr>
            <th>Website</th>
            <td>{{ $profil->website ?? '-' }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>


{{-- ======================= SAMBUTAN KEPALA SEKOLAH ======================= --}}

<style>
  .sb-section{
    --navy:#173F7A;
    --blue:#2B6FEA;
    --blue-tint:#EAF1FD;
    --ink:#152238;
    --ink-soft:#5B6B84;
    --line:#E3E9F2;

    font-family:'Inter',sans-serif;
    color:var(--ink);
    padding:80px 0;
    background:#f8f9fc;
    border-bottom:12px solid #fff;
  }

  .sb-wrap{
    max-width:1120px;
    margin:0 auto;
    padding:0 28px;
  }

  .sb-head{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:14px;
    margin-bottom:6px;
  }

  .sb-title{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:clamp(1.5rem,3vw,2rem);
    font-weight:600;
    color:#000;
    letter-spacing:-0.01em;
    margin:0;
  }

  .sb-underline{
    width:56px;
    height:4px;
    background:var(--blue);
    border-radius:4px;
    margin:14px auto 40px;
  }

  .sb-grid{
    display:grid;
    grid-template-columns:0.85fr 2fr;
    gap:32px;
    align-items:stretch;
  }

  .sb-photo-card{
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    border:1px solid var(--line);
    box-shadow:0 16px 34px -22px rgba(23,63,122,.25);
    animation:fadeSlideUp .55s ease both;
    display:flex;
    flex-direction:column;
  }

  .sb-photo-card img{
    width:100%;
    aspect-ratio:3/3.4;
    object-fit:cover;
    display:block;
  }

  .sb-photo-name{
    background:var(--navy);
    color:#fff;
    text-align:center;
    padding:16px 12px;
  }

  .sb-photo-name strong{
    display:block;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:700;
    font-size:14.5px;
  }

  .sb-photo-name span{
    display:block;
    font-size:12px;
    color:rgba(255,255,255,.75);
    margin-top:3px;
  }

  .sb-quote-card{
    position:relative;
    background:var(--blue-tint);
    border-radius:20px;
    padding:40px 44px;
    animation:fadeSlideUp .6s ease both .1s;
    display:flex;
    flex-direction:column;
    justify-content:center;
  }

  .sb-quote-icon{
    color:var(--blue);
    opacity:.35;
    width:38px;
    height:30px;
    margin-bottom:10px;
  }

  .sb-quote-text{
    font-size:14.5px;
    line-height:1.85;
    color:var(--ink-soft);
  }

  .sb-quote-text p{
    margin:0 0 16px;
  }

  .sb-quote-text p:last-child{
    margin-bottom:0;
  }

  @media (max-width:820px){
    .sb-grid{
      grid-template-columns:1fr;
    }

    .sb-photo-card{
      max-width:260px;
      margin:0 auto;
    }
  }
</style>

<section class="sb-section">
  <div class="sb-wrap">

    <div class="sb-head">
      <h2 class="sb-title">Sambutan Kepala Sekolah</h2>
    </div>

    <div class="sb-underline"></div>

    <div class="sb-grid">

      <div class="sb-photo-card">
        <img src="{{ asset('images/kepala-sekolah.jpg') }}"
             alt="{{ $profil->nama_kepsek ?? 'Kepala Sekolah' }}">

        <div class="sb-photo-name">
          <strong>{{ $profil->nama_kepsek ?? 'A. Rahmat, S.Pd., M.M.' }}</strong>
          <span>Kepala SMKN 1 Cijati</span>
        </div>
      </div>

      <div class="sb-quote-card">

        <svg class="sb-quote-icon" viewBox="0 0 44 34" fill="currentColor">
          <path d="M12.5 0C5.6 3.6 0 10.8 0 19.2 0 27 5.4 33.6 13 33.6c6 0 10.4-4.4 10.4-10.2 0-5.4-3.8-9.4-8.8-9.4-1 0-1.8.2-2.4.4C13 8.4 17.4 4 22.6 1.6L12.5 0zm22 0C27.6 3.6 22 10.8 22 19.2 22 27 27.4 33.6 35 33.6c6 0 10.4-4.4 10.4-10.2 0-5.4-3.8-9.4-8.8-9.4-1 0-1.8.2-2.4.4C35 8.4 39.4 4 44.6 1.6L34.5 0z"/>
        </svg>

        <div class="sb-quote-text">

          @if($profil->sambutan ?? false)

            @foreach(array_filter(array_map('trim', explode("\n", trim($profil->sambutan)))) as $p)
              <p>{{ $p }}</p>
            @endforeach

          @else

            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>

            <p>
              Puji syukur kita panjatkan ke hadirat Allah SWT atas limpahan
              rahmat dan karunia-Nya, sehingga SMKN 1 Cijati terus berkembang
              sebagai lembaga pendidikan vokasi yang unggul, berdaya saing,
              dan berorientasi pada kemajuan teknologi serta kebutuhan dunia kerja.
            </p>

            <p>
              Dalam era digitalisasi ini, kami berkomitmen untuk menghadirkan
              layanan pendidikan yang inovatif, berbasis teknologi, dan sesuai
              dengan perkembangan industri. Semoga website ini dapat menjadi
              media informasi yang bermanfaat bagi seluruh siswa, orang tua,
              alumni, serta masyarakat umum.
            </p>

            <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

          @endif

        </div>
      </div>

    </div>
  </div>
</section>


{{-- ======================= SEJARAH ======================= --}}

<style>
  .sj-section{
    --navy:#173F7A;
    --blue:#2B6FEA;
    --blue-tint:#EAF1FD;
    --ink:#152238;
    --ink-soft:#5B6B84;
    --line:#E3E9F2;

    font-family:'Inter',sans-serif;
    color:var(--ink);
    padding:80px 0;
    background:#fff;
    border-bottom:12px solid #fff;
  }

  .sj-wrap{
    max-width:1120px;
    margin:0 auto;
    padding:0 28px;
  }

  .sj-head{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:6px;
  }

  .sj-title{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:clamp(1.5rem,3vw,2rem);
    font-weight:600;
    color:#000;
    letter-spacing:-0.01em;
    margin:0;
  }

  .sj-underline{
    width:56px;
    height:4px;
    background:var(--blue);
    border-radius:4px;
    margin:14px 0 40px;
  }

  .sj-grid{
    display:grid;
    grid-template-columns:1.05fr 1fr;
    gap:56px;
    align-items:flex-start;
  }

  .sj-left{
    animation:fadeSlideUp .55s ease both;
  }

  .sj-desc{
    font-size:15px;
    line-height:1.85;
    color:var(--ink-soft);
    max-width:440px;
    margin-bottom:40px;
  }

  .sj-desc p{
    margin:0 0 14px;
  }

  .sj-desc p:last-child{
    margin-bottom:0;
  }

  .sj-timeline-track{
    position:relative;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
  }

  .sj-timeline-track::before{
    content:"";
    position:absolute;
    top:24px;
    left:0;
    right:24px;
    height:2px;
    background:var(--line);
    z-index:0;
  }

  .sj-timeline-item{
    position:relative;
    z-index:1;
    text-align:left;
    animation:fadeSlideUp .5s ease both;
  }

  .sj-timeline-dot{
    width:48px;
    height:48px;
    border-radius:50%;
    background:#fff;
    border:2px solid var(--blue-tint);
    box-shadow:0 2px 8px rgba(23,63,122,.08);
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:16px;
  }

  .sj-timeline-dot svg{
    width:20px;
    height:20px;
    color:var(--blue);
  }

  .sj-timeline-year{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:800;
    font-size:15px;
    color:var(--navy);
    margin-bottom:6px;
  }

  .sj-timeline-text{
    font-size:12.5px;
    color:var(--ink-soft);
    line-height:1.6;
    max-width:20ch;
  }

  .sj-photo-wrap{
    position:relative;
    animation:fadeSlideUp .6s ease both .1s;
  }

  .sj-photo{
    aspect-ratio:4/3.4;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 22px 44px -20px rgba(23,63,122,.28);
  }

  .sj-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
  }

  .sj-quote{
    position:absolute;
    left:24px;
    right:24px;
    bottom:-28px;
    background:var(--navy);
    color:#fff;
    border-radius:16px;
    box-shadow:0 14px 30px -10px rgba(23,63,122,.4);
    padding:20px 24px;
  }

  @media (min-width:768px){
    .sj-quote{
      right:auto;
      width:82%;
    }
  }

  .sj-quote p{
    margin:0;
    font-style:italic;
    font-size:14.5px;
    line-height:1.6;
  }

  @media (max-width:860px){
    .sj-grid{
      grid-template-columns:1fr;
      gap:64px 0;
    }

    .sj-timeline-track{
      grid-template-columns:1fr;
      gap:28px;
    }

    .sj-timeline-track::before{
      display:none;
    }

    .sj-timeline-item{
      display:flex;
      align-items:flex-start;
      gap:16px;
      text-align:left;
    }

    .sj-timeline-dot{
      margin-bottom:0;
      flex-shrink:0;
    }
  }
</style>

<section class="sj-section">
  <div class="sj-wrap">

    <div class="sj-grid">

      <div class="sj-left">

        <div class="sj-head">
          <h2 class="sj-title">Sejarah Sekolah</h2>
        </div>

        <div class="sj-underline"></div>

        <div class="sj-desc">

          @if($profil->deskripsi ?? false)

            @foreach(array_filter(array_map('trim', explode("\n", trim($profil->deskripsi)))) as $i => $p)

              @if($i < 1)
                <p>{{ $p }}</p>
              @endif

            @endforeach

          @else

            <p>
              SMKN 1 Cijati berdiri pada tahun 2008 sebagai jawaban
              atas kebutuhan pendidikan kejuruan di wilayah Cijati dan sekitarnya.
            </p>

          @endif

        </div>

        @php
          $timeline = [
            [
              'tahun' => '2008',
              'text' => 'Sekolah didirikan dengan 2 program keahlian awal.',
              'icon' => 'M4 19.5A2.5 2.5 0 016.5 17H20M4 19.5A2.5 2.5 0 006.5 22H20V4a2 2 0 00-2-2H6.5A2.5 2.5 0 004 4.5v15z'
            ],
            [
              'tahun' => '2012',
              'text' => 'Penambahan ruang kelas dan laboratorium praktik.',
              'icon' => 'M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 10h.01M15 10h.01'
            ],
            [
              'tahun' => '2016',
              'text' => 'Pembukaan program keahlian baru sesuai kebutuhan industri.',
              'icon' => 'M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75'
            ],
            [
              'tahun' => '2020 - Sekarang',
              'text' => 'Terus berkembang menjadi SMK unggul dan berprestasi.',
              'icon' => 'M8 21h8M12 17v4M7 4h10v3a5 5 0 01-10 0V4zM3 5h4v2a4 4 0 01-4 4V5zM21 5h-4v2a4 4 0 004 4V5z'
            ],
          ];
        @endphp

        <div class="sj-timeline-track">

          @foreach($timeline as $i => $t)

            <div class="sj-timeline-item"
                 style="animation-delay:{{ $i * 0.08 }}s">

              <div class="sj-timeline-dot">
                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                  <path d="{{ $t['icon'] }}"/>

                </svg>
              </div>

              <div>
                <div class="sj-timeline-year">
                  {{ $t['tahun'] }}
                </div>

                <div class="sj-timeline-text">
                  {{ $t['text'] }}
                </div>
              </div>

            </div>

          @endforeach

        </div>

      </div>

      <div class="sj-photo-wrap">

        <div class="sj-photo">
          <img src="{{ asset('images/lingkungan-sekolah.jpg') }}"
               alt="Lingkungan SMKN 1 Cijati">
        </div>

        <div class="sj-quote">
          <p>
            "Bersama melangkah, bersama berkembang, mewujudkan SMK unggul berdaya saing global."
          </p>
        </div>

      </div>

    </div>
  </div>
</section>


{{-- ======================= VISI & MISI ======================= --}}

<style>
  .vm-section{
    --navy:#173F7A;
    --blue:#2B6FEA;
    --blue-dark:#1B54C4;
    --blue-tint:#EAF1FD;
    --ink:#152238;
    --ink-soft:#5B6B84;
    --line:#E3E9F2;

    font-family:'Inter',sans-serif;
    color:var(--ink);
    padding:80px 0;
    background:#f8f9fc;
    border-bottom:12px solid #fff;
  }

  .vm-wrap{
    max-width:1120px;
    margin:0 auto;
    padding:0 28px;
  }

  .vm-head{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:14px;
    margin-bottom:6px;
  }

  .vm-badge{
    width:38px;
    height:38px;
    border-radius:50%;
    background:var(--blue);
    color:#fff;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-weight:800;
    font-size:17px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
  }

  .vm-title{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:clamp(1.5rem,3vw,2rem);
    font-weight:600;
    color:#000;
    letter-spacing:-0.01em;
    margin:0;
  }

  .vm-underline{
    width:56px;
    height:4px;
    background:var(--blue);
    border-radius:4px;
    margin:14px auto 40px;
  }

  .vm-grid{
    display:grid;
    grid-template-columns:1fr 1.5fr;
    gap:24px;
    align-items:stretch;
  }

  .vm-card{
    border-radius:20px;
    padding:36px 32px;
    text-align:center;
    animation:fadeSlideUp .55s ease both;
  }

  .vm-card--visi{
    background:linear-gradient(160deg,var(--blue),var(--blue-dark));
    color:#fff;
    box-shadow:0 20px 40px -18px rgba(43,111,234,.45);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
  }

  .vm-icon{
    width:56px;
    height:56px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 18px;
  }

  .vm-card--visi .vm-icon{
    background:rgba(255,255,255,.15);
  }

  .vm-card--visi .vm-icon svg{
    width:26px;
    height:26px;
    color:#fff;
  }

  .vm-card--visi h3{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:20px;
    font-weight:800;
    margin:0 0 14px;
    letter-spacing:.02em;
  }

  .vm-card--visi p{
    font-size:14px;
    line-height:1.75;
    color:rgba(255,255,255,.9);
    margin:0;
    max-width:26ch;
  }

  .vm-card--misi{
    background:#fff;
    border:1px solid var(--line);
    box-shadow:0 16px 34px -22px rgba(23,63,122,.25);
    text-align:left;
    animation-delay:.08s;
  }

  .vm-misi-head{
    display:flex;
    flex-direction:column;
    align-items:center;
    margin-bottom:22px;
  }

  .vm-card--misi .vm-icon{
    background:var(--blue-tint);
  }

  .vm-card--misi .vm-icon svg{
    width:24px;
    height:24px;
    color:var(--blue);
  }

  .vm-card--misi h3{
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:20px;
    font-weight:800;
    color:var(--navy);
    margin:0;
    letter-spacing:.02em;
  }

  .vm-list{
    list-style:none;
    margin:0;
    padding:0;
    display:flex;
    flex-direction:column;
    gap:14px;
  }

  .vm-list li{
    display:flex;
    align-items:flex-start;
    gap:12px;
    font-size:14px;
    line-height:1.65;
    color:var(--ink-soft);
  }

  .vm-check{
    width:20px;
    height:20px;
    border-radius:50%;
    background:var(--blue);
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-top:1px;
  }

  .vm-check svg{
    width:11px;
    height:11px;
    color:#fff;
  }

  @media (max-width:760px){
    .vm-grid{
      grid-template-columns:1fr;
    }
  }
</style>

<section class="vm-section">
  <div class="vm-wrap">

    <div class="vm-head">
      <h2 class="vm-title">Visi &amp; Misi</h2>
    </div>

    <div class="vm-underline"></div>

    <div class="vm-grid">

      <div class="vm-card vm-card--visi">

        <div class="vm-icon">
          <svg viewBox="0 0 24 24"
               fill="none"
               stroke="currentColor"
               stroke-width="2"
               stroke-linecap="round"
               stroke-linejoin="round">

            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
            <circle cx="12" cy="12" r="3"/>

          </svg>
        </div>

        <h3>VISI</h3>

        <p>
          @if($profil->visi ?? false)
            {{ $profil->visi }}
          @else
            Menjadi sekolah kejuruan yang unggul, berkarakter,
            berbudaya industri, dan berdaya saing global.
          @endif
        </p>

      </div>


      <div class="vm-card vm-card--misi">

        <div class="vm-misi-head">

          <div class="vm-icon">

            <svg viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">

              <circle cx="12" cy="12" r="9"/>
              <circle cx="12" cy="12" r="5"/>
              <circle cx="12" cy="12" r="1"/>

            </svg>

          </div>

          <h3>MISI</h3>

        </div>


        <ul class="vm-list">

          @php

            $misiList = $profil->misi ?? null;

            $misiItems = $misiList
              ? array_filter(array_map('trim', explode("\n", trim($misiList))))
              : [
                  'Menyelenggarakan pendidikan kejuruan yang bermutu dan relevan dengan kebutuhan industri.',
                  'Membentuk peserta didik yang berkarakter, disiplin, dan berakhlak mulia.',
                  'Mengembangkan potensi peserta didik melalui kegiatan intrakurikuler dan ekstrakurikuler.',
                  'Meningkatkan kerja sama dengan dunia usaha dan dunia industri.',
                  'Mewujudkan lingkungan sekolah yang nyaman, aman, dan kondusif.',
                ];

          @endphp


          @foreach($misiItems as $item)

            <li>

              <span class="vm-check">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="3"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                  <polyline points="20 6 9 17 4 12"/>

                </svg>

              </span>

              <span>{{ $item }}</span>

            </li>

          @endforeach

        </ul>

      </div>

    </div>
  </div>
</section>

@endsection