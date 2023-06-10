@extends('layout.layout')

@section('title', 'Регистрация')

@section('content')

<div class="auth-wrapper">

    <h1 class="auth">регистрация</h1>

    <form action="{{ route('register_process') }}" method="POST">
        @csrf

        <div class="auth-label">
            <label>
                <p class="left">имя</p>
                <p><input class="auth" name="name" type="text" placeholder="имя" /></p>
            </label>

            @error('name')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-label">
            <label>
                <p class="left">e-mail</p>
                <p><input class="auth" name="email" type="text" placeholder="e-mail" /></p>
            </label>

            @error('email')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-label">
            <label>
                <p class="left">придумайте пароль</p>
                <p><input class="auth" name="password" type="password" placeholder="пароль" /></p>
            </label>

            @error('password')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-label">
            <label>
                <p class="left">повторите пароль</p>
                <p><input class="auth" name="password_confirmation" type="password" placeholder="подтверждение пароля" /></p>
            </label>

            @error('password_confirmation')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <p><a class="auth-forget" href="{{ route('login') }}">Есть аккаунт?</a>


        <p><button class="auth-login" type="submit">Зарегистрироваться</button></p>
    </form>

</div>

@endsection