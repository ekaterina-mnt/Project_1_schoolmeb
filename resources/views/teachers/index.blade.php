@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('sub-header')
<h1>преподаватели мебиума</h1>

<form>
    <select class="courses">
        @foreach ($subjects as $subject)
        <option>
            <a href="/teachers/{{ $subject }}">{{ $subject }}</a>
        </option>
        @endforeach
    </select>
</form>

@endsection

@section('content')


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

</div>

@endsection