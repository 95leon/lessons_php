<li>
    <a class="nav-link {{ request()->routeIs('index')?' active':'' }}" href="{{ route('index') }}">Главная</a>&nbsp
</li>

<li>
    <a class="nav-link {{ request()->routeIs('news.index')?' active':'' }}"
        href="{{ route('news.index') }}">Новости</a>&nbsp
</li>
@auth
<li>
    <a class="nav-link {{ request()->routeIs('registration')?' active':'' }}"
        href="{{ route('admin.index') }}">Администрирование</a>&nbsp
</li>
@endauth

<li>
    <a class="nav-link {{ request()->routeIs('about')?' active':'' }}" href="{{ route('about') }}">О нас</a>
</li>