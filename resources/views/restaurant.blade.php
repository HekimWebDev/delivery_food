@extends('layout')

@section('title', 'Ресторан')

@section('page-content')
    <section>
        <div class="container">
            <h2>Ресторан: Вкусно и точка</h2>
            <div class="dishes">
                <div class="dish-item">
                    <img src="images/img_1.png" alt="Вкусно и точка">
                    <div class="dish-desc">
                        <h4>341 ₽</h4>
                        <p class="dish-name">Биг Хит Большой Комбо</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                <div class="dish-item">
                    <img src="images/img_2.png" alt="Вкусно и точка">
                    <div class="dish-desc">
                        <h4>310 ₽</h4>
                        <p class="dish-name">Биг Спешиал</p>
                        <button type="button" class="btn btn-outline-info">+ Добавить</button>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>
@endsection

