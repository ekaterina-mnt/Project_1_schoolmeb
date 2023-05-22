@extends('layout.layout')

@section('title', 'Забыл пароль')

@section('content')

<h1>Восстановление пароля</h1>

<form action="{{ route('forgot_process') }}" method="POST">
    @csrf

    <input name="email" type="text" placeholder="Email" />

    @error('email')
    <p>{{ $message }}</p>
    @enderror

    <button type="submit">Восстановить</button>
</form>

@endsection