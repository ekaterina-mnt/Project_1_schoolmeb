@extends('layout.layout')

@section('title') 
{{ $vebinar->title }}
@endsection

@section('content')

<iframe width="560" height="315" src="{{ $vebinar->video_src }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>

@endsection