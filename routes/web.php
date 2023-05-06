<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OpenVebinarController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;

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
})->name('welcome');;

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.show');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.show');

Route::get('/openvebinars', [OpenVebinarController::class, 'index'])->name('openvebinars.index');

Route::get('/openvebinars/{id}', [OpenVebinarController::class, 'show'])->name('openvebinars.show');

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware("guest")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register_process'])->name('register_process');
});

