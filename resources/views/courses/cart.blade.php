@extends('layout.layout')

@section('title', 'Корзина')

@section('content')

<h1>корзина</h1>

@if ($courses->isEmpty())
<p>Вы еще не добавили ничего в корзину.</p>
@else

@foreach ($courses as $course)
<p>{{ $course->title }}
    <br>
    {{ $course->exam_type }}
</p>
@endforeach
@endif


@endsection('content')