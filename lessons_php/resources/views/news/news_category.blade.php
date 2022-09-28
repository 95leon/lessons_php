@extends('layouts.main')
@section('content')
    @include('news.menu')
    <h1>Новости категории</h1>
    @forelse ($news as $item)
        <a href="{{ route('news.category.message', $item['id']) }}">{{ $item['title'] }}</a><br>
    @empty
        <h3>Категория отсутствуют!</h3>
    @endforelse
@endsection
