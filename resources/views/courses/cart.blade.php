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

<div class="cart-wrapper">
    <div class="about-cart">
        <img class="cart-course" src="{{ $course->img_src }}">

        <div class="all-cart-course-info">
            <p class="course-info-title">курс {{ $course->title }}</p>
            <div class="course-labels">
                <p class="course-label-teacher">{{ $course->teacher->name }}</p>
                <p class="course-label">{{ $course->subject }}</p>
                <p class="course-label">{{ $course->exam_type }}</p>
            </div>
            <hr class="cart">
            <p>{{ $course->description }}</p>

            <div class="cart-buttons">
            <form action="{{ route('cart.pay', $course->id) }}">
                <button class="cart-pay" type="submit">
                    оплатить
                </button>
            </form>

            <form action="{{ route('cart.destroy', $course->id) }}">
                <button class="cart-delete" type="submit">
                    удалить из корзины
                </button>
            </form>
            </div>
        </div>
    </div>
</div>

@endforeach
@endif


@endsection('content')