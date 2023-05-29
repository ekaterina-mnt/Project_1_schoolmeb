<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;

Route::middleware("admin")->group( function () {
    Route::get('login', [AuthController::class, 'showAdminLoginForm'])->name('login');
    Route::post('login_process', [AuthController::class, 'login_process'])->name('login_process');
    Route::resource('/courses', CourseController::class);
});
