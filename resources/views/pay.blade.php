@extends('layout')

@section('title', 'Оплата заказа')

@section('page-content')
    <section>
        <div class="container">
            <section>
                <div class="container-fluid container-content">
                    <h2>Оплата заказа</h2>
                    <form action="" method="post" style="width: 520px" class="row g-3 needs-validation authorization">
                        <div class="col-md-12">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Наличными курьеру
                            </label>
                        </div> <div class="col-md-12">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                По карте курьеру
                            </label>
                        </div>
                        <div class="col-md-12">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                По карте online
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label for="card_number" class="form-label">Номер карты</label>
                            <input autofocus type="text" name="card_number" id="card_number" class="form-control @error('email') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                ошибка
                            </div>
                        </div>
                        <div class="pay-form">
                            <div class="col-md-3">
                                <label for="date" class="form-label">MM/ГГ</label>
                                <input type="text" name="date" class="form-control @error('password') is-invalid @enderror" id="date" required>
                                <div class="invalid-feedback">
                                    ошибка
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cvv" class="form-label">CVV/CVC</label>
                                <input type="text" name="cvv" class="form-control @error('password') is-invalid @enderror" id="cvv" required>
                                <div class="invalid-feedback">
                                    ошибка
                                </div>
                            </div>
                        </div>
                        <div class="pay-order">
                            <h4>682 ₽</h4>
                            <button type="button" class="btn btn-outline-info">Оплатить</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
