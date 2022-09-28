@extends('layouts.main')

@section('title', 'Авторизация')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница авторизации</h1>
    <form>
        <h4>Авторизация</h4>
        <input style="margin-bottom: 3px;" type="text" name="login" placeholder="ваш логин"><br>
        <input style="margin-bottom: 3px;" type="password" name="password" placeholder="введите пароль"><br>
        <label><input style="margin-bottom: 3px;" type="checkbox" name="check">запомнить меня</label><br>
        <input type="submit" value="Войти">
    </form>
@endsection
