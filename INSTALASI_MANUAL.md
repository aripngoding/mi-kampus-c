# 📘 Panduan Instalasi Manual MI Kampus-C

Panduan lengkap instalasi project Website Profil & Sistem PPDB Online untuk Madrasah Ibtidaiyah Kampus-C.

## ⚠️ Masalah SSL Certificate di XAMPP

Jika Anda menggunakan XAMPP dan mengalami error:
```
curl error 60: SSL certificate problem: unable to get local issuer certificate
```

Ikuti langkah berikut:

### Solusi 1: Download & Konfigurasi cacert.pem (RECOMMENDED)

1. **Download cacert.pem**
   - Buka: https://curl.se/ca/cacert.pem
   - Save As: `C:\xampp\php\extras\ssl\cacert.pem`
   - Buat folder `extras\ssl` jika belum ada

2. **Edit php.ini**
   - Buka: `C:\xampp\php\php.ini`
   - Cari baris: `;curl.cainfo =`
   - Ubah menjadi: `curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"`
   - Cari baris: `;openssl.cafile=`
   - Ubah menjadi: `openssl.cafile="C:\xampp\php\extras\ssl\cacert.pem"`
   - Save file

3. **Restart Apache**
   - Buka XAMPP Control Panel
   - Stop Apache
   - Start Apache lagi

4. **Test**
   ```bash
   composer diagnose
   ```

### Solusi 2: Disable SSL (TIDAK DISARANKAN untuk production)

```bash
composer config -g disable-tls true
composer config -g secure-http false
```

## 🚀 Langkah Instalasi

### Step 1: Persiapan Database

1. Buka **phpMyAdmin** (http://localhost/phpmyadmin)
2. Klik tab **SQL**
3. Copy seluruh isi file `database/mi_kampus_c.sql`
4. Paste dan klik **Go**
5. Database `mi_kampus_c` akan terbuat beserta semua tabelnya

**Atau buat manual:**
```sql
CREATE DATABASE mi_kampus_c CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Step 2: Konfigurasi Environment

File `.env` sudah dikonfigurasi. Pastikan settingnya sesuai:

```env
APP_NAME="MI Kampus-C"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mi_kampus_c
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Generate Application Key

```bash
php artisan key:generate
```

### Step 4: Install Composer Dependencies

**Jika SSL sudah fix:**
```bash
composer install
```

**Jika masih error SSL:**
```bash
composer install --ignore-platform-reqs
```

### Step 5: Install Filament PHP

```bash
composer require filament/filament:"^3.2" -W
```

**Jika error, coba:**
```bash
composer require filament/filament:"^3.0" -W
```

### Step 6: Jalankan Migrations

```bash
php artisan migrate
```

**Jika sudah import SQL, skip step ini atau jalankan:**
```bash
php artisan migrate:status
```

### Step 7: Seed Database (Buat Admin)

```bash
php artisan db:seed
```

Ini akan membuat akun admin:
- **Email**: admin@mi-kampus-c.sch.id
- **Password**: password

### Step 8: Create Storage Link

```bash
php artisan storage:link
```

### Step 9: Install Node Dependencies

```bash
npm install
```

**Jika error, coba:**
```bash
npm install --legacy-peer-deps
```

### Step 10: Build Assets

**Development (dengan hot reload):**
```bash
npm run dev
```

**Production (untuk deploy):**
```bash
npm run build
```

### Step 11: Jalankan Server

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Vite (jika development):**
```bash
npm run dev
```

### Step 12: Akses Website

- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin
- **Login Admin**:
  - Email: admin@mi-kampus-c.sch.id
  - Password: password

## 📁 Struktur Folder Penting

```
mi-kampus-c/
├── app/
│   ├── Filament/              # Admin panel Filament
│   │   ├── Pages/
│   │   ├── Resources/
│   │   └── Widgets/
│   ├── Http/Controllers/      # Controllers
│   ├── Models/                # Models
│   └── Providers/
├── database/
│   ├── migrations/            # Database migrations
│   ├── seeders/               # Database seeders
│   └── mi_kampus_c.sql        # SQL dump
├── public/
│   └── storage/               # Symlink ke storage/app/public
├── resources/
│   ├── css/
│   │   └── app.css            # TailwindCSS
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php  # Layout utama
│       ├── ppdb/              # Halaman PPDB
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── visi-misi.blade.php
│       ├── gallery.blade.php
│       └── contact.blade.php
├── routes/
│   └── web.php                # Routes
├── storage/
│   └── app/
│       └── public/
│           └── gallery/       # Upload galeri
├── .env                       # Environment config
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

## 🎯 Testing

### Test Frontend
1. Buka http://localhost:8000
2. Navigasi ke semua menu (Beranda, Tentang Kami, Visi & Misi, Galeri, Kontak)
3. Test form PPDB Online

### Test Admin Panel
1. Login ke http://localhost:8000/admin
2. Cek Dashboard (statistik PPDB)
3. Test CRUD Data Pendaftar PPDB
4. Test CRUD Galeri Foto
5. Test upload gambar

## 🐛 Troubleshooting

### Error: "Class 'Filament\...' not found"

```bash
composer dump-autoload
php artisan optimize:clear
```

### Error: "SQLSTATE[HY000] [1049] Unknown database"

Pastikan database `mi_kampus_c` sudah dibuat di MySQL.

### Error: "No application encryption key"

```bash
php artisan key:generate
```

### Error: "The stream or file could not be opened"

```bash
# Windows
icacls storage /grant Everyone:(OI)(CI)F /T
icacls bootstrap/cache /grant Everyone:(OI)(CI)F /T

# Linux/Mac
chmod -R 775 storage bootstrap/cache
```

### Gambar tidak muncul setelah upload

```bash
php artisan storage:link
```

Pastikan folder `public/storage` adalah symlink ke `storage/app/public`.

### CSS/JS tidak load

```bash
npm run build
php artisan optimize:clear
```

### Error saat npm install

```bash
# Hapus node_modules dan package-lock.json
rm -rf node_modules package-lock.json

# Install ulang
npm install --legacy-peer-deps
```

## 📦 Package yang Digunakan

### Backend (Composer)
- laravel/framework: ^12.0
- filament/filament: ^3.2

### Frontend (NPM)
- tailwindcss: ^3.4
- vite: ^6.0
- autoprefixer: ^10.4
- postcss: ^8.4

## 🔐 Keamanan

### Ubah Password Admin

1. Login ke admin panel
2. Klik nama admin di pojok kanan atas
3. Pilih "Profile" atau "Edit Profile"
4. Ubah password

### Untuk Production

1. Set `APP_DEBUG=false` di `.env`
2. Set `APP_ENV=production` di `.env`
3. Gunakan password yang kuat
4. Aktifkan HTTPS
5. Backup database secara berkala

## 📞 Bantuan

Jika mengalami kesulitan:
1. Cek file `README_SETUP.md` untuk informasi tambahan
2. Cek log error di `storage/logs/laravel.log`
3. Gunakan `php artisan optimize:clear` untuk clear cache

## ✅ Checklist Instalasi

- [ ] Download & konfigurasi cacert.pem
- [ ] Restart Apache
- [ ] Buat database `mi_kampus_c`
- [ ] Import SQL atau jalankan migrations
- [ ] Generate app key
- [ ] Install composer dependencies
- [ ] Install Filament
- [ ] Seed database (buat admin)
- [ ] Create storage link
- [ ] Install npm dependencies
- [ ] Build assets
- [ ] Test akses frontend
- [ ] Test login admin panel
- [ ] Ubah password default admin

---

**Selamat! Project MI Kampus-C siap digunakan! 🎉**
