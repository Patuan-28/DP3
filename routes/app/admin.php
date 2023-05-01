<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssignPenilaiController;
use App\Http\Controllers\Admin\AssignPenilaiDetailController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaPenilaianController;
use App\Http\Controllers\Admin\ProfileController;

Route::group(['domain' => ''], function () {
    Route::redirect('admin', 'admin/dashboard', 301);
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::get('auth', [AuthController::class, 'index'])->name('auth.index');
        Route::prefix('auth')->name('auth.')->group(function () {
            Route::post('login', [AuthController::class, 'do_login'])->name('login');
            Route::post('register', [AuthController::class, 'do_register'])->name('register');
            Route::post('forgot', [AuthController::class, 'do_forgot'])->name('forgot');
            Route::post('reset', [AuthController::class, 'do_reset'])->name('reset');
        });

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('verification', [AuthController::class, 'verification'])->name('auth.verification');
            Route::post('verify/{auth:email}', [AuthController::class, 'do_verify'])->name('auth.verify');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('auth.logout');
        });

        Route::group(['middleware' => ['auth:admin', 'verified']], function () {
            Route::redirect('/', 'dashboard', 301);
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('admin', AdminController::class);
            Route::resource('staff', StaffController::class);
            Route::resource('siswa', SiswaController::class);
            Route::resource('profile', ProfileController::class);
            Route::resource('kelolaPenilaian', KelolaPenilaianController::class);
            Route::resource('assignPenilai', AssignPenilaiController::class);
            Route::get('assignPenilai/{assignPenilai}', [AssignPenilaiDetailController::class, 'index'])->name('assignPenilaiDetail.index');
            Route::post('assignPenilaidetail/{assignPenilai}', [AssignPenilaiDetailController::class, 'store'])->name('assignPenilaiDetail.store');
        });
    });
});
