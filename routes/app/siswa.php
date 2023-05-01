<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa\AuthController;
use App\Http\Controllers\Siswa\DashboardController;
use App\Http\Controllers\Siswa\ProfileController;

Route::group(['domain' => ''], function () {
    Route::get('/', function () {
        return view('page.welcome');
    });
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('auth', [AuthController::class, 'index'])->name('auth.index');
        Route::prefix('auth')->name('auth.')->group(function () {
            Route::post('login', [AuthController::class, 'do_login'])->name('login');
            Route::post('register', [AuthController::class, 'do_register'])->name('register');
            Route::post('forgot', [AuthController::class, 'do_forgot'])->name('forgot');
            Route::post('reset', [AuthController::class, 'do_reset'])->name('reset');
        });
        Route::middleware(['auth:siswa'])->group(function () {
            Route::get('verification', [AuthController::class, 'verification'])->name('auth.verification');
            Route::post('verify/{auth:email}', [AuthController::class, 'do_verify'])->name('auth.verify');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('auth.logout');
        });
        Route::group(['middleware' => ['auth:siswa', 'verified']], function () {
            Route::redirect('/', 'dashboard', 301);
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('profile', ProfileController::class);
        });
    });
});
