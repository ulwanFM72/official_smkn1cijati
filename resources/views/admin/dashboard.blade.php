@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    .dash-welcome-card {
        border-radius: 22px;
        background: linear-gradient(135deg, #e7f1ff 0%, #dbeafe 100%);
        overflow: hidden;
        position: relative;
        padding: 32px;
    }

    .dash-stat-card {
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 10px 25px -8px rgba(0,0,0,.08);
        padding: 22px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        text-decoration: none;
        display: block;
    }
    .dash-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px -8px rgba(0,0,0,.12);
        text-decoration: none;
    }
    .dash-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #fff;
        margin-bottom: 14px;
    }
    .dash-stat-label {
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .5px;
        color: #9ca3af;
        text-transform: uppercase;
    }
    .dash-stat-value {
        font-size: 1.9rem;
        font-weight: 800;
        color: #1f2937;
        line-height: 1.2;
    }
    .dash-stat-desc {
        font-size: .8rem;
        color: #9ca3af;
    }

    .dash-panel-card {
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 10px 25px -8px rgba(0,0,0,.08);
        padding: 24px;
        height: 100%;
    }

    .dash-agenda-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 14px 0;
        border-bottom: 1px solid #f1f3f5;
    }
    .dash-agenda-item:last-child {
        border-bottom: none;
    }
    .dash-agenda-tanggal {
        min-width: 56px;
        text-align: center;
        background: #eef4ff;
        border-radius: 12px;
        padding: 8px 4px;
        flex-shrink: 0;
    }
    .dash-agenda-tanggal .tgl {
        font-size: 1.1rem;
        font-weight: 800;
        color: #1d4ed8;
        line-height: 1.1;
    }
    .dash-agenda-tanggal .bln {
        font-size: .7rem;
        font-weight: 600;
        color: #1d4ed8;
        text-transform: uppercase;
    }

    .dash-quick-btn {
        border-radius: 14px;
        background: #f8f9fc;
        border: 1px solid #f1f3f5;
        padding: 16px 10px;
        text-align: center;
        text-decoration: none;
        color: #1f2937;
        font-weight: 600;
        font-size: .85rem;
        transition: background 0.25s ease, transform 0.25s ease;
        display: block;
    }
    .dash-quick-btn:hover {
        background: #e7f1ff;
        transform: translateY(-3px);
        color: #1d4ed8;
    }
    .dash-quick-btn i {
        display: block;
        font-size: 1.3rem;
        margin-bottom: 8px;
        color: #228be6;
    }
</style>


<!-- ======================= WELCOME BANNER ======================= -->
<div class="dash-welcome-card mb-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <p class="mb-1" style="color:#3b82f6; font-weight:600;">Selamat Datang</p>
            <h2 class="fw-bold mb-2" style="color:#1e293b;">Admin {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</h2>
            <p class="mb-0" style="color:#64748b;">Kelola data sekolah dengan mudah dan cepat.</p>
        </div>
        <div class="col-md-4 text-md-end d-none d-md-block">
            @if($profil->foto ?? false)
                <img src="{{ asset('images/sekolah.jpg') }}"
                     style="max-height:130px; border-radius:16px; object-fit:cover;"
                     alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}">
            @endif
        </div>
    </div>
</div>


<!-- ======================= STATISTIK ======================= -->
<div class="row g-3 mb-4">

    <div class="col-6 col-lg-3">
        <a href="{{ route('admin.jurusan.index') }}" class="dash-stat-card">
            <div class="dash-stat-icon" style="background:#3b82f6;">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="dash-stat-label">Jurusan</div>
            <div class="dash-stat-value">{{ $jumlahJurusan }}</div>
            <div class="dash-stat-desc">Jumlah jurusan yang tersedia</div>
        </a>
    </div>

    <div class="col-6 col-lg-3">
        <a href="{{ route('admin.berita.index') }}" class="dash-stat-card">
            <div class="dash-stat-icon" style="background:#22c55e;">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="dash-stat-label">Berita</div>
            <div class="dash-stat-value">{{ $jumlahBerita }}</div>
            <div class="dash-stat-desc">Total berita terbaru</div>
        </a>
    </div>

    <div class="col-6 col-lg-3">
        <a href="{{ route('admin.guru.index') }}" class="dash-stat-card">
            <div class="dash-stat-icon" style="background:#f59e0b;">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="dash-stat-label">Guru</div>
            <div class="dash-stat-value">{{ $jumlahGuru }}</div>
            <div class="dash-stat-desc">Tenaga pendidik dan staff</div>
        </a>
    </div>

    <div class="col-6 col-lg-3">
        <a href="{{ route('admin.siswa.index') }}" class="dash-stat-card">
            <div class="dash-stat-icon" style="background:#ef4444;">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="dash-stat-label">Siswa</div>
            <div class="dash-stat-value">{{ $jumlahSiswa }}</div>
            <div class="dash-stat-desc">Jumlah seluruh siswa</div>
        </a>
    </div>

</div>


<!-- ======================= AGENDA + PROFIL ======================= -->
<div class="row g-3 mb-4">

    <!-- AGENDA TERDEKAT -->
    <div class="col-lg-6">
        <div class="dash-panel-card">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0" style="color:#1f2937;">
                    <i class="fas fa-calendar-alt me-2" style="color:#228be6;"></i>
                    Agenda Terdekat
                </h6>
                <a href="{{ route('agenda') }}" class="small fw-semibold text-decoration-none" style="color:#228be6;">
                    Lihat Semua <i class="fas fa-chevron-right" style="font-size:.7rem;"></i>
                </a>
            </div>

            @forelse($agendaTerdekat as $a)
                <div class="dash-agenda-item">
                    <div class="dash-agenda-tanggal">
                        <div class="tgl">{{ \Carbon\Carbon::parse($a->tanggal)->format('d') }}</div>
                        <div class="bln">{{ \Carbon\Carbon::parse($a->tanggal)->locale('id')->translatedFormat('M') }}</div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold" style="color:#1f2937; font-size:.92rem;">{{ $a->judul }}</div>
                        <div class="small text-muted">
                            @if($a->waktu)
                                <i class="fas fa-clock me-1"></i>{{ \Carbon\Carbon::parse($a->waktu)->format('H:i') }}
                            @endif
                            @if($a->lokasi)
                                <span class="ms-2"><i class="fas fa-map-marker-alt me-1"></i>{{ $a->lokasi }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted small mb-0">Belum ada agenda mendatang.</p>
            @endforelse

        </div>
    </div>


    <!-- PROFIL SEKOLAH -->
    <div class="col-lg-6">
        <div class="dash-panel-card">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0" style="color:#1f2937;">
                    <i class="fas fa-school me-2" style="color:#228be6;"></i>
                    Profil Sekolah
                </h6>
                <a href="{{ route('admin.profil.edit') }}" class="small fw-semibold text-decoration-none" style="color:#228be6;">
                    Lihat Profil Lengkap <i class="fas fa-chevron-right" style="font-size:.7rem;"></i>
                </a>
            </div>

            <div class="d-flex gap-3 mb-3">
                @if($profil->foto ?? false)
                    <img src="{{ asset('images/sekolah.jpg') }}"
                         style="width:80px; height:80px; border-radius:14px; object-fit:cover; flex-shrink:0;"
                         alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}">
                @endif

                <div>
                    <h6 class="fw-bold mb-1" style="color:#1f2937;">{{ $profil->nama_sekolah ?? '-' }}</h6>

                    <div class="small text-muted mb-1">
                        <i class="fas fa-map-marker-alt me-1"></i> {{ $profil->alamat ?? '-' }}
                    </div>
                    <div class="small text-muted mb-1">
                        <i class="fas fa-phone me-1"></i> {{ $profil->telepon ?? '-' }}
                    </div>
                    <div class="small text-muted">
                        <i class="fas fa-envelope me-1"></i> {{ $profil->email ?? '-' }}
                    </div>
                </div>
            </div>

            @if($profil->visi ?? false)
                <div class="pt-3" style="border-top:1px solid #f1f3f5;">
                    <div class="small fw-semibold mb-1" style="color:#228be6;">
                        <i class="fas fa-eye me-1"></i> Visi
                    </div>
                    <p class="small text-muted mb-0" style="font-style:italic;">
                        "{{ Str::limit($profil->visi, 120) }}"
                    </p>
                </div>
            @endif

        </div>
    </div>

</div>


<!-- ======================= MENU CEPAT ======================= -->
<div class="dash-panel-card">

    <h6 class="fw-bold mb-3" style="color:#1f2937;">
        <i class="fas fa-bolt me-2" style="color:#f59e0b;"></i>
        Menu Cepat
    </h6>

    <div class="row g-3">

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.jurusan.index') }}" class="dash-quick-btn">
                <i class="fas fa-graduation-cap"></i>
                Jurusan
            </a>
        </div>

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.guru.index') }}" class="dash-quick-btn">
                <i class="fas fa-chalkboard-teacher"></i>
                Guru
            </a>
        </div>

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.siswa.index') }}" class="dash-quick-btn">
                <i class="fas fa-user-graduate"></i>
                Siswa
            </a>
        </div>

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="dash-quick-btn">
                <i class="fas fa-star"></i>
                Ekstrakurikuler
            </a>
        </div>

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.galeri.index') }}" class="dash-quick-btn">
                <i class="fas fa-images"></i>
                Galeri
            </a>
        </div>

        <div class="col-4 col-md-2">
            <a href="{{ route('admin.berita.index') }}" class="dash-quick-btn">
                <i class="fas fa-newspaper"></i>
                Berita
            </a>
        </div>

    </div>

</div>

@endsection