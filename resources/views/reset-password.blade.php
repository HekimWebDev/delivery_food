@extends('layout')

@section('title', 'Сбросить пароль')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
        <form style="width: 500px; margin-top: 50px;" action="{{route('password.update')}}" method="post" novalidate>
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">
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
            <button style="margin-top: 50px;" type="submit" class="btn btn-outline-info">Сбросить пароль</button>
        </form>
    </div>
    </section>
    </div>
    </section>
@endsection
