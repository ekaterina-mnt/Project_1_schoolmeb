@extends('layout.layout')

@section('title')
{{ $vebinar->title }}
@endsection

@section('content')

<div class="video" data-video-src="{{ $vebinar->video_src }}" data-img-src="{{ $vebinar->img_src }}">
  <button class="video-play btn-reset">
    <svg width="68" height="48" viewBox="0 0 68 48">
      <path class="video-play-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z">
      </path>
      <path class="video-play-icon" d="M 45,24 27,14 27,34"></path>
    </svg>
  </button>
</div>

<h1>Комментарии</h1>
<div>
  <form method="POST" action="{{ route('comment', $vebinar->id) }}">
    @csrf

    <input type="hidden" name="open_vebinar_id" value="{{ $vebinar->id }}">
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    <textarea name="text" placeholder="Напишите свой комментарий">Все отлично! Потом убрать</textarea>

    @error('text')
    {{ $message }}
    @enderror

    <button type="submit">Оставить комментарий</button>
  </form>
</div>
@foreach($vebinar->comments as $comment)
<p>
  {{ $comment->user->name }}
  <br>
  {{ $comment->text }}
</p>
@endforeach

<script src="{{ asset('/app.js') }}"></script>
@endsection