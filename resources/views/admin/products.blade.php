<a class="nav-link" href="{{route('main-page')}}">Главная</a>

Все Продукты

<a class="nav-link" href="{{route('admin_products_new')}}">Добавить Продукты</a>

@foreach($products as $prod)
    <h1>{{$prod->name}}</h1>
@endforeach