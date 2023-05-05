@extends('layout.layout')

@section('title')
Открытые вебинары
@endsection

@section('sub-header')
<h1>открытые вебинары</h1>
@endsection

@section('content')

<div class="vebinars-wrap">
    @foreach ($vebinars as $vebinar)
    <a href="openvebinars/{{ $vebinar->id }}">
        <div class="about-vebinar">
            <img height=52px width=86px src="{{ $vebinar->cover }}">
            <p>
                {{ $vebinar->title }}
            </p>
        </div>
    </a>
    @endforeach
</div>

@endsection