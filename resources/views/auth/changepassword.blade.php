@extends('layouts.app')

@section('content')
    <main class="main">

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('client_assets/assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Change Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email-2">Old Password</label>
                                        <input type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" id="" name="oldpass" required autofocus>
                                        @if ($errors->has('oldpass'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                        @endif
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">Password *</label>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="register-password-2" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password-2">Confirm password *</label>
                                        <input type="password" class="form-control" id="register-password-2" name="password_confirmation" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>{{ __('Reset Password') }}</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>


                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
