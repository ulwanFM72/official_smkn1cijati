<style>
    .navbar .dropdown {
        position: relative;
    }

    .navbar .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,.12);
        border-radius: 12px;
        margin-top: 10px;
        padding: 14px 10px;
        min-width: 240px;
        text-align: center;
    }

    .navbar .dropdown::before {
        content: '';
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 15px;
    }

    .navbar .dropdown:hover .dropdown-menu {
        display: block;
    }

    .navbar .dropdown-menu .dropdown-item {
        padding: 10px 16px;
        font-weight: 600;
        border-radius: 8px;
    }

    .navbar .dropdown-menu .dropdown-item:hover {
        background-color: rgba(34, 139, 230, .08);
        color: #228be6;
    }

    .navbar .nav-link {
    position: relative;
    padding-bottom: 6px;
    }

    .navbar .nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 2px;
    background-color: #228be6;
    transition: width 0.25s ease;
    }

   .navbar .nav-item:hover .nav-link::before {
    width: 100%;
    }

    .navbar .dropdown-toggle::after {
        display: none;
    }

    .navbar .dropdown-toggle .chevron-icon {
        color: #374151;
        font-size: 0.75rem;
        margin-left: 6px;
        vertical-align: middle;
        transition: transform 0.25s ease, color 0.25s ease;
        display: inline-block;
    }

    .navbar .dropdown:hover .dropdown-toggle .chevron-icon {
        color: #228be6;
        transform: rotate(180deg);
    }
</style>

<nav class="navbar navbar-expand-lg py-2" style="position: fixed; top: 15px; left: 0; right: 0; z-index: 1050; background: transparent;">
    <div class="container-fluid px-4" style="background: #ffffff; border-radius: 50px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); padding-top: 8px; padding-bottom: 8px; margin: 0 auto; max-width: 1200px;">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo"
                 height="45"
                 class="me-2">
            <div>
                <div class="fw-bold text-uppercase" style="font-size: 1.1rem; line-height: 1.2; color: #1a1a1a; letter-spacing: 0.3px;">
                    SMK NEGERI 1 CIJATI
                </div>
            </div>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item mx-1">
                    <a class="nav-link fw-semibold" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" id="profilDropdown" role="button">
                        Profil Sekolah
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah Singkat</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.visimisi') }}">Visi &  Misi </a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.guru-staff') }}">Guru dan Staff</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.programkebiasaan') }}">Program Kebiasaan</a></li>
                    </ul>
                </li>

               <li class="nav-item dropdown mx-1">
                   <a class="nav-link dropdown-toggle fw-semibold" href="#" id="keahlianDropdown" role="button">
                      Konsentrasi Keahlian
                      <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="keahlianDropdown">
                       <li><a class="dropdown-item" href="{{ route('jurusan.show', 1) }}">RPL</a></li>
                        <li><a class="dropdown-item" href="{{ route('jurusan.show', 4) }}">TKR</a></li>
                        <li><a class="dropdown-item" href="{{ route('jurusan.show', 2) }}">APHP</a></li>
                        <li><a class="dropdown-item" href="{{ route('jurusan.show', 3) }}">BDP</a></li>
                    </ul>
                </li>

              <li class="nav-item dropdown mx-1">
                  <a class="nav-link dropdown-toggle fw-semibold" href="#" id="ekskulDropdown" role="button">
                     Ekstrakurikuler
                     <i class="fas fa-chevron-down chevron-icon"></i>
                  </a>

                   <ul class="dropdown-menu" aria-labelledby="ekskulDropdown">
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 10) }}">Paskibra</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 9) }}">Pramuka</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 8) }}">PMR</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 7) }}">Marching Band</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 6) }}">Rohis</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 5) }}">Karawitan</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 4) }}">Volly Ball</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 3) }}">Futsal</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 2) }}">Cinemak</a></li>
                        <li><a class="dropdown-item" href="{{ route('ekstrakurikuler.show', 1) }}">Bahasa Jepang</a></li>
                    </ul>
                </li>

                

                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" id="informasiDropdown" role="button">
                        Informasi
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="informasiDropdown">
                        <li><a class="dropdown-item" href="{{ route('berita') }}">Berita</a></li>
                        <li><a class="dropdown-item" href="{{ route('agenda') }}">Agenda</a></li>
                        <li><a class="dropdown-item" href="{{ route('galeri') }}">Galeri</a></li>
                    </ul>
                </li>

                <li class="nav-item mx-1">
                    <a class="nav-link fw-semibold" href="{{ route('profil.kontaksekolah') }}">
                        Kontak
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>