@extends('layouts.client')
@section('content')
    @if (isset($cartItems))
        <section class="blog about-blog">
            <div class="container">
                <div class="blog-bradcrum">
                    <span><a href="index-2.html">Home</a></span>
                    <span class="devider">/</span>
                    <span><a href="#">Cart</a></span>
                </div>
                <div class="blog-heading about-heading">
                    <h1 class="heading">Cart</h1>
                </div>
            </div>
        </section>
        <section class="product-cart product footer-padding">
            <form action="{{ route('proceedToCheckout') }}" method="post">
                @csrf
                <div class="container">
                    <div class="cart-section">
                        <table>
                            <tbody>
                                <tr class="table-row table-top-row">
                                    <td class="table-wrapper wrapper-product">
                                        <h5 class="table-heading">PRODUCT</h5>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">PRICE</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">QUANTITY</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper wrapper-total">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">TOTAL</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">ACTION</h5>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($cartItems as $item)
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ Storage::url($item->image) }}" alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">{{ $item->name }}</h5>
                                                    <input type="hidden" name="id[]" value="{{ $item->id }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">{{ $item->price }}</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <div class="quantity">
                                                    <span class="number">
                                                        <input class="quantity" data-id="{{ $item->id }}" min="1"
                                                            type="number" name="so_luong[]" value="{{ $item->quantity }}"
                                                            id="">
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading item-total">{{ $item->getPriceSum() }} </h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <span>
                                                    <button type="button" class="remove-from-cart shop-btn"
                                                        data-id="{{ $item->id }}">Xóa</button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="wishlist-btn cart-btn" style="justify-content: space-between">
                        <div>
                            {{-- <a href="empty-cart.html" class="update-btn shop-btn">Clear Cart</a> --}}
                            <button type="submit" class="shop-btn">Proceed to Checkout</button>
                        </div>
                        <div>
                            <p class="shop-btn">Total Amount:<span id="cart-total">{{ Cart::getTotal() }}</span></p>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.quantity').on('change', function() {
                    var id = $(this).data('id');
                    var quantity = $(this).val();
                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '{{ route('update.cart') }}',
                        method: 'POST',
                        data: {
                            _token: token,
                            id: id,
                            quantity: quantity
                        },
                        success: function(response) {
                            if (response.success) {
                                $('input[data-id="' + id + '"]').closest('tr').find('.item-total')
                                    .text(response.itemTotal);
                                $('#cart-total').text(response.cartTotal);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });

            // Xóa sản phẩm khỏi giỏ hàng
            $('.remove-from-cart').on('click', function() {
                var id = $(this).data('id');
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            $('button[data-id="' + id + '"]').closest('tr').remove();
                            $('#cart-total').text(response.cartTotal);

                            if (response.cartIsEmpty) {
                                location.reload(); // Reload lại trang khi giỏ hàng trống
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        </script>
    @else
        <section class="blog about-blog footer-padding">
            <div class="container">
                <div class="blog-bradcrum">
                    <span><a href="index-2.html">Home</a></span>
                    <span class="devider">/</span>
                    <span><a href="#">Cart</a></span>
                </div>
                <div class="blog-item" data-aos="fade-up">
                    <div class="cart-img">
                        <img src="{{ asset('assets/clients/images/homepage-one/empty-cart.webp') }}" alt>
                    </div>
                    <div class="cart-content">
                        <p class="content-title">Empty! You don’t Cart any Products </p>
                        <a href="product-sidebar.html" class="shop-btn">Back to Shop</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
