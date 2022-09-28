@extends('layouts.main')

@section('title', 'Новости категории')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<h1>Новости категории {{ $categoryName }}</h1>
@forelse ($news as $item)
@if (!$item['isPrivate'])
<a href="{{ route('news.category.message', $item['id']) }}">{{ $item['title'] }}</a><br>
@else
<mark>{{ $item['title'] }}</mark><a href="{{ route('admin.index') }}"> -- авторизоваться для просмотра</a><br>
@endif
@empty
<h3>Категория отсутствуют!</h3>
@endforelse
@endsection
