<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function my_courses () {
        $courses = auth()->user()->paid_courses;

        return view('users.my_courses', ['courses' => $courses]);
    }
}
