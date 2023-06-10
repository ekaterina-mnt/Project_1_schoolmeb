@extends('layout.layout')

@section('title', 'Мои курсы')

@section('content')

@section('sub-header')
<div class="sub-header">
    <h1>Мои курсы</h1>
</div>
@endsection

@if ($courses->isEmpty())
<p>Вы еще не приобрели ни один курс.</p>
@else

@foreach ($courses as $course)

<div class="cart-wrapper">
    <div class="about-cart">

        <div class="all-cart-course-info">
            <p class="course-info-title">курс {{ $course->title }}</p>
            <div class="course-labels">
                <p class="course-label-teacher">{{ $course->teacher->name }}</p>
                <p class="course-label">{{ $course->subject->name }}</p>
                <p class="course-label">{{ $course->exam_type }}</p>
            </div>
            <hr class="cart">
            <p>{{ $course->description }}</p>

            <form action="{{ route('my_courses_watch', $course) }}">
                <button class="course-watch" type="submit">
                    смотреть
                </button>
            </form>
        </div>

        <img class="cart-course" src="{{ $course->img_src }}">
    </div>
</div>

@endforeach
@endif


@endsection('content')