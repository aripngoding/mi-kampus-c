# MI Kampus-C - Website Profil & Sistem PPDB Online

Website resmi Madrasah Ibtidaiyah Kampus-C dengan sistem Penerimaan Peserta Didik Baru (PPDB) Online.

## 🚀 Tech Stack

- **Backend**: Laravel 12
- **Admin Panel**: Filament PHP 3.2
- **Database**: MySQL
- **Frontend**: TailwindCSS
- **Build Tool**: Vite

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB
- XAMPP/WAMP/Laragon (untuk development lokal)

## 🔧 Instalasi

### 1. Fix SSL Certificate Issue (Jika menggunakan XAMPP)

Jika Anda mengalami error SSL certificate saat install composer packages, lakukan langkah berikut:

**Download cacert.pem:**
```bash
# Download dari https://curl.se/ca/cacert.pem
# Simpan di C:\xampp\php\extras\ssl\cacert.pem
```

**Edit php.ini:**
```bash
# Buka C:\xampp\php\php.ini
# Cari baris: ;curl.cainfo =
# Ubah menjadi: curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"
# Cari baris: ;openssl.cafile=
# Ubah menjadi: openssl.cafile="C:\xampp\php\extras\ssl\cacert.pem"
```

**Restart Apache** dari XAMPP Control Panel.

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Konfigurasi Environment

```bash
# Copy file .env.example ke .env (sudah ada)
# Edit .env sesuaikan dengan database Anda

# Generate application key
php artisan key:generate
```

### 4. Setup Database

```bash
# Buat database MySQL
# Nama database: mi_kampus_c

# Jalankan migrations
php artisan migrate

# Jalankan seeder untuk membuat admin
php artisan db:seed
```

**Default Admin Credentials:**
- Email: `admin@mi-kampus-c.sch.id`
- Password: `password`

### 5. Install Filament

```bash
# Install Filament PHP
composer require filament/filament:"^3.2" -W

# Install Filament Panel
php artisan filament:install --panels
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Jalankan Server

```bash
# Jalankan Laravel development server
php artisan serve

# Akses website di: http://localhost:8000
# Akses admin panel di: http://localhost:8000/admin
```

## 📁 Struktur Project

```
mi-kampus-c/
├── app/
│   ├── Filament/
│   │   ├── Pages/
│   │   ├── Resources/
│   │   └── Widgets/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       ├── ppdb/
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── visi-misi.blade.php
│       ├── gallery.blade.php
│       └── contact.blade.php
├── routes/
│   └── web.php
└── public/
```

## 🎨 Fitur

### Frontend (Public)
- ✅ Beranda dengan hero banner
- ✅ Tentang Kami (Sejarah, Fasilitas, Tenaga Pendidik)
- ✅ Visi & Misi
- ✅ Galeri Foto Kegiatan
- ✅ Kontak & Lokasi (Google Maps)
- ✅ Form PPDB Online
- ✅ Halaman Sukses Pendaftaran

### Admin Panel (Filament)
- ✅ Dashboard dengan statistik PPDB
- ✅ Manajemen Data Pendaftar PPDB
  - View, Edit, Delete
  - Terima/Tolak Pendaftar
  - Filter & Search
  - Export ke Excel/PDF (perlu install package tambahan)
- ✅ Manajemen Galeri Foto
  - Upload foto
  - CRUD galeri
  - Toggle aktif/nonaktif

## 🔐 Akun Admin Default

Setelah menjalankan `php artisan db:seed`:

- **Email**: admin@mi-kampus-c.sch.id
- **Password**: password
- **Role**: superadmin

**⚠️ PENTING**: Ubah password default setelah login pertama kali!

## 📊 Database Schema

### Table: users
- id, name, email, password, role, timestamps

### Table: ppdb_registrations
- id, registration_number, student_name, nisn, birth_place, birth_date
- gender, religion, previous_school
- parent_name, parent_phone, address
- status (pending/verified/accepted/rejected)
- timestamps

### Table: galleries
- id, title, image_path, description, is_active, timestamps

## 🎨 Tema & Warna

- **Primary Color**: Green (#16a34a)
- **Secondary Color**: White (#ffffff)
- **Accent**: Yellow (#facc15)

## 📝 Catatan Penting

1. **Storage Link**: Pastikan sudah menjalankan `php artisan storage:link` agar upload gambar berfungsi
2. **Permissions**: Folder `storage/` dan `bootstrap/cache/` harus writable
3. **Environment**: Jangan lupa sesuaikan `.env` dengan konfigurasi server Anda
4. **Production**: Jalankan `npm run build` dan `php artisan config:cache` sebelum deploy

## 🐛 Troubleshooting

### Error: SSL certificate problem
- Ikuti langkah "Fix SSL Certificate Issue" di atas
- Atau gunakan: `composer config -g disable-tls true` (tidak disarankan untuk production)

### Error: Class 'Filament\...' not found
- Jalankan: `composer dump-autoload`
- Pastikan Filament sudah terinstall: `composer require filament/filament:"^3.2" -W`

### Error: SQLSTATE[HY000] [1049] Unknown database
- Buat database MySQL dengan nama `mi_kampus_c`
- Atau sesuaikan `DB_DATABASE` di file `.env`

### Error: No application encryption key
- Jalankan: `php artisan key:generate`

### Gambar tidak muncul
- Jalankan: `php artisan storage:link`
- Pastikan folder `storage/app/public` ada dan writable

## 📦 Package Tambahan (Opsional)

### Export Excel/PDF untuk PPDB
```bash
composer require pxlrbt/filament-excel
```

### Notifikasi Email
Konfigurasi SMTP di `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="MI Kampus-C"
```

## 🚀 Deployment ke Production

1. Upload semua file ke server
2. Install dependencies: `composer install --optimize-autoloader --no-dev`
3. Install node modules: `npm install && npm run build`
4. Setup `.env` untuk production
5. Generate key: `php artisan key:generate`
6. Migrate database: `php artisan migrate --force`
7. Seed admin: `php artisan db:seed`
8. Link storage: `php artisan storage:link`
9. Cache config: `php artisan config:cache`
10. Cache routes: `php artisan route:cache`
11. Cache views: `php artisan view:cache`

## 📞 Support

Jika ada pertanyaan atau masalah, silakan hubungi developer atau buat issue di repository.

## 📄 License

Project ini dibuat khusus untuk MI Kampus-C.

---

**Dibuat dengan ❤️ menggunakan Laravel & Filament PHP**
