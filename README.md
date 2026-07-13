# 🕌 MI Kampus-C - Website Profil & Sistem PPDB Online

Website resmi **Madrasah Ibtidaiyah Kampus-C** dengan sistem Penerimaan Peserta Didik Baru (PPDB) Online yang modern dan user-friendly.

![Laravel](https://img.shields.io/badge/Laravel-12.40-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-3.2-FDAE4B?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTI0IDQ4QzM3LjI1NDggNDggNDggMzcuMjU0OCA0OCAyNEM0OCAxMC43NDUyIDM3LjI1NDggMCAyNCAwQzEwLjc0NTIgMCAwIDEwLjc0NTIgMCAyNEMwIDM3LjI1NDggMTAuNzQ1MiA0OCAyNCA0OFoiIGZpbGw9IiNGREFFNEIiLz4KPC9zdmc+Cg==)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## 📋 Deskripsi

Project ini adalah website profil sekolah dan sistem PPDB online untuk MI Kampus-C yang dibangun dengan Laravel 12 dan Filament PHP 3.2. Website ini menampilkan informasi lengkap tentang sekolah dan memudahkan calon wali murid untuk mendaftarkan anak mereka secara online.

## ✨ Fitur Utama

### 🌐 Frontend (Public)
- **Beranda** - Hero banner, statistik, sambutan kepala sekolah, keunggulan
- **Tentang Kami** - Sejarah, fasilitas lengkap, tenaga pendidik
- **Visi & Misi** - Visi, misi, dan tujuan madrasah
- **Galeri** - Foto kegiatan sekolah dengan lightbox
- **Kontak** - Informasi kontak, Google Maps, social media
- **PPDB Online** - Form pendaftaran siswa baru
- **Halaman Sukses** - Konfirmasi pendaftaran dengan nomor registrasi

### 🔐 Admin Panel (Filament)
- **Dashboard** - Statistik PPDB (Total, Pending, Verified, Accepted, Rejected)
- **Manajemen PPDB** - CRUD data pendaftar, terima/tolak, filter, search, bulk actions
- **Manajemen Galeri** - Upload foto, CRUD, toggle aktif/nonaktif, auto resize

## 🎨 Design

- **Tema**: Hijau & Putih
- **Framework CSS**: TailwindCSS
- **Responsive**: Mobile-first design
- **Icons**: Emoji (universal compatibility)

## 🛠️ Tech Stack

- **Backend**: Laravel 12.40.2
- **Admin Panel**: Filament PHP 3.2
- **Database**: MySQL 8.0
- **Frontend**: TailwindCSS 3.4, Vite 6.0
- **PHP**: 8.2+
- **Node.js**: 18+

## 📦 Instalasi

### Quick Start

```bash
# 1. Clone atau extract project
cd mi-kampus-c

# 2. Install dependencies
composer install
npm install

# 3. Setup database
# Buat database: mi_kampus_c
php artisan migrate
php artisan db:seed

# 4. Install Filament
composer require filament/filament:"^3.2" -W

# 5. Build assets
npm run build

# 6. Jalankan server
php artisan serve
```

### Dokumentasi Lengkap

- 📘 **[QUICK_START.md](QUICK_START.md)** - Panduan cepat
- 📗 **[INSTALASI_MANUAL.md](INSTALASI_MANUAL.md)** - Instalasi step-by-step
- 📙 **[README_SETUP.md](README_SETUP.md)** - Setup lengkap
- 📕 **[PROJECT_SUMMARY.md](PROJECT_SUMMARY.md)** - Ringkasan project

## 🔐 Default Admin

Setelah menjalankan `php artisan db:seed`:

- **URL**: http://localhost:8000/admin
- **Email**: admin@mi-kampus-c.sch.id
- **Password**: password

⚠️ **PENTING**: Ubah password setelah login pertama kali!

## 📁 Struktur Project

```
mi-kampus-c/
├── app/
│   ├── Filament/              # Admin panel
│   ├── Http/Controllers/      # Controllers
│   ├── Models/                # Models
│   └── Providers/             # Service providers
├── database/
│   ├── migrations/            # Database migrations
│   ├── seeders/               # Database seeders
│   └── mi_kampus_c.sql        # SQL dump
├── resources/
│   ├── css/                   # Styles
│   ├── js/                    # JavaScript
│   └── views/                 # Blade templates
├── routes/
│   └── web.php                # Routes
├── public/
│   └── storage/               # Public storage (symlink)
└── storage/
    └── app/public/            # File uploads
```

## 🚀 Deployment

### Production Checklist

```bash
# 1. Set environment
APP_ENV=production
APP_DEBUG=false

# 2. Optimize
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Set permissions
chmod -R 755 storage bootstrap/cache

# 4. Create storage link
php artisan storage:link
```

## 📊 Database Schema

### Tables
- **users** - Admin accounts
- **ppdb_registrations** - Data pendaftar PPDB
- **galleries** - Foto galeri kegiatan

### Sample Data
File `database/mi_kampus_c.sql` berisi:
- 1 admin account
- 3 sample PPDB registrations
- 3 sample gallery images

## 🐛 Troubleshooting

### SSL Certificate Error (XAMPP)
```bash
# Download cacert.pem dari https://curl.se/ca/cacert.pem
# Simpan ke C:\xampp\php\extras\ssl\cacert.pem
# Edit php.ini:
curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"
openssl.cafile="C:\xampp\php\extras\ssl\cacert.pem"
# Restart Apache
```

### Class 'Filament\...' not found
```bash
composer require filament/filament:"^3.2" -W
composer dump-autoload
```

### Storage link not working
```bash
php artisan storage:link
```

### Clear cache
```bash
php artisan optimize:clear
```

## 📝 Fitur Tambahan (Opsional)

- Email notification untuk pendaftar
- Export Excel/PDF data PPDB
- WhatsApp integration
- Payment gateway
- Multi-language support
- Blog/Berita
- Kalender akademik

## 🤝 Contributing

Project ini dibuat khusus untuk MI Kampus-C. Untuk modifikasi atau pengembangan lebih lanjut, silakan hubungi developer.

## 📄 License

Project ini dibuat khusus untuk MI Kampus-C. All rights reserved.

## 📞 Support

Untuk bantuan atau pertanyaan:
- Baca dokumentasi di folder project
- Cek file `INSTALASI_MANUAL.md` untuk troubleshooting
- Lihat log error di `storage/logs/laravel.log`

## 🎯 Status

✅ **90% Complete** - Siap digunakan setelah install Filament PHP

## 📸 Screenshots

### Frontend
- Beranda dengan hero banner hijau
- Form PPDB online yang user-friendly
- Galeri foto dengan lightbox
- Halaman kontak dengan Google Maps

### Admin Panel
- Dashboard dengan statistik PPDB
- Tabel data pendaftar dengan filter
- Manajemen galeri dengan upload

## 🙏 Credits

- **Framework**: [Laravel](https://laravel.com)
- **Admin Panel**: [Filament PHP](https://filamentphp.com)
- **CSS Framework**: [TailwindCSS](https://tailwindcss.com)
- **Build Tool**: [Vite](https://vitejs.dev)

---

**Dibuat dengan ❤️ untuk MI Kampus-C**

**Version**: 1.0.0  
**Last Updated**: May 6, 2026  
**Laravel**: 12.40.2  
**PHP**: 8.2.12
