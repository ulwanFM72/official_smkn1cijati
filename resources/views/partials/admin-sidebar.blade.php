<div class="bg-dark text-white sidebar" id="sidebar-wrapper" style="min-height:100vh; width:260px;">

    <div class="sidebar-heading p-3 text-center border-bottom">
        <h5>SMK Negeri 1 Cijati</h5>
    </div>

    <div class="list-group list-group-flush">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
        </a>

        <!-- Profil Sekolah -->
        <a href="{{ route('admin.profil.edit') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-school me-2"></i>
            Profil Sekolah
        </a>

        <!-- Jurusan -->
        <a href="{{ route('admin.jurusan.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-graduation-cap me-2"></i>
            Jurusan
        </a>

        <!-- Guru -->
        <a href="{{ route('admin.guru.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-chalkboard-teacher me-2"></i>
            Guru & Staff
        </a>

        <!-- Siswa -->
        <a href="{{ route('admin.siswa.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-user-graduate me-2"></i>
            Siswa
        </a>

        <!-- Ekstrakurikuler -->
        <a href="{{ route('admin.ekstrakurikuler.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-futbol me-2"></i>
            Ekstrakurikuler
        </a>

        <!-- Galeri -->
        <a href="{{ route('admin.galeri.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-images me-2"></i>
            Galeri
        </a>

        <!-- Berita -->
        <a href="{{ route('admin.berita.index') }}"
           class="list-group-item list-group-item-action bg-dark text-white border-0">
            <i class="fas fa-newspaper me-2"></i>
            Berita
        </a>

       <!-- Agenda --> 
       <a href="{{ route('admin.agenda.index') }}"
          class="list-group-item list-group-item-action bg-dark text-white border-0">
           <i class="fas fa-calendar-alt me-2"></i>
            Agenda
        </a>

        <hr class="bg-secondary my-2 mx-3">

        <!-- Logout -->
        <a href="#"
           class="list-group-item list-group-item-action bg-dark text-white border-0"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt me-2"></i>
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <!-- Kembali ke Halaman Utama -->
        <a href="{{ route('home') }}"
            class="list-group-item list-group-item-action bg-dark text-white-50 border-0">
            <i class="fas fa-arrow-left me-2"></i>
              Kembali ke Halaman Utama
        </a>

    </div>
</div>