@extends('layout.layout')

@section('title', 'Забыл пароль')

@section('content')

<div class="auth-wrapper">

    <h1 class="auth">Восстановление пароля</h1>

    <form action="{{ route('forgot_process') }}" method="POST">
        @csrf

        <div class="auth-label">
        <label>
            <p class="left">e-mail</p>
            <p><input class="auth" name="email" type="text" placeholder="e-mail" /></p>
        </label>

@error('email')
<p class="form-error">{{ $message }}</p>
@enderror
    </div>

        <p><button class="auth-login" type="submit">восстановить</button></p>
    </form>
</div>



@endsection