@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('sub-header')
<h1>преподаватели мебиума</h1>

<form method="POST" action="{{ route('teachers_form_process') }}">
    @csrf

    <select name="subject" class="courses">
        @foreach ($subjects as $subject)
        <option value="{{ $subject }}" @if ($subject==$selected_subject) selected @endif>
            {{ $subject }}
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
    <div class="about-teacher">
        <img src="{{ $teacher->photo }}">
        <p>
            {{ $teacher->name }}<br>
            {{ $teacher->subject }}<br>
            {{ $teacher->exam }}<br>
            {{ $teacher->age }}
        </p>
    </div>
    @endforeach
@endif
</div>

@endsection