@extends('layout.layout')

@section('title', 'Аутентификация')

@section('content')

<div class="auth-wrapper">

    <h1 class="auth">войти в мебиум</h1>

    <form action="{{ route('login_process') }}" method="POST">
        @csrf

        <div class="auth-label">
            <label>
                <p class="left">логин</p>
                <p><input class="auth" name="email" type="text" placeholder="e-mail" /></p>
            </label>

            @error('email')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-label">
            <label>
                <p class="left">пароль</p>
                <p><input class="auth" name="password" type="password" placeholder="пароль" /></p>
            </label>

            @error('password')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <p><a class="auth-forget" href="{{ route('forgot') }}">забыли пароль?</a></p>

        <p><button class="auth-login" type="submit">войти</button></p>
    </form>

</div>

@endsection