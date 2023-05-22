<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show_cart()
    {
        $courses = auth()->user()->courses;

        return view('courses.cart')->with('courses', $courses);
    }
}
