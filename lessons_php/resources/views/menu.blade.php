<li>
    <a class="nav-link {{ request()->routeIs('index')?' active':'' }}" href="{{ route('index') }}">Главная</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('news.index')?' active':'' }}" href="{{ route('news.index') }}">Новости</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('admin.index')?' active':'' }}" href="{{ route('admin.index') }}">Авторизация</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('about')?' active':'' }}" href="{{ route('about') }}">О нас</a>
</li>