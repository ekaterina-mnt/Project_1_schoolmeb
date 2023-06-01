@extends('admin.layout')

@section('title')
Курсы
@endsection


@section('content')

<form action="{{ route('admin.courses.create') }}">
        <button type="submit">
            Добавить
        </button>
    </form>
@foreach($courses as $course)
<div class="course-wrap">
    <img src="{{ $course->poster }}">
    <p>
        {{ $course->title }}<br>
        {{ $course->subject }}<br>
        {{ $course->exam_type }}

        <br>
    <form action="{{ route('admin.courses.edit', $course->id) }}">
        <button type="submit">
            Редактировать
        </button>
    </form>
    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            Удалить
        </button>
    </form>
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


@endsection