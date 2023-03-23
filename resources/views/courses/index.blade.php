@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('content')

@foreach($courses as $course)
<p>
    {{ $course->title }}<br>
    {{ $course->subject }}<br>
    {{ $course->exam }}<br>
</p>
@endforeach

@endsection