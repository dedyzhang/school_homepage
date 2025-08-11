<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\isAdminandSuper;
use App\Http\Middleware\isSuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/sekolah', function () {
    return view('home.sekolah');
})->name('home.sekolah');
Route::get('/sekolah/{tingkat}', [HomeController::class, 'profile'])->name('home.profile');
Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::get('/berita/{uuid}', [HomeController::class, 'showBerita'])->name('home.berita.show');
Route::get('/visimisi', function () {
    return view('home.visimisi.index');
})->name('home.visimisi');
Route::get('/fasilitas', function () {
    return view('home.fasilitas.index');
})->name('home.fasilitas');
Route::get('/keunggulan', function () {
    return view('home.keunggulan.index');
})->name('home.keunggulan');
Route::get('/pencapaian', function () {
    return view('home.pencapaian.index');
})->name('home.pencapaian');

//Admin Panel
Route::get('/user/signin', function () {
    return view('auth.login');
})->middleware('guest');
Route::post('/user/login', [LoginController::class, 'login'])->name('login');
Route::middleware('auth')->controller(LoginController::class)->group(function () {
    Route::get('/user/signout', 'logout')->name('signout');
    Route::get('/user/home', 'index')->name('home');
    Route::post('/user/ganti-password', 'gantiPassword')->name('user.gantiPassword');
    Route::post('/user/{uuid}/reset-password', 'resetPassword')->name('user.resetPassword');
});
Route::resource('user/user', \App\Http\Controllers\UserController::class)->middleware(isSuperAdmin::class);
Route::resource('user/sekolah', \App\Http\Controllers\SekolahController::class)->middleware(isSuperAdmin::class)->except('show');
Route::resource('user/berita', \App\Http\Controllers\BeritaController::class)->middleware(isAdminandSuper::class);
Route::resource('user/profile', \App\Http\Controllers\ProfileController::class)->middleware(isAdminandSuper::class);
