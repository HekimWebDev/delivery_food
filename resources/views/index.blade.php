@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <section>
        <div class="container">
            <h2>Все Продукты</h2>
            <div class="cards">
                @foreach($products as $product)
                    <a href="{{ route('product.detail', $product ) }}">
                        <div class="card-item">
                            <img class="mx-auto" width="400" src="{{asset('storage/'.$product->image)}}"
                                 alt="{{$product->name}}">
                            <h4>{{$product->name}}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>

        <div class="container">
            <h2>Рестораны</h2>
            <div class="cards">
                <a href="{{route('restaurant-page')}}">
                    <div class="card-item">
                        <img src="{{ asset('/assets/front/images/viy.jpg') }}" alt="Вкусно и точка">
                        <h4>Вкусно и точка</h4>
                    </div>
                </a>
                <a href="{{route('restaurant2-page')}}">
                    <div class="card-item">
                        <img src="{{ asset('/assets/front/images/shoko.png') }}" alt="Шоколадница">
                        <h4>Шоколадница</h4>
                    </div>
                </a>
                <a href="{{route('restaurant3-page')}}">
                    <div class="card-item">
                        <img src="{{ asset('/assets/front/images/fars.png') }}" alt="Farш">
                        <h4>FARШ</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
