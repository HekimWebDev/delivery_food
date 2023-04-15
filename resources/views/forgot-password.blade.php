@extends('layout')

@section('title', 'Забыл пароль')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
        <form style="width: 500px; margin-top: 50px;" action="{{route('password')}}" method="post" novalidate>
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
            <div class="col-12" style="margin-top: 50px;">
                <button type="submit" class="btn btn-outline-info">Отправить</button>
            </div>
        </form>
        @if(session('status'))
            <p style="font-weight: bold; color: #56c3c3;">Письмо для сброса пароля отправлено на почту!</p>
        @endif
    </div>
    </section>
    </div>
    </section>
@endsection
