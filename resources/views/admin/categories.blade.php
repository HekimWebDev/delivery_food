<a class="nav-link" href="{{route('main-page')}}">Главная</a>

Все Категории

<a class="nav-link" href="{{route('admin_categories_new')}}">Добавить Категории</a>

@foreach($categories as $cat)
<h1>{{$cat->name}}</h1>
    @endforeach