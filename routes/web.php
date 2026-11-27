<?php

use App\Http\Controllers\AslabController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleSwitchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'form'])->name('login');
//ADMIN
// Route::get('/akun-admin', [AdminController::class, 'akun'])->name('akun-admin');


Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/akun', [AdminController::class, 'semuaAkun'])->name('akun');
    Route::post('/delete/{nim_nip}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');
    Route::get('/statuslab', [AdminController::class, 'statuslab'])->name('statuslab');
    Route::get('/notifikasi', [AdminController::class, 'notifikasi'])->name('notifikasi');
});

//ASLAB
Route::middleware(['auth', 'role:Asisten Lab'])->prefix('aslab')->name('aslab.')->group(function () {
    Route::get('/pengajuan', [AslabController::class, 'pengajuan'])->name('pengajuan');
    Route::get('/status-lab', [AslabController::class, 'statuslab'])->name('status-lab');
    Route::get('/jadwal-tetap', [AslabController::class, 'jadwaltetap'])->name('jadwal-tetap');
    Route::get('/riwayat-peminjaman', [AslabController::class, 'RiwayatPeminjaman'])->name('riwayat-peminjaman');
    Route::get('/akun', [AslabController::class, 'akun'])->name('akun');
    route::resource('lab', LabController::class);
    Route::patch('/labs/{lab}/toggle', [LabController::class, 'toggle'])->name('labs.toggle');
});


//MAHASISWA
Route::middleware(['auth', 'role:Mahasiswa'])->prefix("mahasiswa")->name('mahasiswa.')->group(function () {
    Route::get('/beranda', [MahasiswaController::class, 'beranda'])->name('beranda');
    Route::get('/riwayat', [MahasiswaController::class, 'riwayat'])->name('riwayat');
    Route::get('/status-lab', [MahasiswaController::class, 'statusLab'])->name('status-lab');
    Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/akun', [MahasiswaController::class, 'akun'])->name('akun');

    //bagian pengajuan peminjaman
    Route::get('/ajukan-peminjaman', [MahasiswaController::class, 'ajukan'])->name('ajukan');
    Route::post('/ajukan-peminjaman', [MahasiswaController::class, 'storeAjukan'])->name('ajukan.store');
});

//AUTH
// Register
Route::get('/register', [RegisterController::class, 'form']);
Route::post('/register', [RegisterController::class, 'registration']);

// Login
// Route::get('/login', [LoginController::class, 'form']);

// CRUD Lab

Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//lupa password
Route::get('/lupa-password', [LoginController::class, 'lupaForm']);
Route::post('/lupa-password', [LoginController::class, 'lupaSubmit']);

//Ganti role
Route::post('/switch-role', [RoleSwitchController::class, 'switch'])->middleware('auth')->name('role.switch');


// // Route tes pergantian role tanpa login
// Route::get('/test-login/{email?}', function ($email = 'ikhsan@gmail.com') {
//     // 1. Cari user berdasarkan email
//     $user = \App\Models\User::where('email', $email)->firstOrFail();

//     // 2. Login-kan user secara langsung
//     \Illuminate\Support\Facades\Auth::login($user);

//     // 3. Tentukan role aktif pertama
//     $roleAwal = $user->roles->first()?->nama_role ?? 'Mahasiswa';
//     session(['active_role' => $roleAwal]);

//     // 4. Langsung redirect ke dashboard role tersebut
//     return match ($roleAwal) {
//         'Admin'       => redirect()->route('admin.akun'),
//         'Asisten Lab' => redirect()->route('aslab.pengajuan'),
//         default       => redirect()->route('mahasiswa.beranda'),
//     };
// });
//masukkan http://sistem-peminjaman-lab.test/test-login di url browser
