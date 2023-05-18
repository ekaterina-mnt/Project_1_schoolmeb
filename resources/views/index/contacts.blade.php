@extends('layout.layout')

@section('title', 'Свяжитесь с нами')

@section('content')
<form method="POST" action="{{ route('contact_form_process') }}">
    @csrf
    <input name="email" placeholder="Email">

    @error('email')
    {{ $message }}
    @enderror

    <input name="text" placeholder="Сообщение">

    @error('email')
    {{ $message }}
    @enderror
    
    <input type="submit" value="Написать">
</form>
@endsection