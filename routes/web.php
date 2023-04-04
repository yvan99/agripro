<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\FarmerAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Admin login route
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    // Admin register route
    Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'register'])->name('admin.register.submit');

    // Admin logout route
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('farmer')->group(function () {
    // Farmer login route
    Route::get('/login', [FarmerAuthController::class, 'showLoginForm'])->name('farmer.login');
    Route::post('/login', [FarmerAuthController::class, 'login'])->name('farmer.login.submit');

    // Farmer register route
    Route::get('/register', [FarmerAuthController::class, 'showRegistrationForm'])->name('farmer.register');
    Route::post('/register', [FarmerAuthController::class, 'register'])->name('farmer.register.submit');

    // Farmer logout route
    Route::post('/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');
});


