<?php

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\LogoutController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\User\HomeController;
use Illuminate\Support\Facades\Route;

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

// Auth
Route::middleware('guest')->group(function () {

    // Register
    Route::controller(RegisterController::class)->prefix('register')->group(function () {
        Route::post('/', 'store')->name('register');
    });

    // Login
    Route::controller(LoginController::class)->prefix('login')->group(function () {
        Route::post('/', 'store')->name('login');
    });
});

Route::middleware('auth')->group(function () {

    // Logout
    Route::controller(LogoutController::class)->prefix('logout')->group(function () {
        Route::delete('/', 'destroy')->name('logout');
    });
});

// User
Route::name('user.')->group(function () {

    // Home
    Route::controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
