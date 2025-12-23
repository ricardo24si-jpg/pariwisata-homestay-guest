<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\UlasanWisataController;
use App\Http\Controllers\KamarHomestayController;
use App\Http\Controllers\BookingHomestayController;
use App\Http\Controllers\DestinasiWisataController;

Route::resource('destinasi', DestinasiWisataController::class);
Route::resource('homestay', HomestayController::class);
Route::get('homestay/{homestay}/book', [HomestayController::class, 'checkAvailability'])->name('homestay.book');

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

// Route untuk register user (create user baru), tanpa middleware
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::resource('ulasan', UlasanWisataController::class);
Route::resource('booking', BookingHomestayController::class);

// Route lain user (edit, update, delete, index) di dalam middleware checkislogin
Route::middleware('checkislogin')->group(function () {
    Route::resource('/users', UserController::class)->except(['create', 'store']);
});
