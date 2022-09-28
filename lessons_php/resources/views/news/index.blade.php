@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<h1>Все новости</h1>
@foreach ($news_category as $item)
<a href="{{ route('news.category', $item['id']) }}">{{ $item['name_category'] }}</a>&nbsp
@endforeach
<hr>
@forelse ($news as $item)
@if (!$item['isPrivate'])
<a href="{{ route('news.category.message', $item['id']) }}">{{ $item['title'] }}</a><br>
@else
<mark>{{ $item['title'] }}</mark><a href="{{ route('admin.index') }}"> -- авторизоваться для просмотра</a><br>
@endif
@empty
<h3>Нет такой новости!</h3>
@endforelse
@endsection
