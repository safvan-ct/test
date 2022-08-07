@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    form.ps-form--account.ps-tab-root {
    width: 36%;
}
@media(max-width:497px){
    .ps-tab-list {
        margin-left: 69px;
    margin-right: 44px;
    }
   form.ps-form--account.ps-tab-root {
    width: 58%;
}
    .col-md-6-col  a{
        top:-87px;
    }
    .ps-form__content{
        margin-top:-81px;
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
            {{-- <ul class="ps-tab-list">
                <li class="active"></li>
                <li></li>
            </ul> --}}
            <form class="ps-form--account ps-tab-root" action="{{ route('login') }}" method="post">
                @csrf

                <div class="ps-tabs">

                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Log In Your Account</h5>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"  name="email" class="form-control" placeholder="Email">
                                @error('email')<span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')<span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class=" align-items-center">
                               <!-- <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                    <p>
                                        <input type="checkbox" id="test2">
                                        <label for="test2">Remember me</label>
                                    </p>
                                </div>-->

                                <div class="col-lg-12 col-md-12 col-sm-12 lost-your-password-wrap">
                                    <a href="{{ route('password.request') }}" class="lost-your-password">Lost your password?</a>
                                </div>
                            </div>


                            {{-- <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me" />
                                    <label for="remember-me">Rememeber me</label>
                                </div>
                            </div> --}}
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth" id="login" name="login">Login</button>
                            </div>
                        </div>
                    <!--    <div class="ps-form__footer">-->
                    <!--        <p>Connect with:</p>-->
                    <!--        <ul class="ps-list--social">-->
                    <!--            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
                    <!--            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                    <!--            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
                    <!--            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                </form>
                {{-- <form class="ps-form--account ps-tab-root" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="ps-tab" id="register">
                        <div class="ps-form__content">
                            <h5>Register An Account</h5>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required  value="{{ old('email') }}">

                                @error('email')<span class="text-danger">{{ $message }}</span>
                                @enderror    </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>

                                @error('password')<span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>

                             <div  class="form-group">
                              <input type="password" class="form-control"  placeholder=" Confirm Password" name="password_confirmation" required>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                                <center>
                                <script src='https://www.google.com/recaptcha/api.js'></script>
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}" ></div>
                                @error('g-recaptcha-response')
                                    <div class="col-12 text-danger text-center">Captcha verification required
                                    </div>
                                @enderror
                            </center>
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Login</button>
                            </div>
                        </div>
                        <div class="ps-form__footer">
                            <p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </form> --}}
        </div>
    </div>
</div>


{{--
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <!-- Start Profile Authentication Area -->
    <section class="profile-authentication-area ptb-100" style="padding: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="login-form">
                        <h2>Login</h2>

                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"  name="email" class="form-control" placeholder="Email">
                                @error('email')<span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @error('password')<span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class=" align-items-center">
                               <!-- <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                    <p>
                                        <input type="checkbox" id="test2">
                                        <label for="test2">Remember me</label>
                                    </p>
                                </div>-->

                                <div class="col-lg-12 col-md-12 col-sm-12 lost-your-password-wrap">
                                    <a href="{{ route('password.request') }}" class="lost-your-password">Lost your password?</a>
                                </div>
                            </div>

                           <center> <button  name="login"  style="padding: 10px 20px 10px 20px; background: black;color: white;
                            border-radius: 16%;"  class="btn-send-contact" type="submit">Log In</button></center>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="register-form">
                        <h2>Register</h2>

                        <form method="post" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}">

                                @error('name')<span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required  value="{{ old('email') }}">

                                @error('email')<span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>

                                    @error('password')<span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">

                                <label>Confirm Password <abbr class="required">*</abbr></label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                                <center>
                                <script src='https://www.google.com/recaptcha/api.js'></script>
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}" ></div>
                                @error('g-recaptcha-response')
                                    <div class="col-12 text-danger text-center">Captcha verification required
                                    </div>
                                @enderror
                            </center>
                            </div>

                            <center>
                            <button name="register" style="margin-top: 8px; padding: 10px 20px 10px 20px; background: black; color: white;border-radius: 16%;"  class="btn-send-contact"  type="submit">Register</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
