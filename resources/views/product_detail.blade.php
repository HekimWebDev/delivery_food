@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <section>
        <div class="container">
            <h2>{{$product->name}}</h2>
            <div class="cards">

                    <a href="#">
                        <div class="card-item">
                            <img style="width: 50px; height: 50px;" src="{{url('storage/'.$product->image)}}" alt="{{$product->name}}">
                            <h4>{{$product->price}}</h4>
                            <h4>{{$product->description}}</h4>
                        </div>
                    </a>

            </div>
        </div>

    </section>
@endsection