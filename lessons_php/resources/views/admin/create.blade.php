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
                <div class="card-header display-6 text-muted">{{ __('Добавить новость') }}</div>
                <div class="card-body">

                    <form action="{{ route('admin.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="newsCategory">Категория новости</label>
                            <select name="category" id="newsCategory" class="form-control">
                                @forelse($categories as $item)
                                <option {{ $item['id'] == old('category') ? 'selected' : '' }} value="{{ $item['id'] }}">{{
                                    $item['name_category'] }}</option>
                                @empty
                                <option value="0" selected>Нет категории</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="newsTitle">Заголовок новости</label>
                            <textarea required class="form-control" id="newsTitle" cols="120" rows="2" name="title"
                                value="{{ old('title') }}"></textarea>
                        </div>

                        <div class=" form-group">
                            <label for="newsTitle">Текст новости</label>
                            <textarea required class="form-control" id="newsText" cols="120" rows="6" name="text"
                                value="{{ old('text') }}"></textarea>
                        </div>

                        <div class="form-check">
                            <input {{ old('isPrivate') === 1 ? 'checked' : '' }} id="newsPrivate" name="isPrivate"
                                type="checkbox" value="1" class="form-check-input">
                            <label for="newsPrivate">Приватная</label>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" value="Добавить новость">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection