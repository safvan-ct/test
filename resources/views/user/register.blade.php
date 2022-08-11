@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        form.ps-form--account.ps-tab-root {
            width: 36%;
        }

        @media(max-width:497px) {
            form.ps-form--account.ps-tab-root {
                width: 83%;
            }
        }
    </style>
    <div class="ps-page--my-account">

        <div class="ps-my-account">
            <div class="container">
                <div class="row ps-tab-list ">
                    <div class="col-md-6" style="margin-top: 50px;text-align: end;">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="col-md-6-col" style="margin-top: 50px;"">
                        <a href="{{ route('registerpage') }}" style="color: #f4aa12;">Register</a>
                    </div>
                </div>

                <form class="ps-form--account ps-tab-root" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Register An Account</h5>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Your Phone" pattern="^[0-9]*$" required data-error="Phone" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label>Confirm Password <abbr class="required">*</abbr></label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <center>
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                                        </div>
                                        @error('g-recaptcha-response')
                                            <div class="col-12 text-danger text-center">Captcha verification required
                                            </div>
                                        @enderror
                                    </center>
                                </div> --}}

                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
