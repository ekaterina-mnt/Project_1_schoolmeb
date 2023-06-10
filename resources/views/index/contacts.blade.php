@extends('layout.layout')

@section('title', 'Контактная форма')

@section('content')

<div class="auth-wrapper">

    <h1 class="auth">контактная форма</h1>

<form method="POST" action="{{ route('contact_form_process') }}">
    @csrf

    <div class="auth-label">
        <label>
            <p class="left">e-mail</p>
            <p><input class="auth" name="email" placeholder="e-mail"></p>
        </label>

    @error('email')
    <p class="form-error">{{ $message }}</p>
    @enderror
        </div>

    <div class="auth-label">
        <label>
            <p class="left">номер телефона</p>
            <p><input class="auth" name="phone" placeholder="номер телефона"></p>
        </label>

    @error('phone')
    <p class="form-error">{{ $message }}</p>
    @enderror
        </div>

    <div class="auth-label">
        <label>
            <p class="left">комментарий</p>
            <p><input class="auth" name="text" placeholder="комментарий"></p>
        </label>

    @error('text')
    <p class="form-error">{{ $message }}</p>
    @enderror
        </div>

    <p><button class="auth-login" type="submit">отправить</button></p>
</form>
@endsection