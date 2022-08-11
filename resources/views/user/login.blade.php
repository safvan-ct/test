@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <style>
        form.ps-form--account.ps-tab-root {
            width: 36%;
        }

        @media(max-width:497px) {
            .ps-tab-list {
                margin-left: 69px;
                margin-right: 44px;
            }

            form.ps-form--account.ps-tab-root {
                width: 58%;
            }

            .col-md-6-col a {
                top: -87px;
            }

            .ps-form__content {
                margin-top: -81px;
            }
        }
    </style>
    <div class="ps-page--my-account">

        <div class="ps-my-account">
            <div class="container">
                <div class="row ps-tab-list ">
                    <div class="col-md-6" style="margin-top: 50px;text-align: end;">
                        <a href="{{ route('login') }}" style="color: #f4aa12;">Login</a>
                    </div>
                    <div class="col-md-6-col" style="margin-top: 50px;">
                        <a href="{{ route('registerpage') }}">Register</a>
                    </div>
                </div>
                <form class="ps-form--account ps-tab-root" action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="ps-tabs">

                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Log In Your Account</h5>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class=" align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12 lost-your-password-wrap">
                                        <a href="{{ route('password.request') }}" class="lost-your-password">Lost your
                                            password?</a>
                                    </div>
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth" id="login" name="login">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
