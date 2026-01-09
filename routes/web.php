<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konsultasi', [KonsultasiController::class, 'index'])
    ->name('konsultasi.index');

Route::post('/konsultasi', [KonsultasiController::class, 'store'])
    ->name('konsultasi.store');

Route::get('/hasil/{id}', [KonsultasiController::class, 'hasil'])
    ->name('konsultasi.hasil');
