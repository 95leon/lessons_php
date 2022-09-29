@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<h1 class="mt-3">Новости</h1>
<h2>Посмотреть новости по категориям можно <a href="{{ route('news.category', 1) }}" class="text-decoration-none">здесь</a> </h2>
<hr><br><br>
@forelse ($news as $item)
@if (!$item['isPrivate'])
<a href="{{ route('news.category.message', $item['id']) }}" class="fs-5">{{ $item['title'] }} </a><br>
<hr>
@else
<mark class="fs-5">{{ $item['title'] }}</mark><a href="{{ route('admin.index') }}" style="color: red;" class="fs-5 text-decoration-none"> >>> авторизуйтесь для просмотра новости</a><br>
<hr>
@endif
@empty
<h3>Нет такой новости!</h3>
@endforelse
@endsection
