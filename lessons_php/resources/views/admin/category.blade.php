@extends('layouts.main')

@section('title', 'Добавление новости')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card align-items-center">
                <div class="card-header display-6 text-muted">{{ __('Редактировать категорию новостей') }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.category', $category->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Заголовок категории</label>
                            <textarea required class="form-control" id="categoryName" cols="120" rows="1"
                                name="categoryName" value="{{ $category->category_name }}"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary mt-2" value="Изменить категорию">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection