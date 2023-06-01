@extends('layout.layout')

@section('title', 'Мои курсы')

@section('content')

@section('sub-header')
<div class="sub-header">
    <h1>Мои курсы</h1>
</div>
@endsection

@if ($courses->isEmpty())
<p>Вы еще не приобрели ни один курс.</p>
@else

@foreach ($courses as $course)
<p>{{ $course->title }}
    <br>
    {{ $course->exam_type }}

</p>
@endforeach
@endif


@endsection('content')