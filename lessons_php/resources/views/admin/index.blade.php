@extends('layouts.main')

@section('title', 'Авторизация')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
<div>
    <h1>Страница авторизации</h1>
    <form>
        <h4>Авторизация</h4>
        <input class="mb-1" type="text" name="login" placeholder="ваш логин"><br>
        <input class="mb-1" type="password" name="password" placeholder="введите пароль"><br>
        <label><input class="form-check-input mb-1" type="checkbox" name="check">запомнить меня</label><br>
        <input class="btn btn-primary" type="submit" value="Войти">
    </form>
</div>
@endsection
