
# 🎬 Aplikasi Manajemen Film – Laravel 12

Aplikasi ini merupakan sistem manajemen data film berbasis Laravel 12. Aplikasi dilengkapi dengan fitur CRUD (Create, Read, Update, Delete) serta sistem autentikasi dan otorisasi untuk membedakan hak akses antara **user biasa** dan **admin**.

---

## ✨ Fitur Utama
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
![Laravel Breeze](https://img.shields.io/badge/Auth-Laravel_Breeze-8B5CF6?style=flat)
![Blade](https://img.shields.io/badge/Template-Blade-F7523F?style=flat&logo=blade&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

- CRUD data film (judul, sutradara, tahun rilis, sinopsis, poster)
- Login & Register akun email (Laravel Breeze)
- Autentikasi & otorisasi:
  - Role-based access (User & Admin)
  - Middleware untuk keamanan akses halaman
- Validasi form:
  - Field wajib (title, sutradara, tahun, poster)
  - Title harus unik
  - Tahun rilis minimal 2000 dan maksimal tahun sekarang
- Navigasi dinamis: menu hanya muncul untuk role yang berhak
- Seeder data dummy film
- Blade templating untuk UI
- Guard redirect non-admin ke halaman 403

---

## 🧱 Teknologi & Arsitektur

- ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white) **Laravel 12**
- 🧭 **MVC Architecture** (Model-View-Controller)
- 🎨 **Blade Templating Engine**
- ![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white) **MySQL** (Database)
- 🛠️ **Migration & Seeder**
- 🔁 **Route Resource Laravel** (otomatis generate endpoint GET, POST, PUT, DELETE)
- 🛡️ **Middleware & Guard** untuk kontrol akses

---

## 🗂️ Struktur Aplikasi

- `app/Models`: Model untuk interaksi dengan database
- `app/Http/Controllers`: Menangani logika bisnis & validasi input
- `app/Http/Middleware`: Filter akses login dan role
- `resources/views`: Blade template untuk UI (dashboard, create, edit, dll)
- `routes/web.php`: Definisi semua URL aplikasi
- `database/migrations`: Desain struktur tabel database
- `database/seeders`: Data dummy awal

---

## ✨ Screenshoot

- Login
  ![App Screenshot](/resources/ss/Login.png)
  
- Kelola Film (Admin)
  ![App Screenshot](/resources/ss/KelolaFilm.png)
  
- Create (Admin)
  ![App Screenshot](/resources/ss/Create.png)
  
- Update (Admin)
  ![App Screenshot](/resources/ss/Update.png)

- Delete (Admin)
  ![App Screenshot](/resources/ss/Delete.png)
  
- Dashboard 
  ![App Screenshot](/resources/ss/DashboardUserBiasa.png)

- Info Movie 
  ![App Screenshot](/resources/ss/InfoMovie.png)

---

## 🚀 Cara Menjalankan

1. Clone repo ini dulu:
   ```bash
    git clone https://github.com/riskybaguse/Film_Fav.git
2. Masuk ke folder proyek:
   ```bash
   cd Film_Fav
3. Install dependencies Laravel:
   ```bash
   composer install
4. Copy file .env.example jadi .env, lalu sesuaikan konfigurasi database:
   ```bash
   cp .env.example .env
5. Generate app key:
    ```bash
    php artisan key:generate
6. Migrasi database:
    ```bash
    php artisan migrate
7. Jalankan server lokal:
    ```bash
    php artisan serve
8. Buka browser dan akses:
    ```bash
    http://localhost:8000/pegawai

---

## 👤 Hak Akses

- **User biasa** hanya bisa melihat informasi film
- **Admin** dapat mengakses halaman kelola film:
  - Menambah, mengedit, dan menghapus data film
  - Mengelola konten dashboard

---

## 📝 Lisensi
??
