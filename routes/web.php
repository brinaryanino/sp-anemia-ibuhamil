<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| User Side - Konsultasi (Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/konsultasi', [KonsultasiController::class, 'index']);
Route::post('/konsultasi', [KonsultasiController::class, 'proses']);
Route::get('/hasil/{id}', [KonsultasiController::class, 'hasil']);
