
@extends('layouts.app')

@section('title', 'About')

@section('content')
        <!-- Start Page Title Area -->
        <section class="page-title-area page-title-bg1">
            <div class="container">
                <div class="page-title-content">
                    <h1 title="MY ACCOUNT">MY ACCOUNT</h1>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Profile Authentication Area -->
        <section class="profile-authentication-area ptb-100">
            <div class="container">
                <div class="row" style="padding-left: 30%;">
                    <div class="col-lg-6 col-md-12">
                        <center><div class="login-form">
                            <h2>Reset Password</h2>





                            <form method="post" action="{{ route('user.update') }}">
                                @csrf
                                {{-- <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"   class="form-control" id="password1m22" placeholder="Password" name="password" type="text" pattern=".{8,}"   required title="8 characters minimum" required autocomplete="off" onKeyUp="myFunctionclm22()" required"></br>
                                 <input type="password"   class="form-control" id="confirm_password1m22" placeholder="Conform Password" name="cpassword" required type="text" pattern=".{8,}"   required title="8 characters minimum" required autocomplete="off" onKeyUp="myFunctioncon122()">

								 <div id="mmmmm22"></div>
								</div> --}}

                                <div class="form-group">
                                    <div class="col-12 learts-mb-30">
                                        <label>Current password</label>
                                        <input type="password"  class="form-control" name="current_password"
                                            autocomplete="new-password">
                                        @error('current_password')<span
                                            class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-12 learts-mb-30">
                                        <label>New password</label>
                                        <input type="password"  class="form-control" autocomplete="new-password"
                                            name="password">
                                        @error('password')<span
                                            class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-12 learts-mb-30">
                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control" autocomplete="new-password"
                                            name="password_confirmation">
                                    </div>
                                </div>


                                <button  name="forgot" type="submit">Submit</button>
                            </form>



                        </div></center>
                    </div>


                </div>
            </div>
        </section>
  @endsection
