@echo off
echo ============================================
echo  Setup MI Kampus-C - Website PPDB Online
echo ============================================
echo.

echo [1/7] Menginstall Filament PHP...
composer require filament/filament:"^3.2" -W --no-interaction
if %errorlevel% neq 0 (
    echo ERROR: Gagal install Filament. Cek koneksi internet dan SSL certificate.
    echo Lihat INSTALASI_MANUAL.md untuk panduan fix SSL.
    pause
    exit /b 1
)

echo.
echo [2/7] Mengaktifkan AdminPanelProvider...
php -r "
$file = 'bootstrap/providers.php';
$content = file_get_contents($file);
$content = str_replace(
    '// App\Providers\Filament\AdminPanelProvider::class, // Uncomment setelah install Filament',
    'App\Providers\Filament\AdminPanelProvider::class,',
    $content
);
file_put_contents($file, $content);
echo 'AdminPanelProvider diaktifkan.' . PHP_EOL;
"

echo.
echo [3/7] Menjalankan migrations...
php artisan migrate --force
if %errorlevel% neq 0 (
    echo ERROR: Gagal migrate. Pastikan database mi_kampus_c sudah dibuat.
    pause
    exit /b 1
)

echo.
echo [4/7] Menjalankan seeder...
php artisan db:seed --force

echo.
echo [5/7] Membuat storage link...
php artisan storage:link

echo.
echo [6/7] Clear cache...
php artisan optimize:clear

echo.
echo [7/7] Build assets...
npm run build

echo.
echo ============================================
echo  Setup Selesai!
echo ============================================
echo.
echo Akses website:
echo  - Frontend : http://localhost:8000
echo  - Admin    : http://localhost:8000/admin
echo.
echo Login Admin:
echo  - Email    : admin@mi-kampus-c.sch.id
echo  - Password : password
echo.
echo Jalankan server dengan: php artisan serve
echo.
pause
