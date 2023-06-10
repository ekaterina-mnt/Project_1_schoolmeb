<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OpenVebinarController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

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

Route::get('/', [IndexController::class, 'welcome'])->name('welcome');

Route::get('/teachers/{subject?}', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers_form_process', [TeacherController::class, 'teachers_form_process'])->name('teachers_form_process');

Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{exam_type?}/{subject?}', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses_form_process', [CourseController::class, 'courses_form_process'])->name('courses_form_process');

Route::get('/openvebinars', [OpenVebinarController::class, 'index'])->name('openvebinars.index');

Route::get('/openvebinars/{id}', [OpenVebinarController::class, 'show'])->name('openvebinars.show');

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/openvebinars/comment/{id}', [OpenVebinarController::class, 'comment'])->name('comment');

    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::get('/add_to_cart/{id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart/pay/{id}', [CartController::class, 'pay'])->name('cart.pay');
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/mycourses', [UserController::class, 'my_courses'])->name('my_courses');
    Route::get('/mycourses/{course}', [UserController::class, 'watch'])->name('my_courses_watch');
});

Route::middleware("guest")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login_process'])->name('login_process');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register_process'])->name('register_process');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [AuthController::class, 'forgot_process'])->name('forgot_process');
});

Route::post('/contact_form_process', [IndexController::class, 'contact_form_process'])->name('contact_form_process');
Route::get('/contacts', [IndexController::class, 'showContactForm'])->name('contact_form');
