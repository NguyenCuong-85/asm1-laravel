@extends('layouts.client')
@section('info')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index-2.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Checkout</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>

    <section class="checkout product footer-padding">
        <form action="{{route('checkOut')}}" method="post">
            @csrf
            <div class="container">
                <div class="checkout-section">
                    <div class="row gy-5">
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">
                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Billing Details</h5>
                                    <div class="review-form">
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="fname" class="form-label">Full Name*</label>
                                                <input type="text" id="fname" name="ten_nguoi_nhan" value="{{ Auth::user()->name }}"
                                                    class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email_nguoi_nhan" value="{{ Auth::user()->email }}" id="email"
                                                    class="form-control" placeholder="user@gmail.com">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="phone" class="form-label">Phone*</label>
                                                <input type="tel" name="so_dien_thoai_nguoi_nhan" id="phone" class="form-control"
                                                    placeholder="+880388**0899">
                                            </div>
                                        </div>
                                        <div class="review-form-name address-form">
                                            <label for="address" class="form-label">Address*</label>
                                            <input type="text" id="address" name="dia_chi_nguoi_nhan" class="form-control"
                                                placeholder="Enter your Address">
                                        </div>
                                        <div class="review-textarea">
                                            <label for="floatingTextarea">Note</label>
                                            <textarea class="form-control" placeholder="Write note..........."
                                                id="floatingTextarea" name="ghi_chu" rows="3"></textarea>
                                        </div>
                                        <div class="review-form-name shipping">
                                            <h5 class="wrapper-heading">Shipping Address</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">
                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Order Summary</h5>
                                    <div class="order-summery">
                                        <div class="subtotal product-total">
                                            <h5 class="wrapper-heading">PRODUCT</h5>
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                        </div>
                                        <hr>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                @foreach ($cartItems as $item)
                                                    <li>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading">{{ $item->name }} x
                                                                {{ $item->quantity }}</h5>
                                                            <p class="paragraph">Biến thể: trống</p>
                                                        </div>
                                                        <div class="price">
                                                            <h5 class="wrapper-heading">
                                                                {{ $item->getPriceSum() }}
                                                            </h5>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="subtotal total">
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                            <h5 class="wrapper-heading price">{{ Cart::getTotal() }}</h5>
                                        </div>
                                        <div class="subtotal payment-type">
                                            <div class="checkbox-item">
                                                <input type="radio" id="bank" value="Internet banking" name="phuong_thuc_thanh_toan">
                                                <div class="bank">
                                                    <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                                    <p class="paragraph">Make your payment directly into our bank account.
                                                        Please use
                                                        <span class="inner-text">
                                                            your Order ID as the payment reference.
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="radio" id="cash" value="Sip COD" name="phuong_thuc_thanh_toan">
                                                <div class="cash">
                                                    <h5 class="wrapper-heading">Cash on Delivery</h5>
                                                </div>
                                            </div>
                    
                                        </div>
                                        <button type="submit" class="shop-btn">Place Order Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
