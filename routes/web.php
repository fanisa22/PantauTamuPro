<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\VisitorController;

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
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware('auth.admin');

Route::get('/element',[HomeController::class,'element'])->name('element')->middleware('auth.admin');
Route::get('/vip',[HomeController::class,'vip'])->name('vip')->middleware('auth.admin');
Route::get('/karyawan',[HomeController::class,'karyawan'])->name('element')->middleware('auth.admin');
Route::get('/profile',[HomeController::class,'profile'])->name('profile')->middleware('auth.admin');
Route::get('/feedback',[HomeController::class,'feedback'])->name('feedback')->middleware('auth.admin');
Route::get('/', [UserController::class, 'index']);
Route::get('/daftar', [FormulirController::class, 'daftar'])->name('daftar');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/form', [FormulirController::class, 'storeForm']);
Route::get('/formulir',[FormulirController::class,'index']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/table',[HomeController::class,'tabler'])->name('table')->middleware('auth.admin');

Route::get('/cetak-tamu', [VisitorController::class, 'cetakTamu'])->name('cetak-tamu');
