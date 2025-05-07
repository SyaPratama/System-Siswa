<?php

use App\Http\Controllers\Admin\Siswa;
use App\Http\Controllers\Auth\Authentication;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get('/register', [Authentication::class, 'register'])->name('view.register');
    Route::post('/register', [Authentication::class, 'regist_handler'])->name('view.store.register');
    Route::get('/login', [Authentication::class, 'login'])->name('view.login');
    Route::post('/login', [Authentication::class, 'login_handler'])->name('view.auth.login');
});


Route::middleware('auth','admin')->group(function(){
    Route::get('/dashboard', [Siswa::class,'index'])->name('siswa.dashboard');
});


Route::fallback(function(){
    return redirect('/login');
});
