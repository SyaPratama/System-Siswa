<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Guru;
use App\Http\Controllers\Admin\Siswa;
use App\Http\Controllers\Auth\Authentication;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get('/register', [Authentication::class, 'register'])->name('view.register');
    Route::post('/register', [Authentication::class, 'regist_handler'])->name('view.store.register');
    Route::get('/login', [Authentication::class, 'login'])->name('view.login');
    Route::post('/login', [Authentication::class, 'login_handler'])->name('view.auth.login');
});


Route::middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::prefix('siswa')->group(function () {
        Route::get('', [Siswa::class, 'showList'])->name('siswa.list');
        Route::get('/{id}', [Siswa::class, 'findSiswa'])->name('siswa.find');
        Route::post('', [Siswa::class, 'siswaAdd'])->name('siswa.add');
        Route::put('/{id}', [Siswa::class, 'siswaUpdate'])->name('siswa.update');
        Route::post('/{id}', [Siswa::class, 'siswaDelete'])->name('siswa.delete');
    });

    Route::prefix('guru')->group(function () {
        Route::get('', [Guru::class, 'showList'])->name('guru.list');
         Route::get('/{id}', [Guru::class, 'findGuru'])->name('guru.find');
        Route::post('', [Guru::class, 'guruAdd'])->name('guru.add');
        Route::put('/{id}', [Guru::class, 'guruUpdate'])->name('guru.update');
        Route::post('/{id}', [Guru::class, 'guruDelete'])->name('guru.delete');
    });
});


Route::fallback(function () {
    return redirect('/login');
});
