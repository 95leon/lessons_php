@extends('layouts.main')

@section('title', 'Категории новостей')

@section('menu')
@include('news.menu')
@endsection

@section('content')
<div class="row">
    <div class="col-md-2 mt-5">
        <div class="align-baseline">
            @foreach ($newsCategory as $item)
            <a href="{{ route('news.category', $item['id']) }}" class="fs-3 text-decoration-none link-secondary">{{ $item['name_category'] }}</a><br>
            @endforeach
        </div>
    </div>
    <div class="col-md-10">
        <h1 class="mb-4 text-muted text-center">{{ $categoryName }}</h1>
        @forelse ($news as $item)
        @if (!$item['isPrivate'])
        <a href="{{ route('news.category.message', $item['id']) }}" class="fs-5">{{ $item['title'] }}</a><br>
        <hr>
        @else
        <mark class="fs-5">{{ $item['title'] }}</mark><a href="{{ route('admin.index') }}" style="color: red;" class="fs-5 text-decoration-none"> >>> авторизуйтесь для просмотра</a><br>
        <hr>
        @endif
        @empty
        <h3>Категория отсутствует!</h3>
        @endforelse
    </div>
</div>
@endsection
