@extends('layout.layout')

@section('title')
Курсы
@endsection

@section('sub-header')

<div class="row">

    <h1>все курсы</h1>

    <form action="#">
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
            @foreach ($subjects as $subject)
            <div class="leftbar-subject">
                <input type="radio" name="subject" value="{{ $subject }}" id="{{ $subject }}" @if ($subject==$selected_subject) checked @endif>
                <label for="{{ $subject }}">
                    {{ $subject }}
                </label>
            </div>
            @endforeach
        </div>
    </div>

    <input class="filter-find" type="submit" value="Найти">
</form>

@endsection


@section('content')

<img class="courses-banner" src="{{ '/storage/courses/banner.png' }}">

@if ($courses->isEmpty())

<p>К сожалению, на данный момент в нашей школе нет курсов по данному предмету.</p>

@else
@foreach($courses as $course)
<div class="course-wrap">
    <img src="{{ $course->poster }}">
    <p>
        {{ $course->title }}<br>
        {{ $course->subject }}<br>
        {{ $course->exam_type }}
    </p>
</div>
@endforeach


<div class="course-paginator">

    <p>Всего найдено: {{ $courses->total() }}</p>

    @if ($courses->hasMorePages())
        @for ($i=1; $i<=$courses->lastPage(); $i++)
            <a href="{{ $courses->url($i) }}" @if ($i==$courses->currentPage()) class="current" @endif>{{ $i }}</a>
        @endfor
    @endif
</div>

@endif

@endsection