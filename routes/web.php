<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;

// ROUTE PUBLIK (tidak perlu login)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// ROUTE PROTECTED (wajib login)
Route::middleware('auth.check')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Buku
    Route::resource('buku', BukuController::class)->except(['show']);

    // CRUD Member
    Route::resource('member', MemberController::class)->except(['show']);

    // CRUD Peminjaman
    Route::resource('peminjaman', PeminjamanController::class)->except(['show']);

});