@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('sub-header')
<h1>преподаватели мебиума</h1>

<form method="POST" action="{{ route('teachers_form_process') }}">
    @csrf

    <select name="subject" class="courses">
        <option value="all" @if ($selected_subject=='all' ) selected @endif>
            все предметы
        </option>
        @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}" @if ($subject->id==$selected_subject) selected @endif>
            {{ $subject->name }}
        </option>
        @endforeach
    </select>
    <input class="filter-find" type="submit" value="Найти">
</form>

@endsection

@section('content')

@if ($teachers->isEmpty())

<p>К сожалению, на данный момент в нашей школе нет преподавателя по этому предмету.</p>
<p>Но мы в процессе поисков!</p>

@else
<div class="teachers-wrap">

    @foreach($teachers as $teacher)
    <a href="{{ route('teacher.show', $teacher->id) }}">
    <div class="about-teacher">
        <img src="{{ $teacher->photo }}">
        <p>{{ $teacher->name }}</p>
        <div class="teacher-labels">
            <p class="teacher-label">{{ $teacher->subject->name }}</p>
            <p class="teacher-label">{{ $teacher->age }}</p>
        </div>
    </div>
    </a>
    @endforeach
    @endif
</div>

@endsection