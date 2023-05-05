@extends('layout.layout')

@section('title')
Открытые вебинары
@endsection

@section('content')
@foreach ($vebinars as $vebinar)
<iframe width="560" height="315" src="{{ $vebinar->video_src }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

@endforeach
@endsection