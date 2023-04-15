@extends('layout')

@section('title', 'Редактировать профиль')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
                    <h2>Редактировать профиль</h2>
                    <form action="" method="post" style="width: 520px" class="row g-3 needs-validation authorization">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Имя</label>
                            <input autofocus type="text" name="name" id="name" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                ошибка
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="surname" class="form-label">Фамилия</label>
                            <input autofocus type="text" name="surname" id="surname" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                ошибка
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="number" class="form-label">Номер телефона</label>
                            <input autofocus type="tel" name="number" id="number" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                ошибка
                            </div>
                        </div>
                        <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">
                            <button type="button" class="btn btn-outline-info">Сохранить</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
