<?php

use Illuminate\Support\Facades\Route;

Route::resource(name: 'courses', controller: \App\Http\Controllers\Admin\CourseController::class);
