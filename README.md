# 🏥 Rumah Khitan Salaf - Web Profile & Dashboard System

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-000000?style=for-the-badge&logo=mysql&logoColor=white)

Aplikasi berbasis web untuk profil klinik khitan dan sistem manajemen kotak saran pelanggan. Project ini dibangun menggunakan **Laravel 11**, **Breeze**, dan **Tailwind CSS**.

---

## 🚀 Fitur Utama

### 1. 🌐 Public (Pengunjung)
- **Landing Page Informatif:** Menampilkan layanan, harga, peta lokasi, dan galeri dokumentasi.
- **Form Kritik & Saran:** Pengunjung dapat mengirim pesan kepada admin tanpa perlu login.
- **Testimoni Dinamis:** Menampilkan ulasan pengunjung yang telah disetujui (publish) oleh admin.

### 2. 🔐 Admin (Dashboard)
- **Autentikasi Aman:** Sistem Login & Logout menggunakan Laravel Breeze.
- **Dashboard Statistik:** Ringkasan jumlah saran masuk, saran baru, dan saran tampil.
- **Manajemen Saran (CRUD):**
  - **Read:** Melihat daftar pesan masuk.
  - **Update:** Membalas pesan dan mengubah status (Tampilkan/Sembunyikan) di web utama.
  - **Delete:** Menghapus saran yang tidak relevan.
- **Manajemen Profil:** Update nama, email, dan password admin.

---

## 💻 Persyaratan Sistem (Requirements)

Sebelum menjalankan, pastikan laptop Anda sudah terinstall:
- PHP >= 8.2
- Composer
- Node.js & NPM
- Database MySQL (XAMPP/Laragon)

---

## ⚙️ Cara Instalasi (Installation Guide)

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal:

### 1. Clone Repository
Buka terminal (Git Bash/CMD), lalu jalankan:
```bash
git clone [https://github.com/hinnza/website-rumah-khitan-salaf.git](https://github.com/hinnza/website-rumah-khitan-salaf.git)
cd rumah-khitan-salaf
```

### 2. Install Dependencies
Install library PHP dan asset frontend:
```bash
composer install
npm install && npm run build
```

### 3. Konfigurasi Environment (.env)
Duplikat file contoh konfigurasi, lalu ubah namanya:
- **Windows:** copy .env.example .env
- **Mac/Linux:** cp .env.example .env
Lalu buka file .env dan atur koneksi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_rumah_khitan
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Setup Database
Pastikan Anda sudah membuat database kosong bernama db_rumah_khitan di phpMyAdmin.
Pilih salah satu cara di bawah ini untuk mengisi data:
**Opsi A: Menggunakan Migration & Seeder (Rekomendasi)** Jalankan perintah ini untuk membuat tabel dan mengisi akun admin otomatis:
```bash
php artisan migrate --seed
```
**Opsi B: Import Manual SQL** Jika tersedia file .sql di folder project, Anda bisa import file tersebut ke phpMyAdmin.

### 5. Jalankan Aplikasi
Generate key aplikasi dan jalankan server:
```bash
php artisan key:generate
php artisan serve
```
Buka browser dan akses: http://127.0.0.1:8000

---

## 🔑 Akun Demo Admin

Gunakan kredensial berikut untuk login ke halaman Dashboard 

| Role | Nama | Email | Password |
|------|------|-------|----------|
| Administrator | Admin Khitan | admin@gmail.com | password |

_(Catatan: Password default dari seeder Laravel biasanya adalah "password". Jika Anda mengubahnya di seeder, sesuaikan bagian ini)_

---

## 📂 Struktur Folder Penting

Untuk memahami konsep MVC pada project ini, silakan cek file berikut:

- **Model:**
  - app/Models/Suggestion.php (Model Saran)
  - app/Models/User.php (Model User/Admin)
- **View:**
  - resources/views/welcome.blade.php (Halaman Depan)
  - resources/views/dashboard/ (Halaman Admin)
- **Controller:**
  - app/Http/Controllers/PublicController.php (Logika Halaman Depan)
  - app/Http/Controllers/Admin/SuggestionController.php (Logika Dashboard)
- **Route:**
  - routes/web.php (Definisi Jalur URL)
