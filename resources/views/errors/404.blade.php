@extends('layout.layout')

@section('title', 'Ошибка')

@section('content')
<div class="error-wrapper">
    <p class="bigger">404</h1>
    <p class="less-bigger">страница не найдена</h5>
    <p>Не переживай, просто нажми на кнопку ниже</p>
    <form action="{{ route('courses.index') }}">
        <button class="error" type="submit">
            вернуться в каталог
        </button>
    </form>
</div>
@endsection