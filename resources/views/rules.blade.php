@extends('layout')

@section('title', 'Условия доставки')

@section('page-content')
    <section>
        <div class="container">
            <div class="page-info">
                <div class="page-info-item">
                    <div class="page-info-item__icon">
                        <img alt="icon" src="/images/clock.svg">
                    </div>
                    <div class="page-info-item__content">
                        <div class="page-info-item__title">Прием заказов</div>
                        <div class="page-info-item__body">
                            <div class="clock__text">
                                <div><span class="">Пн - Чт: &nbsp;</span><span style="white-space: nowrap;">09:00&nbsp;-&nbsp;22:45</span></div>
                                <div><span class="">Пт, Сб: &nbsp;</span><span style="white-space: nowrap;">09:00&nbsp;-&nbsp;23:45</span></div>
                                <div><span class="">Вс: &nbsp;</span><span style="white-space: nowrap;">09:00&nbsp;-&nbsp;22:45</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-info-item">
                    <div class="page-info-item__icon"><img alt="icon" src="/images/clock.svg">
                    </div><div class="page-info-item__content"><div class="page-info-item__title">Часы работы</div>
                        <div class="page-info-item__body"><div class="clock__text"><div><span class="">Пн - Чт: &nbsp;</span><span style="white-space: nowrap;">12:00&nbsp;-&nbsp;22:45</span>
                                </div>
                                <div><span class="">Пт, Сб: &nbsp;</span><span style="white-space: nowrap;">12:00&nbsp;-&nbsp;23:45</span>
                                </div>
                                <div>
                                    <span class="">Вс: &nbsp;</span><span style="white-space: nowrap;">12:00&nbsp;-&nbsp;23:00</span></div>
                            </div>
                        </div>
                    </div>
                </div><div class="page-info-item">
                    <div class="page-info-item__icon1"><img alt="icon" src="/images/map.svg">
                    </div>
                    <div class="page-info-item__content">
                        <div class="page-info-item__title">Стоимость</div>
                        <div class="page-info-item__body">Бесплатная от 500 руб.<br>​​​​​​​Бесплатная в отдаленные районы от 1000 руб.</div>
                    </div>
                </div>
                <div class="page-info-item">
                    <div class="page-info-item__icon1"><img alt="icon" src="/images/card.svg">
                    </div>
                    <div class="page-info-item__content"><div class="page-info-item__title">Оплата</div>
                        <div class="page-info-item__body">Картой, наличными, СБП, Yandex Pay, бонусами</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
