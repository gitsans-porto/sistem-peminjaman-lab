<?php

use App\Http\Controllers\AslabController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//ADMIN


//ASLAB
Route::get('/pengajuan', [AslabController::class, 'pengajuan'])->name('pengajuan');
Route::get('/status-lab-aslab', [AslabController::class, 'statuslab'])->name('status-lab-aslab');
Route::get('/jadwal-tetap',[AslabController::class,'jadwaltetap'])->name('jadwal-tetap');
Route::get('/riwayat-peminjaman', [AslabController::class, 'RiwayatPeminjaman'])->name('riwayat-peminjaman');
Route::get('/akun-aslab', [AslabController::class, 'akun'])->name('akun-aslab');
Route::get('/lab', [AslabController::class, 'lab'])->name('lab');


//MAHASISWA
Route::get('/beranda', [MahasiswaController::class, 'beranda'])->name('beranda');
Route::get('/riwayat', [MahasiswaController::class, 'riwayat'])->name('riwayat');
Route::get('/status-lab', [MahasiswaController::class, 'statusLab'])->name('status-lab');
Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
Route::get('/akun', [MahasiswaController::class, 'akun'])->name('akun');

//AUTH
// Register
Route::get('/register',[RegisterController::class, 'form']);
Route::post('/register',[RegisterController::class, 'registration']);

// Login
Route::get('/login',[LoginController::class, 'form']);