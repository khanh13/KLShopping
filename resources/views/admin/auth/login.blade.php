@extends('admin.admin_layouts')

@section('content')
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <span class="splash-description">Admin KLShopping.</span></div>
            <div class="card-body">
                <form action ="{{ route('admin.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
{{--                <div class="card-footer-item card-footer-item-bordered">--}}
{{--                    <a href="#" class="footer-link">Create An Account</a></div>--}}
{{--                <div class="card-footer-item card-footer-item-bordered">--}}
{{--                    <a href="{{ route('admin.password.request')}}" class="footer-link">Forgot Password</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

@endsection
