<div>
    <section>
        <div class="container">
            <h2>Корзина</h2>
            <div class="goods">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:50%">Продукт</th>
                        <th style="width:10%">Цена</th>
                        <th style="width:8%">Количество</th>
                        <th style="width:22%" class="text-center">Промежуточный итог</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($this->cart ?? []))
                        @foreach($cart as $id => $details)
                            {{--                            @php $total += $details['price'] * $details['quantity'] @endphp--}}
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="{{ asset('storage/' . $details['image']) }}" width="150"
                                                 class="img-responsive"/>
                                        </div>

                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $details['price'] }} ₽</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button wire:click="decrement({{ $id }})"
                                           @disabled( $details['quantity'] == 0 )
                                           class="btn btn-sm btn-outline-danger rounded-5">-</button>

                                        <span>{{ $details['quantity'] }}</span>

                                        <button wire:click="increment({{ $id }})"
                                           @disabled( ($details['stock'] - $details['quantity']) == 0 )
                                           class="btn btn-sm btn-outline-primary rounded-5">+</button>
                                    </div>
                                </td>
                                <td data-th="Subtotal"
                                    class="text-center">{{ $details['price'] * $details['quantity'] }} ₽
                                </td>
                                <td class="actions" data-th="">
                                    <button wire:click="remove({{ $id }})" class="btn btn-outline-light remove-from-cart">
                                        <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16"
                                             height="16"
                                             fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                                                fill="red"></path>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                                  fill="red"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-warning">
                            <h2>У вас нет товаров</h2>
                        </div>
                    @endif
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h3>
                                <strong>Общая сумма {{ $totalAllProduct }} ₽</strong>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-warning">
                                <i class="fa fa-angle-left"></i>
                                Продолжить покупки
                            </a>
                            <a href="{{ route('order-create') }}" class="btn btn-success {{ empty($cart) ? 'disabled' : '' }}">
                                Оплачивать
                            </a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
