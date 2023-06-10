<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class UserController extends Controller
{
    public function my_courses () {
        $courses = auth()->user()->paid_courses;

        return view('users.my_courses', ['courses' => $courses]);
    }

    public function watch(Course $course)
    {
        return view('users.watch', ['course' => $course]);
    }
}
