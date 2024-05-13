<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/datagender/{year}', [HomeController::class, 'datagender']);
    Route::get('/datakendaraan/{year}', [HomeController::class, 'datakendaraan']);
    Route::get('/datapool/{year}', [HomeController::class, 'datapool']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/updateProfileImage', [ProfileController::class, 'updateProfileImage'])->name('updateProfileImage');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UserController::class)->group(function () {
        Route::resource('users', App\Http\Controllers\UserController::class)->names('users');
        Route::get('/export-user', [UserController::class, 'export'])->name('export-user');
        // Route::get('/search-user', App\Http\Controllers\UserController::class)->name('search-user');
    });

    Route::controller(KendaraanController::class)->group(function () {
        Route::resource('kendaraans', App\Http\Controllers\KendaraanController::class)->names('kendaraans');
        Route::get('/export-kendaraan', [KendaraanController::class, 'export'])->name('export-kendaraan');
        Route::get('/view-riwayat/{id}', [KendaraanController::class, 'riwayat'])->name('view-riwayat');
        Route::patch('/setuju/{id}', [KendaraanController::class, 'setuju'])->name('setuju');
        // Route::get('/search-kendaraan', App\Http\Controllers\KendaraanController::class)->name('search-kendaraan');
    });

    Route::controller(PoolController::class)->group(function () {
        Route::resource('pools', App\Http\Controllers\PoolController::class)->names('pools');
        Route::get('/export-pool', [PoolController::class, 'export'])->name('export-pool');
        // Route::get('/search-pool', App\Http\Controllers\PoolController::class)->name('search-pool');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/index-laporan', [laporanController::class, 'index'])->name('index-laporan');
        Route::get('/export-laporan', [laporanController::class, 'export'])->name('export-laporan');
    });
});

require __DIR__ . '/auth.php';