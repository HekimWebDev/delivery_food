@extends('layout')

@section('title', 'Корзина')

@section('page-content')
    <section>
        <div class="container">
            <h2>Корзина</h2>
            <div class="goods">
                <div class="good-item">
                    <img src="/images/img_1.png" alt="Вкусно и точка">
                    <div class="good-desc">
                        <p class="dish-name">Биг Хит Большой Комбо</p>
                        <h4>341 ₽</h4>
                        <button type="button" class="btn btn-outline-info">Удалить</button>
                    </div>
                </div>
                <div class="good-item">
                    <img src="/images/img_1.png" alt="Вкусно и точка">
                    <div class="good-desc">
                        <p class="dish-name">Биг Хит Большой Комбо</p>
                        <h4>341 ₽</h4>
                        <button type="button" class="btn btn-outline-info">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="pay-cart">
                <h4>682 ₽</h4>
                <a href="{{route('pay-page')}}" class="btn btn-outline-info">Перейти к оплате</a>
            </div>
        </div>
    </section>
@endsection
