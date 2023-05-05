<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OpenVebinarController;
use App\Http\Controllers\TeacherController;

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

Route::get('/teachers', [TeacherController::class, 'index']);

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/openvebinars', [OpenVebinarController::class, 'index']);

Route::get('/openvebinars/{id}', [OpenVebinarController::class, 'show']);
