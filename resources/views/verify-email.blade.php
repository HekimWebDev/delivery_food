@extends('layout')

@section('title', 'Регистрация')

@section('page-content')
    <section>
        <div class="container-fluid container-content">
            <h2 class="heading-secondary">Потверждение адресса электронной почты</h2>
            @if(session('message'))
                <p style="font-weight: bold; color: #7a4c8f;">{{session('message')}}</p>
            @endif
            <form style="margin-top: 0;" action="{{route('verification.send')}}" method="post" class="row g-3 needs-validation authorization">
                @csrf
                <button type="submit" class="btn btn-outline-info">Отправить</button>
            </form>
        </div>
    </section>
@endsection
