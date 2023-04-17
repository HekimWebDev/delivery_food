@extends('layout')

@section('title', 'Оплата заказа')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="row g-5 my-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Ваша корзина</span>
                            <span class="badge bg-primary rounded-pill">{{ count(session('cart')) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @php $total = 0 @endphp

                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp

                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">{{ $details['name'] }}</h6>
                                    </div>
                                    <span class="text-muted">{{ $details['price'] }} ₽</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Общая сумма </span>
                                <strong>{{ $total }} ₽</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Адрес для выставления счета</h4>
                        <form class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <x-forms.input type="text"
                                                   error="first_name"
                                                   name="Имя"
                                                   property="first_name">
                                    </x-forms.input>
                                </div>

                                <div class="col-sm-6">
                                    <x-forms.input type="text"
                                                   error="last_name"
                                                   name="Фамилия"
                                                   property="last_name">
                                    </x-forms.input>
                                </div>

                                <div class="col-12">
                                    <x-forms.input type="email"
                                                   error="email"
                                                   name="Электронная почта"
                                                   property="email">
                                    </x-forms.input>
                                </div>

                                <div class="col-12">
                                    <x-forms.input type="text"
                                                   error="address"
                                                   name="Адрес"
                                                   property="address">
                                    </x-forms.input>
                                </div>

                                <div class="col-md-5">
                                    <x-forms.input type="text"
                                                   error="label"
                                                   name="Кв/Офис"
                                                   property="label">
                                    </x-forms.input>
                                </div>

                                <div class="col-md-4">
                                    <x-forms.input type="text"
                                                   error="entrance"
                                                   name="Подъезд"
                                                   property="entrance">
                                    </x-forms.input>
                                </div>

                                <div class="col-md-3">
                                    <x-forms.input type="text"
                                                   error="floor"
                                                   name="Этаж"
                                                   property="floor">
                                    </x-forms.input>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Оплата</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                           checked="" required="">
                                    <label class="form-check-label" for="credit">Наличными курьеру</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                           required="">
                                    <label class="form-check-label" for="debit">По карте курьеру</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                           required="">
                                    <label class="form-check-label" for="paypal">По карте online</label>
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-12">
                                    <label for="cc-name" class="form-label">Номер карты</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-expiration" class="form-label">MM/ГГ</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                           required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-cvv" class="form-label">CVV/CVC</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Оплатить</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
