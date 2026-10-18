@extends('layouts.app-public')

@section('title', 'SMK Negeri 1 Cijati')

@section('content')

<!-- HERO -->
<section class="py-5 text-white text-center"
    style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('{{ asset('images/sekolah.jpg') }}') center/cover; min-height: 500px;">

    <div class="container py-5">

        <h1 class="display-4 fw-bold">
            SMK Negeri 1 Cijati
        </h1>

        <p class="lead mt-3">
            Menyiapkan Generasi Unggul, Kompeten, dan Berkarakter
        </p>

        <a href="{{ route('profil') }}" class="btn btn-primary btn-lg mt-3">
            <i class="fas fa-school"></i>
            Profil Sekolah
        </a>

        <a href="{{ route('jurusan.public') }}" class="btn btn-outline-light btn-lg mt-3">
            <i class="fas fa-graduation-cap"></i>
            Program Keahlian
        </a>

    </div>
</section>


<!-- TENTANG SEKOLAH -->
<section class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Tentang Sekolah
        </h2>

        <div class="row align-items-center">

            <div class="col-md-6">

                <h3>
                    {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                </h3>

                <p>
                    {{ $profil->deskripsi ?? 'Deskripsi sekolah belum tersedia.' }}
                </p>

                <a href="{{ route('profil') }}" class="btn btn-primary">
                    Lihat Profil Lengkap
                </a>

            </div>

            <div class="col-md-6">

                @if($profil && $profil->foto)

                    <img src="{{ asset('storage/' . $profil->foto) }}"
                         class="img-fluid rounded shadow"
                         alt="Foto Sekolah">

                @else

                    <div class="bg-secondary text-white rounded p-5 text-center">
                        Foto sekolah belum tersedia
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


<!-- JURUSAN -->
<section class="py-5">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Program Keahlian
        </h2>

        <div class="row">

            @foreach($jurusan as $j)

                <div class="col-md-3 mb-4">

                    <div class="card h-100 shadow-sm">

                        @if($j->gambar)

                            <img src="{{ asset('storage/' . $j->gambar) }}"
                                 class="card-img-top"
                                 style="height:180px; object-fit:cover;"
                                 alt="{{ $j->nama }}">

                        @endif

                        <div class="card-body text-center">

                            <h5>
                                {{ $j->nama }}
                            </h5>

                            <p>
                                {{ Str::limit($j->deskripsi, 80) }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- GURU -->
<section class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Guru & Staff
        </h2>

        <div class="row">

            @foreach($gurus as $guru)

                <div class="col-md-3 mb-4">

                    <div class="card text-center h-100 shadow-sm">

                        <div class="card-body">

                            <i class="fas fa-user-tie fa-4x text-primary mb-3"></i>

                            <h5>
                                {{ $guru->nama }}
                            </h5>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="text-center">

            <a href="{{ route('guru.public') }}" class="btn btn-primary">
                Lihat Semua Guru
            </a>

        </div>

    </div>

</section>


<!-- EKSTRAKURIKULER -->
<section class="py-5">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Ekstrakurikuler
        </h2>

        <div class="row">

            @foreach($ekskul as $e)

                <div class="col-md-3 mb-4">

                    <div class="card h-100 shadow-sm">

                        @if($e->gambar)

                            <img src="{{ asset('storage/' . $e->gambar) }}"
                                 class="card-img-top"
                                 style="height:160px; object-fit:cover;"
                                 alt="{{ $e->nama }}">

                        @endif

                        <div class="card-body">

                            <h5>
                                {{ $e->nama }}
                            </h5>

                            <p>
                                {{ Str::limit($e->deskripsi, 70) }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- GALERI -->
<section class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Galeri Kegiatan
        </h2>

        <div class="row">

            @foreach($galeri as $g)

                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm">

                        <img src="{{ asset('storage/' . $g->gambar) }}"
                             class="card-img-top"
                             style="height:200px; object-fit:cover;"
                             alt="{{ $g->judul }}">

                        <div class="card-body">

                            <h5>
                                {{ $g->judul }}
                            </h5>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="text-center">

            <a href="{{ route('galeri') }}" class="btn btn-primary">
                Lihat Galeri
            </a>

        </div>

    </div>

</section>


<!-- BERITA -->
<section class="py-5">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Berita Terbaru
        </h2>

        <div class="row">

            @foreach($berita as $b)

                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow-sm">

                        @if($b->gambar)

                            <img src="{{ asset('storage/' . $b->gambar) }}"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;"
                                 alt="{{ $b->judul }}">

                        @endif

                        <div class="card-body">

                            <h5>
                                {{ $b->judul }}
                            </h5>

                            <p>
                                {{ Str::limit(strip_tags($b->isi), 100) }}
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="text-center">

            <a href="{{ route('berita') }}" class="btn btn-primary">
                Lihat Semua Berita
            </a>

        </div>

    </div>

</section>


<!-- AGENDA -->
<section class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center fw-bold mb-4">
            Agenda Sekolah
        </h2>

        <div class="list-group">

            @foreach($agenda as $a)

                <div class="list-group-item">

                    <h5>
                        {{ $a->judul }}
                    </h5>

                    <p class="mb-1">
                        <i class="fas fa-calendar"></i>
                        {{ $a->tanggal }}
                    </p>

                    <p class="mb-1">
                        <i class="fas fa-clock"></i>
                        {{ $a->waktu }}
                    </p>

                    <p class="mb-0">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $a->lokasi }}
                    </p>

                </div>

            @endforeach

        </div>

        <div class="text-center mt-3">

            <a href="{{ route('agenda') }}" class="btn btn-primary">
                Lihat Semua Agenda
            </a>

        </div>

    </div>

</section>

@endsection