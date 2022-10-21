@extends('layouts.main')

@section('title', 'Парсинг новостей')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card align-items-center">
                <div class="card-body">
                    <a href="#" onclick="history.back();return false;" class="fs-5">Назад</a>
                    <div class="form-group">
                        <form class="form-control" id="parse_link" method="post" action="{{ route('admin.parse', 1) }}">
                            @csrf
                            <label for="parse_link">Введите ссылку на новостной ресурс</label>
                            <input form="parse_link" type="text" name="parse_link" class="form-control">
                            <input form="parse_link" type="submit" class="btn btn-outline-primary mt-2"
                                value="Парсить ссылку">
                        </form>
                    </div>
                    <div class="card-header display-6 text-muted mb-3">
                        {{ __('Парсинг новостей') }} &nbsp;
                        <a href={{ route('admin.parse', 1) }} class="fs-4">Lenta RU</a>&nbsp;
                        <a href={{ route('admin.parse', 2) }} class="fs-4">Rambler</a>&nbsp;
                        <a href={{ route('admin.parse', 3) }} class="fs-4">Mail RU</a>
                    </div>
                    <h4>РЕСУРС: {{ $parse['title'] }}, ссылка - <a href={{ $parse['link'] }} target="_blank">{{
                            $parse['link'] }}</a>
                    </h4>
                    <h4>ОПИСАНИЕ: {{ $parse['description'] }}</h4>
                </div>
                <div class="card-body">
                    @foreach($parse['news'] as $key => $item)
                    <hr>
                    <div class="card-body">
                        <h5>{{ $item['title'] }}</h5>
                        <p>{{ $item['description'] }}</p>
                        <p>АВТОР: {{ $item['author'] }}</p>
                        <p>КАТЕГОРИЯ: {{ $item['category'] }}</p>
                        <p>ОПУБЛИКОВАНО: {{ $item['pubDate']}}</p>
                        <p>ССЫЛКА: <a href={{ $item['link']}} target="_blank">смотреть в источнике</a></p>
                        <form method="post" id="parse{{ $key }}" action="{{ route('admin.create') }} " target="_blank">
                            @csrf
                            <input hidden form="parse{{ $key }}" type="text" name="mark" value="parse">
                            <input hidden form="parse{{ $key }}" type="text" name="category_name"
                                value="{{ $item['category'] }}">
                            <input hidden form="parse{{ $key }}" type="text" name="title" value="{{ $item['title'] }}">
                            <input hidden form="parse{{ $key }}" type="text" name="text"
                                value="{{ $item['description'] . '  ' . $item['link']}}">
                            <input form="parse{{ $key }}" type="submit" class="btn btn-outline-primary"
                                value="Сохранить">
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
