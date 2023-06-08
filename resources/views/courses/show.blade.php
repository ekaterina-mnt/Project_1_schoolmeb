@extends('layout.layout')

@section('title')
{{ $course->title }}
@endsection

@section('content')
<div class="show-course-wrapper">
    <div>
        <div class="show-course-info">
            <p class="course-info-title">курс {{ $course->title }}</p>
            <div class="show-course-labels">

                <p class="show-course-label-teacher">{{ $course->teacher->name }}</p>
                <p class="show-course-label">{{ $course->subject }}</p>
                <p class="show-course-label">{{ $course->exam_type }}</p>
            </div>
            <p class="course-description">{{ $course->description }}</p>
            <p>
            <form action="{{ route('add_to_cart', $course->id) }}">
            <button class="add-to-cart @if (auth()->user()->courses->contains($course))
                add-to-cart-disabled
                @endif" type="submit"
                @if (auth()->user()->courses->contains($course))
                disabled
                @endif>
                    @if (auth()->user()->cart_courses->contains($course))
                    добавлено
                    @elseif (auth()->user()->paid_courses->contains($course))
                    куплен
                    @else
                    + в корзину
                    @endif
                </button>
            </form>
            </p>
        </div>
    </div>
    <img class="show-course" src="{{ $course->img_src }}">

</div>

<script src="{{ asset('/app.js') }}"></script>
@endsection