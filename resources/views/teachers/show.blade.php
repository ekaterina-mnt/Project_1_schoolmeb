@extends('layout.layout')

@section('title')
{{ $teacher->name }}
@endsection

@section('sub-header')

<div class="row">

    <h1>о преподавателе</h1>

</div>

@endsection

@section('content')
<div class="show-course-wrapper teacher-wrapper">
    <img class="show-course show-teacher" src="{{ $teacher->photo }}">
    <div>
        <div class="show-course-info">
            <p class="course-info-title">преподаватель {{ $teacher->name }}</p>
            <div class="show-course-labels">
                <p class="show-course-label">{{ $teacher->subject->name }}</p>
                <p class="show-course-label">{{ $teacher->age }}</p>
            </div>
            <p class="course-description">{{ $teacher->about }}</p>
            <p>
            <form action="{{ route('courses.index', ['все', $teacher->subject->id]) }}">
                <button class="add-to-cart show-teacher" type="submit">
                    курсы преподавателя
                </button>
            </form>
            </p>
        </div>


    </div>
</div>

@endsection