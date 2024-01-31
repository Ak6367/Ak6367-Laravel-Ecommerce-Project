@extends('layouts.fronted')

@section('fronted')
<div class="content">
    <section class="breadcrumb-option">
<ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb__text">
            <h4>Login</h4>
            <div class="breadcrumb__links">
                <a href="index.html">Home</a>
                <span>Login</span>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- Breadcrumb Section End -->

<section class="register-page spad-70">
<div class="container">
<div class="row create-an-account">
    <div class="col-md-12">
         <form method="POST" action="{{ route('login') }}">
             @csrf
            <h2>Sign IN</h2>
            <div class="form-group">
                <label>Your Email Address </label>
                <input type="email" id="email_main"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" {{ old('email') }} placeholder="Enter email" autofocus/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group">
                <label>Your Password</label>
                <input type="password" id="password_main" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autofocus/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn product__btn signin_btn w-100 save" >Sign IN</button>
              <div class="already-btnRegisterPage text-center">
                <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
              </div>

              <div class="col-md-12 text-center">
                <a href="https://www.facebook.com/v3.3/dialog/oauth?client_id=1764025217293855&amp;redirect_uri=https%3A%2F%2Fvinaikajaipur.com%2Flogin%2Ffacebook%2Fcallback&amp;scope=email&amp;response_type=code&amp;state=eDC6dCJAeRQFvbCpfuwMIIs8fyCzWZEETG2RKdHX" class="btn btn-social btnfb"><i class="fa fa-facebook-f"></i> <span class="divider"></span> Login with Facebook</a>
                <a href="https://accounts.google.com/o/oauth2/auth?client_id=997285346866-p2st47ok3jv0nr61vna7ra2otjs7u0uv.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Fvinaikajaipur.com%2Flogin%2Fgoogle%2Fcallback&amp;scope=openid+profile+email&amp;response_type=code&amp;state=3qjr5ZqDLXxN6cZ7unJUVm17dvWsAuJWS9SnTOCP" class="btn btn-social btn-gmail"><i class="fa fa-google"></i> <span class="divider"></span> Login with Google</a>
             </div>

        </form>
    </div>
</div>
</div>
</section>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title ?? "" }} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($route)
                        <form method="POST" action="{{ $route }}">
                    @else
                        <form method="POST" action="{{ route('login') }}">
                    @endisset
                    
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection