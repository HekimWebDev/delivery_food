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
                                        <input x-model="payMethod" id="credit" name="status" type="radio"
                                               class="form-check-input"
                                               checked value="0" required>
                                        <label class="form-check-label" for="credit">Наличными курьеру</label>
                                    </div>
                                    <div class="form-check">
                                        <input x-model="payMethod" id="debit" name="status" type="radio"
                                               class="form-check-input"
                                               value="1" required>
                                        <label class="form-check-label" for="debit">По карте курьеру</label>
                                    </div>
                                    <div class="form-check">
                                        <input x-model="payMethod" id="paypal" name="status" type="radio"
                                               class="form-check-input"
                                               value="2" required>
                                        <label class="form-check-label" for="paypal">По карте online</label>
                                    </div>
                                </div>

                                <div x-show="payMethod == 2" x-transition.duration.500ms class="row gy-3">
                                    <div class="col-12">
                                        <label for="cart_number" class="form-label">Номер карты</label>

                                        <input class="form-control" id="cart_number" name="cart_number"
                                               value="{{ old('cart_number') }}" inputmode="text"
                                               data-inputmask-alias="9999-9999-9999-9999">

                                        @error("cart_number")
                                        <label id="cart_number"
                                               class="error invalid-feedback"
                                               for="cart_number">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cart_deadline" class="form-label">MM/ГГ</label>

                                        <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'"
                                               id="cart_deadline" name="cart_deadline"
                                               data-inputmask-inputformat="mm/yy" inputmode="numeric"
                                               value="{{ old('cart_deadline') }}">

                                        @error("cart_deadline")
                                        <label id="cart_deadline"
                                               class="error invalid-feedback"
                                               for="cart_deadline">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cvc_code" class="form-label">CVV/CVC</label>

                                        <input class="form-control" id="cvc_code" name="cvc_code"
                                               type="password" data-inputmask-alias="999" inputmode="text"
                                               value="{{ old('cvc_code') }}">

                                        @error("cvc_code")
                                        <label id="cvc_code"
                                               class="error invalid-feedback"
                                               for="cvc_code">
                                            {{ $message }}
                                        </label>
                                        @enderror

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

    @push('scripts')
        <script src="{{ asset('assets/lib/inputmask/jquery.inputmask.min.js') }}"></script>

        <script>
            (function ($) {
                'use strict';

                $(":input").inputmask();

            })(jQuery);
        </script>
    @endpush
@endsection
