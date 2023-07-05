# Nama Proyek

Proyek ini dikerjakan untuk assesment internship test.
Pemesanan Kendaraan bertujuan untuk mengatur bagaimana kendaraan - kendaraan pada sebuah perusahaan dapat diatur pemetaannya dan mempermudah dalam hal perencanaan

# Spesifikasi project

1. Bahasa Pemrograman : PHP 8.x

2. Framework : Laravel 10.x

3. Database : MySQL 10.4.x

## Instalasi

1. Clone repositori ini:
git clone https://github.com/anandaricky01/pemesanan-kendaraan.git

2. Masuk ke direktori proyek:
cd pemesanan-kendaraan

3. Instal dependensi:
composer install

4. Salin file `.env.example` menjadi `.env`:

5. Atur konfigurasi database dan lingkungan lainnya di file `.env`.

6. Generate key aplikasi:
php artisan key:generate

7. Install NPM:
npm install

8. Jalankan migrasi untuk membuat skema database:
php artisan migrate

9. Jalankan seeder untuk mengisi data awal:
php artisan db:seed
- Note : sudah terdapat user default dengan role admin
- email : admin@gmail.com
- password : password

10. Jalankan server pengembangan lokal:
php artisan serve 

11. Jalankan developing mode NPM:
npm run dev

12 atau jalankan mode build NPM:
npm run build

   Aplikasi akan dapat diakses melalui `http://localhost:8000`.

## Penggunaan

Jelaskan cara penggunaan proyekmu, termasuk perintah yang perlu dijalankan, rute yang tersedia, atau tindakan tertentu yang harus diambil oleh pengguna.

## Kontribusi

Jika kamu ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

1. Fork repositori ini.
2. Buat branch baru:


