# Website Resmi SMK Negeri 1 Cijati

Website resmi SMK Negeri 1 Cijati merupakan platform digital yang dirancang
sebagai media informasi, publikasi, dan komunikasi antara sekolah dengan
siswa, orang tua, alumni, dunia usaha dan industri, serta masyarakat umum.

## Tentang Proyek

Proyek ini bertujuan menyajikan informasi sekolah secara akurat, mudah
diakses, dan selalu diperbarui. Melalui website ini, pengunjung dapat
mengenal identitas sekolah, program keahlian yang tersedia, serta
mengikuti perkembangan kegiatan dan prestasi sekolah.

## Fitur Utama

- Profil sekolah: visi, misi, sejarah, dan struktur organisasi
- Informasi program keahlian
- Berita dan pengumuman sekolah
- Galeri foto dan kegiatan
- Informasi guru dan tenaga kependidikan
- Halaman kontak dan lokasi sekolah
- Tampilan responsif untuk perangkat desktop maupun seluler

## Teknologi yang Digunakan

- Framework: Laravel
- Bahasa pemrograman: PHP
- Basis data: MySQL
- Antarmuka: Blade Template, HTML, CSS, JavaScript

## Persyaratan Sistem

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan NPM
- MySQL

## Instalasi

1. Clone repositori
   git clone https://github.com/ulwanFM72/official_smkn1cijati.git
   cd official_smkn1cijati

2. Pasang dependensi
   composer install
   npm install

3. Salin dan atur berkas lingkungan
   cp .env.example .env
   php artisan key:generate

4. Sesuaikan konfigurasi basis data pada berkas `.env`, lalu jalankan migrasi
   php artisan migrate

5. Jalankan aplikasi
   php artisan serve
   npm run dev

Aplikasi dapat diakses melalui http://localhost:8000.

## Struktur Direktori

- app/        : logika aplikasi (controller, model)
- resources/  : tampilan (Blade), aset CSS dan JavaScript
- routes/     : definisi rute aplikasi
- database/   : migrasi dan seeder
- public/     : berkas yang dapat diakses publik

## Kontribusi

Kontribusi sangat terbuka. Silakan ajukan *issue* untuk melaporkan masalah
atau usulan fitur, dan kirimkan *pull request* untuk perbaikan.

## Kredit

Proyek ini dikembangkan berdasarkan repositori awal milik juitamhlia
(web-sekolah-juita-mahalia) dan dikembangkan lebih lanjut oleh ulwanFM72.

## Lisensi

© 2026 Ulwan FM. All rights reserved.
