@extends('layout')

@section('title', 'Ресторан')

@section('page-content')
    <section>
        <div class="container">
            <h2>Ресторан: Шоколадница</h2>
            <div class="dishes">
                <div class="dish-item">
                    <img src="images/choko1.png" alt="Шоколадница">
                    <div class="dish-desc">
                        <h4>599 ₽</h4>
                        <p class="dish-name">Фирменное комбо с пастой</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/choko2.png" alt="Шоколадница">
                    <div class="dish-desc">
                        <h4>377 ₽</h4>
                        <p class="dish-name">Завтрак с омлетом и кофе</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/choko3.png" alt="Шоколадница">
                    <div class="dish-desc">
                        <h4>421 ₽</h4>
                        <p class="dish-name">Обед классика</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/choko4.png" alt="Вкусно и точка">
                    <div class="dish-desc">
                        <h4>569 ₽</h4>
                        <p class="dish-name">Ужин классика</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
