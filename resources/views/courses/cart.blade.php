@extends('layout.layout')

@section('title', 'Корзина')

@section('content')

@section('sub-header')
<div class="sub-header">
    <h1>корзина</h1>
</div>
@endsection

@if ($courses->isEmpty())
<p>Вы еще не добавили ничего в корзину.</p>
@else

@foreach ($courses as $course)
<p>{{ $course->title }}
    <br>
    {{ $course->exam_type }}

    <form action="{{ route('pay', $course->id) }}">
        <button type="submit">
            Оплатить
        </button>
    </form>
</p>
@endforeach
@endif


@endsection('content')