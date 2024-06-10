<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
	Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
	Route::get('/register', [AuthController::class, 'register_index'])->name('register');
	Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::middleware('auth')->group(function () {
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
	Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
	Route::post('/berita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
	Route::delete('/berita/{id}', [BeritaController::class, 'delete'])->name('berita.delete');
	Route::post('/komentar', [KomentarController::class, 'store'])->name('komen.store');
	Route::get('/home', [DashboardController::class, 'index'])->name('home.index');
});
