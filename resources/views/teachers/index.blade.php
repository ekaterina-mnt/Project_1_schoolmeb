@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('sub-header')
<h1>преподаватели мебиума</h1>
@endsection

@section('content')


<div class="teachers-wrapper">

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