@extends('layout')

@section('title', 'Корзина')

@section('page-content')
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

                    @php $total = 0 @endphp

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
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
                                <td data-th="Price">{{ $details['price'] }} ₽</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}"
                                           class="form-control quantity update-cart"/>
                                </td>
                                <td data-th="Subtotal"
                                    class="text-center">{{ $details['price'] * $details['quantity'] }} ₽
                                </td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-outline-light remove-from-cart">
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
                    @endif
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h3>
                                <strong>Общая сумма {{ $total }} ₽</strong>
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-warning">
                                <i class="fa fa-angle-left"></i>
                                Продолжить покупки
                            </a>
                            <button class="btn btn-success">Оплачивать</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('product.update.cart') }}',
                method: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },

                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('product.remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },

                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endpush
