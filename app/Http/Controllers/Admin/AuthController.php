<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login_process(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);

        if (auth("admin")->attempt($data)) {
            return redirect(route('admin.courses.index'));
        }

        return redirect(route('admin.login'))->withErrors(["password" => 'Пользователь не найден, либо неверно введены данные.']);
    }

    public function logout()
    {
        auth("admin")->logout();

        return redirect(route('welcome'));
    }
}
