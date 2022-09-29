@extends('layouts.main')

@section('title', 'Категории новостей')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<h1 class="mt-3">{{ $categoryName }}</h1>
@foreach ($news_category as $item)
<a href="{{ route('news.category', $item['id']) }}" class="fs-4 text-decoration-none">{{ $item['name_category'] }}</a>&nbsp
@endforeach
<hr><br><br>
@forelse ($news as $item)
@if (!$item['isPrivate'])
<a href="{{ route('news.category.message', $item['id']) }}" class="fs-5">{{ $item['title'] }}</a><br>
<hr>
@else
<mark class="fs-5">{{ $item['title'] }}</mark><a href="{{ route('admin.index') }}" style="color: red;" class="fs-5 text-decoration-none"> >>> авторизуйтесь для просмотра новости</a><br>
<hr>
@endif
@empty
<h3>Категория отсутствует!</h3>
@endforelse
@endsection
