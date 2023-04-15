@extends('layout')

@section('title', 'Авторизация')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
                    <h2>Авторизация</h2>
                    @if(session('status'))
                        <p style="font-weight: bold; color: #56c3c3;">Пароль был успешно изменён!</p>
                    @endif
                    <form action="{{route('login')}}" method="post" style="width: 520px" class="row g-3 needs-validation authorization">
                        @csrf
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{old('email')}}" autofocus type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">
                            <button type="submit" class="btn btn-outline-info">Войти</button>
                            <a href="{{route('password-page')}}" style="font-weight: bold; color: #56c3c3;" class="btn-reset">Забыли пароль?</a>
                        </div>
                    </form>
                    <h5 style="margin-top: 80px">У вас ещё нет аккаунта? <a style="margin-left: 85px" class="btn btn-outline-info" href="{{route('signup-page')}}">Зарегистрироваться</a></h5>
                </div>
            </section>
        </div>
    </section>
@endsection
