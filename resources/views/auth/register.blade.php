@extends('layouts.client')
@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <h5 class="comment-title">Create Account</h5>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="fname" class="form-label">Full Name*</label>
                                <input type="text" id="fname" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="First Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="user@gmail.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="password" class="form-label">Password*</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password_confirmation" class="form-label">Confirm Password*</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Create an Account</button>
                            <span class="shop-account">Already have an account ?<a href="{{route('login')}}">Log In</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
