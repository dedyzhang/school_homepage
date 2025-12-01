<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpmbController;
use App\Http\Middleware\isAdminandSuper;
use App\Http\Middleware\isSiswa;
use App\Http\Middleware\isSuperAdmin;
use App\Models\spmb;
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

Route::get('/spmb',[HomeController::class,'spmbIndex'])->name('home.spmb.index');
Route::get('/spmb/{sekolah}',[HomeController::class,'spmbSekolah'])->name('home.spmb.sekolah');
Route::get('/spmb/{sekolah}/daftar',[HomeController::class,'spmbDaftar'])->name('home.spmb.daftar');
Route::post('/spmb/{sekolah}/daftar',[HomeController::class,'spmbStore'])->name('home.spmb.store');
Route::get('/spmb/{sekolah}/status',[HomeController::class,'spmbStatus'])->name('home.spmb.status');

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
Route::middleware(isAdminandSuper::class)->controller(SpmbController::class)->group(function() {
    Route::get('/user/spmb','index')->name('spmb.index');
    Route::get('/user/spmb/{sekolah}/show','show')->name('spmb.show');
    Route::get('/user/spmb/{sekolah}/settings','settings')->name('spmb.settings');
    Route::post('/user/spmb/{sekolah}/settings/store','formulirStore')->name('spmb.settings.formulir.store');
    Route::post('/user/spmb/{sekolah}/settings/mode/store','modeStore')->name('spmb.settings.mode.store');
    Route::post('/user/spmb/{sekolah}/settings/berkas/store','berkasStore')->name('spmb.settings.berkas.store');
    Route::delete('/user/spmb/{sekolah}/settings/berkas/delete','berkasDelete')->name('spmb.settings.berkas.delete');
    Route::post('/user/spmb/{sekolah}/settings/status/store','statusStore')->name('spmb.settings.status.store');
    Route::get('/user/spmb/{uuid}/detail','detailSiswa')->name('spmb.siswa.detail');
    Route::get('/user/spmb/{uuid}/upload','uploadSiswa')->name('spmb.siswa.get.upload');
    Route::post('/user/spmb/{uuid}/upload/store','AdminUploadDokumenStore')->name('spmb.admin.upload.store');
    Route::post('/user/spmb/{uuid}/upload/delete','AdminDeleteDokumen')->name('spmb.admin.upload.delete');
    Route::get('/user/spmb/{uuid}/daftar','spmbDaftar')->name('spmb.daftar');
    Route::post('/user/spmb/{uuid}/store','spmbStore')->name('spmb.store');
    Route::get('/user/spmb/{uuid}/edit','spmbEdit')->name('spmb.edit');
    Route::post('/user/spmb/{uuid}/edit','spmbUpdate')->name('spmb.update');
    Route::post('/user/spmb/{uuid}/delete','spmbDelete')->name('spmb.delete');
    Route::get('/user/spmb/{uuid}/informasi','spmbInformasi')->name('spmb.informasi');
    Route::post('/user/spmb/{uuid}/informasi/store','spmbInformasiStore')->name('spmb.informasi.store');
});
Route::resource('user/user', \App\Http\Controllers\UserController::class)->middleware(isSuperAdmin::class);
Route::resource('user/sekolah', \App\Http\Controllers\SekolahController::class)->middleware(isSuperAdmin::class)->except('show');
Route::resource('user/berita', \App\Http\Controllers\BeritaController::class)->middleware(isAdminandSuper::class);
Route::resource('user/profile', \App\Http\Controllers\ProfileController::class)->middleware(isAdminandSuper::class);

//Siswa SPMB
Route::middleware(isSiswa::class)->controller(SpmbController::class)->group(function() {
    Route::get('/user/spmb/upload','uploadDokumen')->name('spmb.siswa.upload');
    Route::post('/user/spmb/upload','uploadDokumenStore')->name('spmb.siswa.upload.store');
    Route::post('/user/spmb/delete','deleteDokumen')->name('spmb.siswa.delete.berkas');
    Route::get('/user/spmb/identitas','identitas')->name('spmb.siswa');
});