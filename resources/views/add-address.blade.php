@extends('layout')

@section('title', 'Добавить адрес')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
                    <h2>Добавить адрес</h2>
                    <form action="" method="post" style="width: 520px" class="row g-3 needs-validation authorization">
                        <div class="col-md-12">
                            <label for="address" class="form-label">Адрес</label>
                            <input autofocus type="text" name="address" id="address" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                ошибка
                            </div>
                        </div>
                        <div class="address-form">
                            <div class="col-md-3">
                                <label for="apart" class="form-label">Кв/Офис</label>
                                <input type="text" name="apart" class="form-control @error('password') is-invalid @enderror" id="apart" required>
                                <div class="invalid-feedback">
                                    ошибка
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="entrance" class="form-label">Подъезд</label>
                                <input type="text" name="entrance" class="form-control @error('password') is-invalid @enderror" id="entrance" required>
                                <div class="invalid-feedback">
                                    ошибка
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="floor" class="form-label">Этаж</label>
                                <input type="text" name="floor" class="form-control @error('password') is-invalid @enderror" id="floor" required>
                                <div class="invalid-feedback">
                                    ошибка
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">
                            <button type="submit" class="btn btn-outline-info">+ Добавить</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
