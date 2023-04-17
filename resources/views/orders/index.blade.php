@extends('layout')

@section('title', 'Оплата заказа')

@push('styles')
    <script defer src="{{ asset('assets/lib/alpine_js/alpine.js') }}"></script>
@endpush

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
                        <form action="{{ route('order-store') }}" method="POST">
                            @csrf

                            <x-forms.validation_error/>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <input type="hidden" name="total_price" value="{{ $total }}">

                                    <x-forms.input type="text"
                                                   error="name"
                                                   name="Имя"
                                                   property="name">
                                    </x-forms.input>
                                </div>

                                <div class="col-sm-6">
                                    <x-forms.input type="text"
                                                   error="surname"
                                                   name="Фамилия"
                                                   property="surname">
                                    </x-forms.input>
                                </div>

                                <div class="col-6">
                                    <x-forms.input type="email"
                                                   error="email"
                                                   name="Электронная почта"
                                                   property="email">
                                    </x-forms.input>
                                </div>

                                <div class="col-6">
                                    <x-forms.input type="phone"
                                                   error="phone"
                                                   name="Номер телефона"
                                                   property="phone">
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

                            <div x-data="{ payMethod: 0}">
                                <div class="my-3">
                                    <div class="form-check">
                                        <input x-model="payMethod" id="credit" name="status" type="radio" class="form-check-input"
                                               checked value="0" required>
                                        <label class="form-check-label" for="credit">Наличными курьеру</label>
                                    </div>
                                    <div class="form-check">
                                        <input x-model="payMethod" id="debit" name="status" type="radio" class="form-check-input"
                                               value="1" required>
                                        <label class="form-check-label" for="debit">По карте курьеру</label>
                                    </div>
                                    <div class="form-check">
                                        <input x-model="payMethod" id="paypal" name="status" type="radio" class="form-check-input"
                                               value="2" required>
                                        <label class="form-check-label" for="paypal">По карте online</label>
                                    </div>
                                </div>

                                <div x-show="payMethod != 2" x-transition.duration.500ms class="row gy-3">
                                    <div class="col-12">
                                        <x-forms.input type="number"
                                                       error="cart_number"
                                                       name="Номер карты"
                                                       property="cart_number">
                                        </x-forms.input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-forms.input type="text"
                                                       error="cart_deadline"
                                                       name="MM/ГГ"
                                                       property="cart_deadline">
                                        </x-forms.input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-forms.input type="number"
                                                       error="cvc_code"
                                                       name="CVV/CVC"
                                                       property="cvc_code">
                                        </x-forms.input>
                                    </div>
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
