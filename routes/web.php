<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi-misi');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

Route::prefix('ppdb')->name('ppdb.')->group(function () {
    Route::get('/', [PpdbController::class, 'index'])->name('index');
    Route::post('/daftar', [PpdbController::class, 'store'])->name('store');
    Route::get('/sukses/{registrationNumber}', [PpdbController::class, 'success'])->name('success');
    Route::get('/ditolak/{registrationNumber}', [PpdbController::class, 'rejected'])->name('rejected');
    Route::get('/cek-status', [PpdbController::class, 'checkStatus'])->name('check-status');
    Route::post('/cek-status', [PpdbController::class, 'statusResult'])->name('status-result');
});
