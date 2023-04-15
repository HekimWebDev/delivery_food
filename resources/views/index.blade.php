@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <section>
        <div class="container">
            <h2>Рестораны</h2>
            <div class="cards">
                <a href="{{route('restaurant-page')}}">
                    <div class="card-item">
                        <img src="/images/viy.jpg" alt="Вкусно и точка">
                        <h4>Вкусно и точка</h4>
                    </div>
                </a>
                <a href="{{route('restaurant2-page')}}">
                    <div class="card-item">
                        <img src="/images/shoko.png" alt="Шоколадница">
                        <h4>Шоколадница</h4>
                    </div>
                </a>
                <a href="{{route('restaurant3-page')}}">
                    <div class="card-item">
                        <img src="/images/fars.png" alt="Farш">
                        <h4>FARШ</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
