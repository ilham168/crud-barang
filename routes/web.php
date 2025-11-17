<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;

//LOGIN & REGISTER
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// LOGIN
Route::middleware(['auth'])->group(function () {

    // ADMIN DASHBOARD
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('jenis-barang', JenisBarangController::class);
        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::post('/pengaturan/update', [PengaturanController::class, 'update'])->name('pengaturan.update');
        Route::resource('barang', BarangController::class)->only(['edit', 'destroy']);
    });

    // USER DASHBOARD
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Barang & Transaksi 
    Route::resource('barang', BarangController::class)->except(['edit', 'destroy']);
    Route::resource('transaksi', TransaksiController::class);

    //redirect
    Route::get('/', function () {
        return redirect()->route('user.dashboard');
    });
});
