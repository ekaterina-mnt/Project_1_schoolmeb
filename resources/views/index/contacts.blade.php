@extends('layout.layout')

@section('title', 'Контактная форма')

@section('content')

@section('sub-header')
<h1>контактная форма</h1>
@endsection

<form method="POST" action="{{ route('contact_form_process') }}">
    @csrf
    <input name="email" placeholder="Ваш Email">

    @error('email')
    {{ $message }}
    @enderror

    <input name="phone" placeholder="Номер телефона">

    @error('phone')
    {{ $message }}
    @enderror

    <input name="text" placeholder="Комментарий">

    @error('text')
    {{ $message }}
    @enderror

    <input type="submit" value="Написать">
</form>
@endsection