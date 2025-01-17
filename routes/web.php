<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.landing-page');
});

// ======== ROUTE HOME =========

Route::get('landing-page', function () {
    return view('home.landing-page');
});

Route::get('login-page', function () {
    return view('home.login-page');
});

Route::get('register-page', function () {
    return view('home.register-page');
});



// ======== ROUTE ADMIN =========

Route::get('admin-page', function () {
    return view('admin.layout.dasboard-layout');
});

Route::get('request-buku', function () {
    return view('admin.content.request-buku');
});

Route::get('home-admin', function () {
    return view('admin.content.home-admin');
});

Route::get('pengajuan-peminjaman', function () {
    return view('admin.content.pengajuan-peminjaman');
});

Route::get('pengembalian-buku', function () {
    return view('admin.content.pengembalian-buku');
});

Route::get('tambah-buku', function () {
    return view('admin.content.tambah-buku');
});

Route::get('ajuan-donasi', function () {
    return view('admin.content.ajuan-donasi');
});

Route::get('daftar-ruangan', function () {
    return view('admin.content.daftar-ruangan');
});

Route::get('manajemen-pengguna', function () {
    return view('admin.content.manajemen-pengguna');
});

Route::get('profil-admin', function () {
    return view('admin.content.profil-admin');
});


// ======== ROUTE USER =========

Route::get('dashboard-user', function () {
    return view('user.layout.dashboard-user');
});

Route::get('beranda-user', function () {
    return view('user.content.beranda-user');
});

Route::get('reservasi-ruangan', function () {
    return view('user.content.reservasi-ruangan');
});

Route::get('pengusulan-buku', function () {
    return view('user.content.pengusulan-buku');
});

Route::get('peminjaman-buku', function () {
    return view('user.content.peminjaman-buku');
});

Route::get('riwayat-peminjaman', function () {
    return view('user.content.riwayat-peminjaman');
});

Route::get('donasi-buku', function () {
    return view('user.content.donasi-buku');
});

Route::get('profil-user', function () {
    return view('user.content.profil-user');
});