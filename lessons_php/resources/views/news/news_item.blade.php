@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<h1>Новость</h1>
@if ($news)
<h2>{{ $news['title'] }}</h2>
<h4>{{ $news['text'] }}</h4>
<a href="#" onclick="history.back();return false;" class="fs-5">Назад</a>
@else
<h3>Новость отсутствует!</h3>
@endif
@endsection
