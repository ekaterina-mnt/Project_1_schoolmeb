@extends('admin.layout')

@section('title', 'Добавить курс')

@section('content')
<h1>Заполните форму</h1>

<form action="{{ route('admin.courses.store') }}" method="POST">
    @csrf

    <p>
        <input name="title" placeholder="Название курса">
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
            <option value="{{ $subject }}">
                {{ $subject }}
            </option>
            @endforeach
        </select>
    </p>

    @error('subject')
    {{ $message }}
    @enderror

    <p>
        <input name="price" placeholder="Цена">
    </p>

    @error('price')
    {{ $message }}
    @enderror

    <p>
        <textarea name="description" placeholder="Описание"></textarea>
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
            <option value="{{ $teacher->id }}">
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
            <option value="ЕГЭ">
                ЕГЭ
            </option>
            <option value="ОГЭ">
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

    <input type="submit" value="Добавить">
</form>
@endsection