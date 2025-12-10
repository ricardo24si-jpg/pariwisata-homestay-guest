<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\KamarHomestayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::resource('destinasi', DestinasiWisataController::class);
Route::resource('homestay', HomestayController::class);
Route::resource('warga', WargaController::class);
Route::resource('kamar', KamarHomestayController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('pages.index');
})->name('dashboard');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/service', function () {
    return view('pages.service');
})->name('service');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::middleware('checkislogin')->group(function () {
    Route::resource('/users', UserController::class);
});
