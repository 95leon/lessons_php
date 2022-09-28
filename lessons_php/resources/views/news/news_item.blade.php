@extends('layouts.main')
@section('content')
    @include('news.menu')
    <h1>Новость</h1>
    @if ($news)
        <h2>{{ $news['title'] }}</h2>
        <h4>{{ $news['text'] }}</h4>
    @else
        <h3>Новость отсутствует!</h3>
    @endif
@endsection
