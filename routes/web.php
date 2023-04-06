<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmerAuthController;
use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Admin login route
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Admin logout route
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::prefix('farmer')->group(function () {
    // Farmer login route
    Route::get('/login', [FarmerAuthController::class, 'showLoginForm'])->name('farmer.login');
    Route::post('/login', [FarmerAuthController::class, 'login'])->name('farmer.login.submit');

    // Farmer register route
    Route::get('/register', [FarmerAuthController::class, 'showRegistrationForm'])->name('farmer.register');
    Route::post('/register', [FarmerAuthController::class, 'register'])->name('farmer.register.submit');

    // Farmer logout route
    Route::get('/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');
});

// FARMER PROTECTED ROUTES
Route::prefix('farmer')->middleware(['auth:farmer'])->group(function () {
    Route::view('/dashboard', 'farmer.dashboard');
    Route::get('/crops', [CropController::class, 'index'])->name('crops.index');
    Route::post('/crops', [CropController::class, 'store'])->name('crops.store');
});

// ADMIN PROTECTED ROUTES
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard');

    // SEASONS
    Route::post('/seasons', [SeasonController::class, 'store']);
    Route::get('/seasons', [SeasonController::class, 'index']);
});

