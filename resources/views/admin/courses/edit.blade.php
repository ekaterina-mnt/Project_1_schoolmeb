@extends('admin.layout')

@section('title', "Редактировать курс ID $course->id")

@section('content')
<h1>Редактирование курса ID {{ $course->id }}</h1>

<form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
    @csrf
    @method("PUT")

    <p>
        <input name="title" placeholder="Название курса" value='{{ $course->title }}'>
    </p>

    @error('title')
    {{ $message }}
    @enderror

    <p>
        <select name="subject" class="subject">
            <option hidden value="none">
                Предмет
            </option>
            @foreach ($subjects as $subject)
            <option value="{{ $subject }}" @if ($course->subject==$subject) selected @endif>
                {{ $subject }}
            </option>
            @endforeach
        </select>
    </p>

    @error('subject')
    {{ $message }}
    @enderror

    <p>
        <input name="price" placeholder="Цена" value='{{ $course->price }}'>
    </p>

    @error('price')
    {{ $message }}
    @enderror

    <p>
        <textarea name="description" placeholder="Описание">
            {{ $course->description }}
        </textarea>
    </p>

    @error('description')
    {{ $message }}
    @enderror

    <p>
        <select name="teacher_id">
            <option hidden value="none">
                Преподаватель
            </option>
            @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}" @if ($course->teacher_id==$teacher->id) selected @endif>
                {{ $teacher->name }}
            </option>
            @endforeach
        </select>
    </p>

    @error('teacher_id')
    {{ $message }}
    @enderror

    <p>
        <select name="exam_type">
            <option hidden value="none">
                Экзамен
            </option>
            <option value="ЕГЭ" @if ($course->exam_type=="ЕГЭ") selected @endif>
                ЕГЭ
            </option>
            <option value="ОГЭ" @if ($course->exam_type=="ОГЭ") selected @endif>
                ОГЭ
            </option>
        </select>
    </p>

    @error('exam_type')
    {{ $message }}
    @enderror

    <p>
        <input name="poster" type="file" placeholder="Обложка">
    </p>

    @error('poster')
    {{ $message }}
    @enderror

    <input type="submit" value="Редактировать">
</form>
@endsection