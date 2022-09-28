@extends('layouts.main')

@section('title', 'Новости категории')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <h1>Новости категории</h1>
    @forelse ($news as $item)
        <a href="{{ route('news.category.message', $item['id']) }}">{{ $item['title'] }}</a><br>
    @empty
        <h3>Категория отсутствуют!</h3>
    @endforelse
@endsection
