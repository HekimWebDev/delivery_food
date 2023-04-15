@extends('layout')

@section('title', 'Профиль')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container">
                    <h2>Профиль пользователя</h2>
                    <div class="profile">
                        <h3>Сергей Сергеев</h3>
                        <p>8-912-345-67-89</p>
                        <p>sergey@gmail.com</p>
                        <a href="{{route('edit-page')}}" class="btn btn-outline-info">Редактировать профиль</a>
                    </div>
                    <div class="address">
                        <div class="address-item">
                            <p class="dish-name">Проспект вернадского, 43, кв 29</p>
                            <button type="button" class="btn btn-outline-info">Удалить</button>
                        </div>
                        <a href="{{route('address-page')}}" class="btn btn-outline-info">+ Добавить адрес доставки</a>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
