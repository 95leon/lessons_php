<li>
    <a class="nav-link {{ request()->routeIs('index')?' active':'' }}" href="{{ route('index') }}">Главная</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('admin.index')?' active':'' }}" href="{{ route('admin.index') }}">Авторизация</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('admin.create')?' active':'' }}" href="{{ route('admin.create') }}">Добавление новости</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('news.index')?' active':'' }}" href="{{ route('news.index') }}">Новости</a>
</li>