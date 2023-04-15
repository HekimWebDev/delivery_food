@extends('layout')

@section('title', 'Регистрация')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
                    <h2>Регистрация</h2>
                    <form action="{{route('sign-up')}}" method="post" style="width: 520px" class="row g-3 needs-validation authorization" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Имя</label>
                            <input value="{{old('name')}}" autofocus type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="surname" class="form-label">Фамилия</label>
                            <input value="{{old('surname')}}" autofocus type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" required>
                            @error('surname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="number" class="form-label">Номер телефона</label>
                            <input value="{{old('number')}}" autofocus type="tel" name="number" id="number" class="form-control @error('number') is-invalid @enderror" required>
                            @error('number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
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
                        <div class="col-md-12">
                            <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">
                            <button type="submit" class="btn btn-outline-info">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection

