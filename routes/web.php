<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman welcome
Route::get('/', [AuthController::class, 'index'])->name('welcome');

// Login dan Register
Route::get('login', [AuthController::class, 'index'])->name('auth.login');
Route::post('login', [AuthController::class, 'proses_login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'proses_register'])->name('register');

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Halaman yang memerlukan login
Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix("/pemesanan")
        ->controller(ReservationController::class)
        ->name("pemesanan.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
            Route::post('/save', 'save')->name("save");
            Route::get('/detail-penghuni/{id}', 'detailPenghuni')->name("detailPenghuni");
        });
    
    Route::get('/data-kamar', function () {
        return view('data-kamar');
    })->name("dataKamar");
    
    Route::get('/data-penghuni', function () {
        return view('data-penghuni');
    })->name("dataPenghuni");
    
    Route::get('penghuni/{id}', [PenghuniController::class, 'show'])->name('penghuni.show');
    Route::get('penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::put('penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
    Route::delete('penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');
    Route::get('/data-penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni');
    Route::get('penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
    Route::put('penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
    Route::get('/penghuni/{id}', [PenghuniController::class, 'show'])->name('penghuni.show');
    Route::post('storePenghuni', [PenghuniController::class, 'store'])->name('storePenghuni');
    Route::get('/detail-datapenghuni', [PenghuniController::class, 'indexDetail'])->name('detaildatapenghuni');
    Route::get('/exportpenghuni', [PenghuniController::class, 'PenghuniExport'])->name('exportpenghuni');
    Route::post('/importpenghuni', [PenghuniController::class, 'Penghuniimportexcel'])->name('importpenghuni');
    Route::get('/penghuniedit/{id}', [PenghuniController::class, 'edit'])->name('penghuniedit');
    Route::post('/penghuni/store', [PenghuniController::class, 'store'])->name('penghuni.store');
    
    // routes/web.php
    Route::get('/data-kamar', [KamarController::class, 'index'])->name('dataKamar');
    Route::resource('kamars', KamarController::class);
    
    Route::get('/riwayat', [ReservationController::class, 'showHistory'])->name('riwayat');


    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/kelola-akun', [UserController::class, 'index'])->name('kelolaAkun');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Route::get('/kelola-akun', function () {
    //     return view('kelola-akun');
    // })->name("kelolaAkun");
    // Route::get('/kelola-akun', [UserController::class, 'index'])->name("kelolaAkun");
    // Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});








// Route::get('/', [DashboardController::class, 'index'])->name("dashboard");

// Route::get("/dashboard", [DashboardController::class, 'index'])->name('reservation.reservation-dashboard');

// Route::prefix("/pemesanan")
//     ->controller(ReservationController::class)
//     ->name("pemesanan.")
//     ->group(function () {
//         Route::get('/', 'index')->name("index");
//         Route::post('/save', 'save')->name("save");
//         Route::get('/detail-penghuni/{id}', 'detailPenghuni')->name("detailPenghuni");
//     });

// Route::get('/data-kamar', function () {
//     return view('data-kamar');
// })->name("dataKamar");

// Route::get('/data-penghuni', function () {
//     return view('data-penghuni');
// })->name("dataPenghuni");

// Route::get('penghuni/{id}', [PenghuniController::class, 'show'])->name('penghuni.show');
// Route::get('penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
// Route::put('penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
// Route::delete('penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');
// Route::get('/data-penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni');
// Route::get('penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
// Route::put('penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
// Route::get('/penghuni/{id}', [PenghuniController::class, 'show'])->name('penghuni.show');
// Route::post('storePenghuni', [PenghuniController::class, 'store'])->name('storePenghuni');
// Route::get('/detail-datapenghuni', [PenghuniController::class, 'indexDetail'])->name('detaildatapenghuni');
// Route::get('/exportpenghuni', [PenghuniController::class, 'PenghuniExport'])->name('exportpenghuni');
// Route::post('/importpenghuni', [PenghuniController::class, 'Penghuniimportexcel'])->name('importpenghuni');
// Route::get('/penghuniedit/{id}', [PenghuniController::class, 'edit'])->name('penghuniedit');
// Route::post('/penghuni/store', [PenghuniController::class, 'store'])->name('penghuni.store');

// // routes/web.php
// Route::get('/data-kamar', [KamarController::class, 'index'])->name('dataKamar');
// Route::resource('kamars', KamarController::class);


// Route::get('/riwayat', function () {
//     return view('riwayat');
// })->name("riwayat");
// Route::get('/riwayat-pemesanan', [ReservationController::class, 'history'])->name('riwayat.pemesanan');

// Route::get('/kelola-akun', function () {
//     return view('kelola-akun');
// })->name("kelolaAkun");

// Route::get('/kelola-akun', [UserController::class, 'index'])->name("kelolaAkun");

// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');