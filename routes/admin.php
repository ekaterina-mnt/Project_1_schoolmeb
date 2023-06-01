<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\IndexController;

Route::middleware("guest:admin")->group(function () {
    Route::get('login', [AuthController::class, 'showAdminLoginForm'])->name('login');
    Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
    });

Route::middleware("auth:admin")->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('courses', CourseController::class);
});
