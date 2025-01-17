<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\BahanPustakaController;
use App\Http\Controllers\ReservasiController;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');


//========== ROUTE UNIVERSAL, TIDAK BUTUH ROLE ===========
Route::middleware(['auth:sanctum'])->group(function () {
    //===== Logout =====
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

    //===== Get User =====
    Route::get('/getUser', [AuthController::class, 'getUser']);

    //===== Get Ruangan =====
    Route::get('/ruangan', [RuanganController::class, 'index']);
    Route::get('/ruangan/{id}', [RuanganController::class, 'show']);

    //===== Get Bahan Pustaka =====
    Route::get('/bahan-pustaka', [BahanPustakaController::class, 'index']);
    Route::get('/bahan-pustaka/{id}', [BahanPustakaController::class, 'show']);

    //===== Get Kategori =====
    Route::get('/kategori', [KategoriController::class, 'index']);

    //===== Get Peminjaman =====
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'showRiwayatPeminjamanUser']);
    Route::post('/peminjaman', [PeminjamanController::class, 'pinjamBuku']);
    Route::post('/review-peminjaman/{id}', [PeminjamanController::class, 'reviewPeminjaman']);
    

    //===== Get Donasi =====
    Route::get('/donasi', [DonasiController::class, 'index']);

    //===== Get reservasi =====
    Route::get('/reservasi', [ReservasiController::class, 'index']);
    Route::get('riwayat-reservasi/{id}', [ReservasiController::class, 'showRiwayatReservasiUser']);
});

//========== ROUTE ADMIN ==========
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    //Rute auth
    Route::get('/getAllUsers', [AuthController::class, 'getAllUsers']); 
    Route::get('/getAllAdmin', [AuthController::class, 'getAllAdmin']); 
    Route::delete('/deleteUser/{id}', [AuthController::class, 'deleteUser']);

    //rute ruangan
    Route::post('/ruangan', [RuanganController::class, 'store']);
    Route::put('/ruangan/{id}', [RuanganController::class, 'update']);
    Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy']);

    //rute bahan pustaka
    Route::post('/bahan-pustaka', [BahanPustakaController::class, 'store']);
    Route::put('/bahan-pustaka/{id}', [BahanPustakaController::class, 'update']);
    Route::delete('/bahan-pustaka/{id}', [BahanPustakaController::class, 'destroy']);

    //rute get rekomendasi
    Route::get('/rekomendasi', [RekomendasiController::class, 'index']);
    Route::get('/rekomendasi/{id}', [RekomendasiController::class, 'show']);
    Route::delete('/rekomendasi/{id}', [RekomendasiController::class, 'destroy']);
    
    //get donasi
    
    Route::get('/donasi/{id}', [DonasiController::class, 'show']);

    //rute donasi
    Route::put('/donasi/{id}', [DonasiController::class, 'updateStatus']);
    Route::post('/store-donasi', [BahanPustakaController::class, 'storeDonasi']);
    
    //peminjaman
    Route::put('/update-status/{id}', [PeminjamanController::class, 'updateStatus']);

});




//========== ROUTE PENGGUNA ==========
Route::middleware(['auth:sanctum', 'role:pengguna'])->group(function () {
    Route::post('/rekomendasi', [RekomendasiController::class, 'store']);
    Route::post('/donasi', [DonasiController::class, 'store']);
    Route::post('/tambah-reservasi', [ReservasiController::class, 'tambahReservasi']);
});



