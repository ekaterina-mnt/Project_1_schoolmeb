<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show_cart()
    {
        $courses = auth()->user()->courses;

        return view('courses.cart')->with('courses', $courses);
    }

    public function add_to_cart($course_id)
    {
        if ((auth()->user()->courses->where('id', $course_id))->isEmpty()) {
            DB::table('course_user')->insert([
                'user_id' => auth()->id(),
                'course_id' => $course_id,
            ]);

            return redirect(route('show_cart'));
        }

        return redirect()->back();
    }
}
