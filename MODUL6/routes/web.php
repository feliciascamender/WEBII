<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PraktikumController;

Route::get('/', [PraktikumController::class, 'beranda'])->name('beranda');

Route::get('/profil', [PraktikumController::class, 'profil'])->name('profil');

Route::get('/pengalaman/{slug}', [PraktikumController::class, 'detailPengalaman'])
    ->name('pengalaman.detail');

Route::get('/cek-koneksi', function () {
    try {
        DB::connection()->getPdo();

        return 'Koneksi database berhasil. Database aktif: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return 'Koneksi database gagal: ' . $e->getMessage();
    }
});