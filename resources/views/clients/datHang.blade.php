@extends('layouts.client')
@section('content')
        <section class="blog about-blog footer-padding">
            <div class="container">
                <div class="blog-bradcrum">
                    <span><a href="index-2.html">Home</a></span>
                    <span class="devider">/</span>
                    <span><a href="#">Checkout</a></span>
                </div>
                <div class="blog-item" data-aos="fade-up">
                    <div class="cart-img">
                        <img src="{{ asset('assets/clients/images/homepage-one/empty-cart.webp') }}" alt>
                    </div>
                    <div class="cart-content">
                        <p class="content-title">Đặt Hàng Thành Công</p>
                        <a href="{{route('welcome')}}" class="shop-btn">Back to Shop</a>
                    </div>
                </div>
            </div>
        </section>
@endsection
