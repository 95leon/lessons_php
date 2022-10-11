@extends('layouts.main')

@section('title', 'Добавление новости')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card align-items-center">
                <div class="card-header display-6 text-muted">{{ __('Редактировать новость') }}</div>
                <div class="card-body">

                    <form action="{{ route('admin.message', $news->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="newsCategory">Категория новости</label>
                            <select name="category_id" id="newsCategory" class="form-control">
                                @forelse($categories as $item)
                                <option {{ $item->id == $news->category_id ? 'selected' : '' }} value="{{ $item->id
                                    }}">{{
                                    $item->category_name }}</option>
                                @empty
                                <option value="0" selected>Нет категории</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newsTitle">Заголовок новости</label>
                            <textarea required class="form-control" id="newsTitle" cols="120" rows="2" name="title"
                                value="{{ $news->title }}"></textarea>
                        </div>
                        <div class=" form-group">
                            <label for="newsTitle">Текст новости</label>
                            <textarea required class="form-control" id="newsText" cols="120" rows="6" name="text"
                                value="{{ $news->text }}"></textarea>
                        </div>
                        <div class="form-check">
                            <input id="isPrivate" name="is_private" type="checkbox" {{ $news->is_private == 1 ?
                            'checked' : ''}} class="form-check-input">
                            <label for="isPrivate">Приватная</label>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" value="Изменить">
                        </div>
                    </form><br>
                    <form action="{{ route('admin.delete.message', $news->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $news->id }}">
                        <input type="submit" class="btn btn-outline-danger" value=" Удалить ">
                    </form><br>
                    <a href="#" onclick="history.back();return false;" class="fs-5">Назад</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection