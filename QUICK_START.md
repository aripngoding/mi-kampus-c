# 🚀 Quick Start - MI Kampus-C

Panduan cepat untuk menjalankan project Website Profil & Sistem PPDB Online MI Kampus-C.

## ✅ Status Project

Project sudah **90% siap digunakan**. Yang perlu dilakukan:

1. ✅ Laravel 12 - Installed
2. ✅ TailwindCSS - Configured & Built
3. ✅ Database Migrations - Created
4. ✅ Models & Controllers - Created
5. ✅ Frontend Views - Created (Tema Hijau & Putih)
6. ✅ Routes - Configured
7. ✅ Filament Resources - Created
8. ⚠️ **Filament PHP - Perlu diinstall** (karena masalah SSL)
9. ✅ Assets - Built
10. ✅ Storage Link - Created

## 🎯 Yang Perlu Dilakukan

### 1. Fix SSL Certificate (Jika menggunakan XAMPP)

**Download cacert.pem:**
- URL: https://curl.se/ca/cacert.pem
- Save ke: `C:\xampp\php\extras\ssl\cacert.pem`

**Edit php.ini** (`C:\xampp\php\php.ini`):
```ini
curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"
openssl.cafile="C:\xampp\php\extras\ssl\cacert.pem"
```

**Restart Apache** dari XAMPP Control Panel.

### 2. Buat Database

```sql
CREATE DATABASE mi_kampus_c CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atau import file `database/mi_kampus_c.sql` via phpMyAdmin.

### 3. Install Filament PHP

```bash
composer require filament/filament:"^3.2" -W
```

### 4. Aktifkan AdminPanelProvider

Edit file `bootstrap/providers.php`, uncomment baris:
```php
App\Providers\Filament\AdminPanelProvider::class,
```

### 5. Jalankan Migrations & Seeder

```bash
php artisan migrate
php artisan db:seed
```

### 6. Jalankan Server

```bash
php artisan serve
```

Akses:
- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin

**Login Admin:**
- Email: `admin@mi-kampus-c.sch.id`
- Password: `password`

## 📦 Atau Gunakan Script Otomatis

### Windows:
```bash
setup.bat
```

### Linux/Mac:
```bash
chmod +x setup.sh
./setup.sh
```

## 📁 Struktur Project

```
mi-kampus-c/
├── app/
│   ├── Filament/              ✅ Admin Panel (Resources, Widgets, Pages)
│   ├── Http/Controllers/      ✅ HomeController, PpdbController
│   ├── Models/                ✅ User, PpdbRegistration, Gallery
│   └── Providers/             ✅ AppServiceProvider, AdminPanelProvider
├── database/
│   ├── migrations/            ✅ 3 migration files
│   ├── seeders/               ✅ AdminSeeder
│   └── mi_kampus_c.sql        ✅ SQL dump lengkap
├── resources/
│   ├── css/app.css            ✅ TailwindCSS (Tema Hijau & Putih)
│   ├── js/app.js              ✅ JavaScript
│   └── views/                 ✅ Semua halaman frontend
│       ├── layouts/app.blade.php
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── visi-misi.blade.php
│       ├── gallery.blade.php
│       ├── contact.blade.php
│       └── ppdb/
│           ├── index.blade.php
│           └── success.blade.php
├── routes/web.php             ✅ Semua routes terdaftar
├── .env                       ✅ Configured untuk MySQL
├── tailwind.config.js         ✅ Configured
├── vite.config.js             ✅ Configured
└── package.json               ✅ Dependencies installed
```

## 🎨 Fitur yang Sudah Dibuat

### Frontend (Public)
✅ **Beranda**
- Hero banner dengan tema hijau
- Statistik sekolah
- Sambutan kepala sekolah
- Keunggulan sekolah
- Preview galeri
- CTA PPDB

✅ **Tentang Kami**
- Sejarah singkat
- Fasilitas lengkap (8 fasilitas)
- Tenaga pendidik

✅ **Visi & Misi**
- Visi sekolah
- 7 Misi sekolah
- 4 Tujuan madrasah

✅ **Galeri**
- Grid foto kegiatan
- Lightbox untuk preview
- Pagination

✅ **Kontak**
- Informasi kontak lengkap
- Google Maps embed
- Social media links
- CTA WhatsApp

✅ **PPDB Online**
- Form pendaftaran lengkap
- Validasi form
- Generate nomor registrasi otomatis
- Halaman sukses dengan detail pendaftaran

### Admin Panel (Filament)
✅ **Dashboard**
- Widget statistik PPDB (Total, Pending, Verified, Accepted, Rejected)

✅ **Manajemen PPDB**
- Tabel data pendaftar
- View, Edit, Delete
- Terima/Tolak pendaftar (bulk & individual)
- Filter by status & gender
- Search
- Badge notification untuk pending

✅ **Manajemen Galeri**
- Upload foto
- CRUD galeri
- Toggle aktif/nonaktif
- Image resize otomatis

## 🎨 Tema & Desain

- **Primary Color**: Green (#16a34a)
- **Secondary Color**: White (#ffffff)
- **Accent**: Yellow (#facc15)
- **Font**: Inter (Google Fonts)
- **Framework**: TailwindCSS
- **Icons**: Emoji (untuk kompatibilitas maksimal)

## 📊 Database

### Tables:
1. **users** - Admin accounts
2. **ppdb_registrations** - Data pendaftar PPDB
3. **galleries** - Foto galeri kegiatan
4. **migrations** - Laravel migrations
5. **password_reset_tokens** - Password reset
6. **sessions** - User sessions (optional)
7. **cache** - Cache storage (optional)

## 🔐 Default Admin

- **Email**: admin@mi-kampus-c.sch.id
- **Password**: password
- **Role**: superadmin

⚠️ **PENTING**: Ubah password setelah login pertama kali!

## 📝 Catatan Penting

1. **Filament belum terinstall** karena masalah SSL certificate di XAMPP
2. Setelah install Filament, uncomment `AdminPanelProvider` di `bootstrap/providers.php`
3. Folder `storage/app/public/gallery` akan dibuat otomatis saat upload foto
4. Assets sudah di-build, siap untuk production

## 🐛 Troubleshooting

### Error: Class 'Filament\...' not found
```bash
composer require filament/filament:"^3.2" -W
composer dump-autoload
```

### Error: SQLSTATE[HY000] [1049] Unknown database
```bash
# Buat database di MySQL
CREATE DATABASE mi_kampus_c;
```

### Error: No application encryption key
```bash
php artisan key:generate
```

### Gambar tidak muncul
```bash
php artisan storage:link
```

## 📞 Dokumentasi Lengkap

- `README_SETUP.md` - Panduan setup lengkap
- `INSTALASI_MANUAL.md` - Panduan instalasi manual step-by-step
- `database/mi_kampus_c.sql` - SQL dump untuk import manual

## ✨ Next Steps

Setelah project berjalan:

1. ✅ Login ke admin panel
2. ✅ Ubah password default
3. ✅ Upload foto ke galeri
4. ✅ Test form PPDB
5. ✅ Customize konten (alamat, telepon, email, dll)
6. ✅ Ganti logo sekolah (jika ada)
7. ✅ Setup email SMTP (opsional)
8. ✅ Deploy ke hosting

## 🎉 Selamat!

Project MI Kampus-C siap digunakan! Jika ada pertanyaan, lihat dokumentasi lengkap di file `README_SETUP.md` dan `INSTALASI_MANUAL.md`.

---

**Dibuat dengan ❤️ menggunakan Laravel 12 & Filament PHP 3**
