@extends('layout.layout')

@section('title')
Преподаватели
@endsection

@section('content')

@foreach($teachers as $teacher)
<p>
    {{ $teacher->name }}<br>
    {{ $teacher->subject }}<br>
    {{ $teacher->exam }}<br>
    {{ $teacher->age }}<br>
</p>
@endforeach

@endsection