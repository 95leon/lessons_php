@extends('layouts.main')

@section('title', 'Добавление новости')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<form>
    <h1>Добавление статьи</h1>
    <textarea class="mb-1" cols="60" rows="1" name="title" placeholder="заголовок статьи"></textarea><br>
    <textarea class="mb-1" cols="60" rows="10" name="text" placeholder="тело статьи"></textarea><br>
    <textarea class="mb-1" cols="60" rows="3" name="description" placeholder="краткое описание"></textarea><br>
    <input class="btn btn-primary" type="submit" value="Добавить">
</form>
@endsection
