@extends('layout')

@section('title', 'Ресторан')

@section('page-content')
    <section>
        <div class="container">
            <h2>Ресторан: FARШ</h2>
            <div class="dishes">
                <div class="dish-item">
                    <img src="images/Farsh1.png" alt="FARШ">
                    <div class="dish-desc">
                        <h4>499 ₽</h4>
                        <p class="dish-name">Брянский сет лайт</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/Farsh2.png" alt="FARШ">
                    <div class="dish-desc">
                        <h4>799 ₽</h4>
                        <p class="dish-name">Каппл сет</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/Farsh3.png" alt="Шоколадница">
                    <div class="dish-desc">
                        <h4>1349 ₽</h4>
                        <p class="dish-name">Бомбический сет</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/Farsh4.png" alt="Шоколадница">
                    <div class="dish-desc">
                        <h4>1249 ₽</h4>
                        <p class="dish-name">Биг Чиз Сет</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
