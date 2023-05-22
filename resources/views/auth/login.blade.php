@extends('layout.layout')

@section('title', 'Аутентификация')

@section('content')

<h1>Вход</h1>

<form action="{{ route('login_process') }}" method="POST">
    @csrf

    <input name="email" type="text" placeholder="Email" />

    @error('email')
    <p>{{ $message }}</p>
    @enderror

    <input name="password" type="password" placeholder="Пароль" />

    @error('password')
    <p>{{ $message }}</p>
    @enderror

    <div>
        <a href="{{ route('forgot') }}">Забыли пароль?</a>
    </div>

    <div>
        <a href="{{ route('register') }}">Регистрация</a>
    </div>

    <button type="submit">Войти</button>
</form>

@endsection