<header>
    <div class="container">
        <div class="header">
            <a class="navbar-brand" href="{{route('main-page')}}"><img class="header-img" src="/images/logo.png" alt="logo"></a>
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>Москва</a>
            <a class="nav-link" href="{{route('main-page')}}">Рестораны</a>
            <a class="nav-link" href="{{route('rules-page')}}">Условия доставки</a>
            <a class="nav-link">+7 (343) 298-00-44</a>
            @if(Auth()->user())
                <a class="nav-link" href="{{route('admin_categories')}}">Категории</a>
{{--                <a class="nav-link" href="{{route('admin_products')}}">Продукты</a>--}}
                <a class="nav-link" href="{{route('profile-page')}}">Профиль</a>
                <a class="nav-link" href="{{route('logout')}}">Выйти</a>
            @else
                <a class="nav-link" href="{{route('login-page')}}">Вход</a>
            @endif
            <a class="nav-link" href="{{route('cart-page')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>Корзина</a>
        </div>
    </div>
</header>
<header>
    <div class="container">
        <div class="header category">
            <a class="nav-link" href="#">Роллы/Суши</a>
            <a class="nav-link" href="#">Бургеры</a>
            <a class="nav-link" href="#">Пицца</a>
            <a class="nav-link" href="#">Грузинская кухня</a>
            <a class="nav-link" href="#">Шаурма</a>
            <a class="nav-link" href="#">Шашлык</a>
            <a class="nav-link" href="#">Десерты</a>
        </div>
    </div>
</header>
