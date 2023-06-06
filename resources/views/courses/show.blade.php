@extends('layout.layout')

@section('title')
{{ $course->title }}
@endsection

@section('content')

            <img class="course-show" src="{{ $course->img_src }}">
            <p>
                {{ $course->title }}<br>
                {{ $course->subject }}<br>
                {{ $course->exam_type }}<br>
                {{ $course->about_course }}
            <form action="{{ route('add_to_cart', $course->id) }}">
                <button type="submit">Добавить в корзину</button>
            </form>
            </p>

<script src="{{ asset('/app.js') }}"></script>
@endsection