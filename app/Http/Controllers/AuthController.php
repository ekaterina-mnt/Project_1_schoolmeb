<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function showLoginForm()
    {
        // if (auth()->check()) - проверка авторизован/нет
        return view('auth.login');
    }

    function showRegisterForm()
    {
        return view('auth.register');
    }

    function register_process(Request $request)
    {
        // можно просто проходить валидацию, а можно записывать данные валидации в переменную
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed"],
        ]);

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
        ]);

        if ($user) {
            auth("web")->login($user);
        }

        return redirect(route('welcome'));
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route('welcome'));
    }

    public function login_process(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);

        if (auth("web")->attempt($data)) {
            return redirect(route('welcome'));
        }

        return redirect(route('login'))->withErrors(["password" => 'Пользователь не найден, либо неверно введены данные.']);
    }
}
