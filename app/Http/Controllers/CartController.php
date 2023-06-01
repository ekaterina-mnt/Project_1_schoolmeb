<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class CartController extends Controller
{
    public function show_cart()
    {
        $courses = auth()->user()->cart_courses;

        return view('courses.cart')->with('courses', $courses);
    }

    public function add_to_cart($course_id)
    {
        $cart_courses = auth()->user()->cart_courses;
        $paid_courses = auth()->user()->paid_courses;

        if ((auth()->user()->courses->where('id', $course_id))->isEmpty()) {
            DB::table('course_user')->insert([
                'user_id' => auth()->id(),
                'course_id' => $course_id,
                'status' => 'in_cart',
            ]);

            return redirect(route('show_cart'))->with('flash', 'Курс успешно добавлен в корзину!');
        } elseif ($cart_courses->where('id', $course_id)->count()) {
            return redirect()->back()->with('flash', 'Данный курс уже находится в вашей корзине!');
        } elseif ($paid_courses->where('id', $course_id)->count()) {
            return redirect()->back()->with('flash', 'Вы уже приобрели данный курс!');
        } else {
            return redirect()->back()->with('flash', 'Возникла проблема с добавлением курса, свяжитесь с нами для ее исправления!');
        }
    }


    public function pay($course_id)
    {
        $paid_courses = auth()->user()->paid_courses;

        if (($paid_courses->where('id', $course_id))->isEmpty()) {
            $course = Course::findOrFail($course_id);
            $course->num_students++;
            $course->save();

            DB::table('course_user')->update([
                'status' => 'paid',
            ]);

            return redirect(route('courses.index'))->with('flash', 'Вы успешно оплатили данный курс!');
        } elseif ($paid_courses->where('id', $course_id)->count()) {
            return redirect()->back()->with('flash', 'Вы уже приобрели данный курс!');
        } else {
            return redirect()->back()->with('flash', 'Возникла проблема с оплатой курса, свяжитесь с нами для ее исправления!');
        }
    }
}
