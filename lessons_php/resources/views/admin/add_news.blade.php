@extends('layouts.main')

@section('content')
    @include('admin.menu')
    <form>
        <h1>Добавление статьи</h1>
        <textarea style="margin-bottom: 3px;" cols="60" rows="1" name="title" placeholder="заголовок статьи"></textarea><br>
        <textarea style="margin-bottom: 3px;" cols="60" rows="10" name="text" placeholder="тело статьи"></textarea><br>
        <textarea style="margin-bottom: 3px;" cols="60" rows="3" name="description" placeholder="краткое описание"></textarea><br>
        <input type="submit" value="Добавить">
    </form>
@endsection
