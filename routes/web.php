<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/', [UserController::class, 'index']);
Route::get('/daftar', [FormulirController::class, 'daftar'])->name('daftar');
Route::get('/codevip', [HomeController::class, 'codevip'])->name('codevip');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/form', [FormulirController::class, 'storeForm']);
Route::get('/formulir',[FormulirController::class,'index']);
Route::post('/logout', [LogoutController::class, 'logout']);

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback');
    
Route::controller(LoginController::class)->group(function () {
    Route::match(['GET', 'POST'],'/login', 'login')->name('login');
    Route::get('/logout', 'index')->name('logout');

});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/table',[HomeController::class,'tabler'])->name('table');
        Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
        Route::get('/element',[HomeController::class,'element'])->name('element');
        Route::get('/vip',[HomeController::class,'vip'])->name('vip');
        Route::get('/karyawan',[HomeController::class,'karyawan'])->name('karyawan');
        Route::get('/profile',[HomeController::class,'profile'])->name('profile');
        Route::get('/feedback',[HomeController::class,'feedback'])->name('feedback');
        
        Route::controller(VisitorController::class)->group(function () {
            Route::get('/cetak-tamu', 'cetakTamu')->name('cetak-tamu'); 
            Route::get('/excel', 'xlsx')->name('xlsx'); 
        
        });
    });
    
});






