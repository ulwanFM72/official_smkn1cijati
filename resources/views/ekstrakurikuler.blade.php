@extends('layouts.app-public')

@section('title', 'Ekstrakurikuler')

@section('content')

<style>
  @keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .ekskul-page{ --navy:#173F7A; --blue:#2B6FEA; --blue-tint:#EAF1FD;
    --ink:#152238; --ink-soft:#5B6B84; --line:#E3E9F2; }
  .ekskul-page{ font-family:'Inter',sans-serif; color:var(--ink); }
  .ekskul-page .wrap{ max-width:1200px; margin:0 auto; padding:0 28px; }

  /* ===== HERO (full-width foto, gaya halaman jurusan) ===== */
  .ekskul-hero{
    position:relative;
    height:400px;
    overflow:hidden;
  }
  .ekskul-hero img{
    width:100%; height:100%; object-fit:cover; display:block;
  }
  .ekskul-hero::after{
    content:'';
    position:absolute; inset:0;
    background:linear-gradient(180deg, rgba(10,20,40,.55) 0%, rgba(10,20,40,.35) 45%, rgba(10,20,40,.78) 100%);
  }
  .ekskul-hero-content{
    position:absolute; inset:0;
    display:flex; flex-direction:column; align-items:center; justify-content:center;
    text-align:center; padding:0 20px; z-index:2;
  }
  .ekskul-hero-eyebrow{
    display:inline-flex; align-items:center; gap:8px;
    font-size:.8rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase;
    color:#eaf2ff; background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.25);
    padding:6px 16px; border-radius:999px; backdrop-filter:blur(4px);
    margin-bottom:16px;
    animation:fadeSlideUp .6s ease both .1s;
  }
  .ekskul-hero-content h1{
    color:#fff; font-family:'Plus Jakarta Sans',sans-serif; font-weight:800;
    font-size:clamp(1.8rem, 4vw, 2.6rem); letter-spacing:-0.01em; margin:0 0 10px;
    animation:fadeSlideUp .6s ease both .05s;
  }
  .ekskul-hero-content p{
    color:rgba(255,255,255,.88); font-size:.98rem; max-width:52ch; margin:0 auto;
    animation:fadeSlideUp .6s ease both .15s;
  }

  /* GRID */
  .ekskul-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:24px; padding:48px 0 80px; }
  .ekskul-card{ background:#fff; border:1px solid var(--line); border-radius:16px; overflow:hidden;
    box-shadow:0 1px 2px rgba(20,30,50,.03); display:flex; flex-direction:column; }
  .ekskul-card-photo{ aspect-ratio:4/3; position:relative; overflow:hidden;
    background:linear-gradient(150deg,#DCE8FB,#AFCBF1); }
  .ekskul-card-photo img{ width:100%; height:100%; object-fit:cover; display:block; }
  .ekskul-card-mark{ width:44px; height:44px; border-radius:50%;
    background:#fff; border:1px solid var(--line); box-shadow:0 2px 5px rgba(20,30,50,.06);
    display:flex; align-items:center; justify-content:center;
    margin:-22px 0 12px 20px; position:relative; z-index:1; overflow:hidden; }
  .ekskul-card-mark img{ width:100%; height:100%; object-fit:cover; border-radius:50%; }
  .ekskul-card-mark svg{ width:20px; height:20px; color:var(--blue); }
  .ekskul-card-body{ padding:0 20px 20px; display:flex; flex-direction:column; flex:1; }
  .ekskul-card-name{ font-family:'Plus Jakarta Sans',sans-serif; font-size:17px; font-weight:700; margin:0 0 10px; }
  .ekskul-card-desc{ font-size:13.5px; color:var(--ink-soft); line-height:1.6; margin:0 0 18px;
    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; flex:1; }
  .ekskul-card-btn{ font-size:13.5px; font-weight:600; color:var(--blue); background:#fff;
    border:1.4px solid #C9DBFA; border-radius:10px; padding:9px 0; text-align:center;
    text-decoration:none; transition:background .15s; }
  .ekskul-card-btn:hover{ background:var(--blue-tint); }

  @media (max-width:1024px){ .ekskul-grid{ grid-template-columns:repeat(3,1fr); } }
  @media (max-width:768px){ .ekskul-grid{ grid-template-columns:repeat(2,1fr); gap:18px; } .ekskul-hero{ height:240px; } }
  @media (max-width:520px){ .ekskul-grid{ grid-template-columns:1fr; } }
</style>

<div class="ekskul-page">

  <!-- HERO -->
  <div class="ekskul-hero">
    <img src="{{ asset('images/sekolah.jpg') }}" alt="Ekstrakurikuler SMK Negeri 1 Cijati">

    <div class="ekskul-hero-content">
      <span class="ekskul-hero-eyebrow">Ekstrakurikuler</span>
      <p>Kembangkan bakat, minat, dan potensi diri melalui berbagai kegiatan ekstrakurikuler.</p>
    </div>
  </div>

  <div class="wrap">
    <div class="ekskul-grid">
      @forelse($ekstrakurikuler as $item)
        <div class="ekskul-card">
          <div class="ekskul-card-photo">
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" alt="Foto {{ $item->nama }}">
            @endif
          </div>

          <div class="ekskul-card-mark">
            @if($item->logo)
              <img src="{{ asset('storage/'.$item->logo) }}" alt="Logo {{ $item->nama }}">
            @else
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>
            @endif
          </div>

          <div class="ekskul-card-body">
            <h3 class="ekskul-card-name">{{ $item->nama }}</h3>
            <p class="ekskul-card-desc">{{ $item->deskripsi }}</p>
            <a href="{{ route('ekstrakurikuler.show', $item->id) }}" class="ekskul-card-btn">Lihat Detail →</a>
          </div>
        </div>
      @empty
        <p style="grid-column:1/-1; text-align:center; color:var(--ink-soft);">
          Belum ada data ekstrakurikuler.
        </p>
      @endforelse
    </div>
  </div>
</div>

@endsection