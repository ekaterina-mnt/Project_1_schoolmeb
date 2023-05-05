@extends('layout.layout')

@section('title')
Курсы
@endsection

@section('sub-header')

<div class="row">

        <h1>все курсы</h1>

        <form action="#">
            <button class="cart">
                корзина
            </button>
        </form>

</div>

@endsection

@section('leftbar')
<form>
    <select class="courses">
        <option>
            все экзамены
        </option>
        <option>
            ЕГЭ
        </option>
        <option>
            ОГЭ
        </option>
    </select>
</form>
<form>
    <select class="courses">
        <option>
            все курсы
        </option>
        <option>
            бесплатные
        </option>
        <option>
            спецкурсы
        </option>
        <option>
            фреш
        </option>
        <option>
            прокачка
        </option>
    </select>
</form>

<div class="leftbar-subjects-list">
    @foreach ($subjects as $subject)
    <form action="#">
        <button class="leftbar-subject">
            {{ $subject }}
        </button>
    </form>
    @endforeach
</div>

@endsection


@section('content')

<img class="courses-banner" src="{{ '/storage/courses/banner.png' }}">

@foreach($courses as $course)
<div class="course-wrap">
    <img src="{{ $course->poster }}">
    <p>
        {{ $course->title }}<br>
        {{ $course->subject }}<br>
        {{ $course->exam }}
    </p>
</div>
@endforeach

@endsection