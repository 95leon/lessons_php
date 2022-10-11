@extends('layouts.main')

@section('title', 'Добавление новости')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<div class="row">
    <div class="col-md-2 mt-5">
        <div class="align-baseline">
            @foreach ($categories as $item)
            <p class="fs-3 text-decoration-none link-secondary">{{
                $item->category_name }}</p>
            <a href="{{ route('admin.category', $item->id) }}" class="fs-5">редактировать</a>&nbsp
            <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-10">
        {{ $news->links() }}
        @foreach ($news as $item)
        <p class="fs-5">{{ $item->title }}</p>
        <a href="{{ route('admin.message', $item->id) }}" class="fs-5">редактировать</a>&nbsp
        <br>
        <hr>
        @endforeach
    </div>
</div>
@endsection