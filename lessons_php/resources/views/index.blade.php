@extends('layouts.main')

@section ('title', 'Главная страница')

@section('menu')
@include('menu')
@endsection

@section('content')

    <a class="nav-link" href={{ route('registration') }}>Регистрация</a><br>

<h1>Главная страница нашего агрегатора новостей</h1>
@endsection
