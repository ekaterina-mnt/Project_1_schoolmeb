@extends('layout.layout')

@section('title', 'Курсы')

@section('sub-header')

<div class="row">

    <h1>все курсы</h1>

    @if (auth()->check())
    @if (count(auth()->user()->cart_courses))
    <a class="cart_count" href="{{ route('show_cart') }}">
        <div class="red-circle-cart_count-index">
            {{ count(auth()->user()->cart_courses) }}
        </div>
    </a>
    @endif
    @endif

    <form action="{{ route('show_cart') }}">
        <button class="border cart">
            корзина
        </button>
    </form>


</div>

@endsection

@section('leftbar')
<form action="{{ route('courses_form_process') }}" method="POST">
    @csrf

    <div class="leftbar-form-bottom-margin">
        <select name="exam_type" class="courses">
            <option value="все">
                все экзамены
            </option>
            <option value="ЕГЭ" @if ($exam_type=='ЕГЭ' ) selected @endif>
                ЕГЭ
            </option>
            <option value="ОГЭ" @if ($exam_type=='ОГЭ' ) selected @endif>
                ОГЭ
            </option>
        </select>
    </div>

    <div class="leftbar-form-bottom-margin">
        <div class="leftbar-subjects-list ">
        <div class="leftbar-subject">
                <input type="radio" name="subject" value="all" id="all" @if ($selected_subject=='all') checked @endif>
                <label for="all">
                    все предметы
                </label>
            </div>
            @foreach ($subjects as $subject)
            <div class="leftbar-subject">
                <input type="radio" name="subject" value="{{ $subject->id }}" id="{{ $subject->id }}" @if ($subject->id==$selected_subject) checked @endif>
                <label for="{{ $subject->id }}">
                    {{ $subject->name }}
                </label>
            </div>
            @endforeach
        </div>
    </div>

    <input class="filter-find" type="submit" value="найти">
</form>

@endsection


@section('content')

<img class="courses-banner" src="{{ asset('/storage/courses/banner.png') }}">

@if ($courses->isEmpty())

<p>К сожалению, на данный момент в нашей школе нет курсов по данному предмету.</p>

@else

@foreach($courses as $course)

<div class="course-wrap">
    <a href="{{ route('courses.show', $course) }}">
        <div class="about-course">
            <img src="{{ $course->img_src }}">

            <div class="all-course-info">
                <p class="course-info-title">курс {{ $course->title }}</p>
                <div class="course-labels">
                    <p class="course-label-teacher">{{ $course->teacher->name }}</p>
                    <p class="course-label">{{ $course->subject->name }}</p>
                    <p class="course-label">{{ $course->exam_type }}</p>
                </div>
                <p>{{ $course->about_course }}</p>
                <p>
            </div>

            <form action="{{ route('add_to_cart', $course->id) }}">
                <button class="add-to-cart @auth @if (auth()->user()->courses->contains($course))
                add-to-cart-disabled
                @endif" @endauth type="submit" @auth @if (auth()->user()->courses->contains($course))
                    disabled
                    @endif
                    @endauth>
                    @auth
                    @if (auth()->user()->cart_courses->contains($course))
                    в корзине
                    @elseif (auth()->user()->paid_courses->contains($course))
                    куплен
                    @else
                    + в корзину
                    @endif
                    @endauth
                    @guest
                    + в корзину
                    @endguest
                </button>
            </form>

            </p>

        </div>
    </a>
</div>
@endforeach


<div class="course-paginator">

    <p>Всего найдено: {{ $courses->total() }}</p>

    @if ($courses->hasPages())
    @for ($i=1; $i<=$courses->lastPage(); $i++)
        <a href="{{ $courses->url($i) }}" @if ($i==$courses->currentPage()) class="current" @endif>{{ $i }}</a>
        @endfor
        @endif
</div>

@endif

@endsection