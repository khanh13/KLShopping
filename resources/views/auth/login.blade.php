@extends('layouts.app')

@section('content')
    <main class="main">

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{asset('client_assets/assets/images/backgrounds/login-bg.jpg')}})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email-2">Username or email address *</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="singin-email-2" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Password *</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="singin-password-2" name="password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email-2">Full name *</label>
                                        <input type="text" class="form-control" id="" name="name" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email-2">Phone Number *</label>
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email-2">Your email address *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="register-email-2" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Password *</label>
                                        <input type="password" class="form-control" id="register-password-2" name="password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password-2">Confirm password *</label>
                                        <input type="password" class="form-control" id="register-password-2" name="password_confirmation" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                            <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
