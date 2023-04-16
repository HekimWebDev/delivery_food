@extends('layout')

@section('title', 'Главная')

@push('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        .card {
            background-color: #fff;
            padding: 14px;
            border: none
        }

        .demo {
            width: 100%
        }

        img {
            display: block;
            height: auto;
            width: 100%
        }

        hr {
            color: #d4d4d4
        }

        .btn-long {
            padding-left: 35px;
            padding-right: 35px
        }

        .buttons {
            margin-top: 15px
        }

        .buttons .btn {
            height: 46px
        }

        .buttons .cart {
            border-color: #ff7676;
            color: #ff7676
        }

        .buttons .cart:hover {
            background-color: #e86464 !important;
            color: #fff
        }

    </style>
@endpush

@section('page-content')
    <div class="container-fluid mt-2 mx-4 pt-4">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <img src="{{ asset('storage/'.$product->image) }}"/>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="about">
                        <h4 class="">{{ $product->name }}</h4>
                        <h4 class="font-weight-bold">{{ $product->price  }} ₽</h4>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('product.add.to.cart', $product->id) }}" class="btn btn-outline-warning btn-long cart">
                            Добавить в корзину
                        </a>
                        <hr>
                        <div class="product-description">
                            <div class="mt-2">
                                <h5 class="font-weight-bold">Description</h5>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
