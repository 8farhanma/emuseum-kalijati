# Rumah Sejarah Kalijati

![Rumah Sejarah Kalijati Logo](public/WT-Museum/images/logo/logomuseumkalijati.png)

## Tentang Proyek

Rumah Sejarah Kalijati adalah sebuah platform digital yang didedikasikan untuk melestarikan dan mempromosikan warisan sejarah di Kalijati. Aplikasi ini dibangun dengan Laravel, menyediakan akses mudah bagi pengunjung untuk mengeksplorasi koleksi bersejarah, informasi kunjungan, dan publikasi terkait sejarah Kalijati.

## Fitur Utama

- **Koleksi Digital** - Jelajahi berbagai koleksi bersejarah dengan detail lengkap
- **Informasi Kunjungan** - Dapatkan informasi terbaru tentang jam buka, tiket, dan aturan kunjungan
- **Publikasi** - Akses berbagai publikasi dan artikel sejarah
- **FAQ** - Temukan jawaban atas pertanyaan umum seputar Rumah Sejarah Kalijati
- **Ulasan** - Bagikan pengalaman kunjungan Anda
- **Profil** - Pelajari lebih lanjut tentang Rumah Sejarah Kalijati

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM

## Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/8farhanma/SIstem-Informasi-Rumah-Sejarah-Kalijati.git
   cd RumahSejarahKalijati
   ```

2. Install dependensi PHP:
   ```bash
   composer install
   ```

3. Install dependensi JavaScript:
   ```bash
   npm install
   ```

4. Salin file .env:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Konfigurasi database di file .env:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rumah_sejarah_kalijati
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Jalankan migrasi dan seeder:
   ```bash
   php artisan migrate --seed
   ```

8. Compile assets:
   ```bash
   npm run dev
   ```

9. Jalankan server development:
   ```bash
   php artisan serve
   ```

10. Buka browser dan akses:
    ```
    http://localhost:8000
    ```

## Struktur Proyek

- `app/Http/Controllers/` - Berisi controller untuk menangani logika aplikasi
- `resources/views/` - Berisi file tampilan (blade templates)
- `public/` - Berisi file yang dapat diakses publik (CSS, JavaScript, gambar)
- `database/migrations/` - Berisi migrasi database
- `routes/web.php` - Mendefinisikan rute aplikasi web

## Kontribusi

Kontribusi untuk pengembangan Rumah Sejarah Kalijati sangat diterima. Silakan buat issue terlebih dahulu untuk mendiskusikan perubahan yang ingin Anda buat.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
