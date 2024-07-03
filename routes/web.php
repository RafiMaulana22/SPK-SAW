<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianControllerr;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    // Bagian Login
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'action_login'])->name('login');

    // Bagian Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'action_register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    // Bagian Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Bagian Profile
    Route::get('/profile', [ProfileController::class, 'index']);

    //Bagian Kriteria
    Route::get('/kriteria', [KriteriaController::class, 'index']);
    Route::post('/kriteria', [KriteriaController::class, 'action_tambah']);

    Route::get('/kriteria/{id}/edit', [KriteriaController::class, 'edit']);
    Route::post('/kriteria/{id}/edit', [KriteriaController::class, 'action_edit']);

    Route::get('/kriteria/{id}/hapus', [KriteriaController::class, 'hapus']);

    // Bagian Crips
    Route::get('/kriteria/{id}/crips', [CripsController::class, 'index']);
    Route::post('/kriteria/{id}/crips', [CripsController::class, 'action_tambah']);

    Route::get('/kriteria/{id}/crips/edit', [CripsController::class, 'edit']);
    Route::post('/kriteria/{id}/crips/edit', [CripsController::class, 'action_edit']);

    Route::get('/kriteria/{id}/crips/hapus', [CripsController::class, 'hapus']);

    // Bagian Alternatif
    Route::get('/alternatif', [AlternatifController::class, 'index']);
    Route::post('/alternatif', [AlternatifController::class, 'action_tambah']);

    Route::get('/alternatif/{id}/edit', [AlternatifController::class, 'edit']);
    Route::post('/alternatif/{id}/edit', [AlternatifController::class, 'action_edit']);

    Route::get('/alternatif/{id}/hapus', [AlternatifController::class, 'hapus']);

    // Bagian Penilaian
    Route::get('/penilaian', [PenilaianControllerr::class, 'index']);
    Route::post('/penilaian', [PenilaianControllerr::class, 'action_tambah']);

    // Bagian Perhitungan
    Route::get('/perhitungan', [PerhitunganController::class, 'index']);

    // Bagian Logout
    Route::get('/logout', [AuthController::class, 'logout']);
});
