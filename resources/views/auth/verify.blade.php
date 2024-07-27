@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.client')
@section('content')
    <section class="login footer-padding">
        <div class="container">
            <div class="login-section">
                <form class="" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="review-form">
                        <h5 class="comment-title">Verify Your Email Address</h5>

                        <div class="review-inner-form ">
                            <div class="review-form-name">
                                <label for="email" class="form-label">Email Address**</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name">
                                <label for="password" class="form-label">Password*</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="address" for="remember">
                                        Remember Me</span>
                                </div>
                                <div class="forget-pass">
                                    <p>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                Forgot Password?
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Log In</button>
                            <span class="shop-account">Dont't have an account ?<a href="{{ route('register') }}">Sign Up
                                    Free</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection --}}


