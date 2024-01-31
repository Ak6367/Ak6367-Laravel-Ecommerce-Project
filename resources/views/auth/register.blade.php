@extends('layouts.fronted')

@section('fronted')
<div class="content">
    <!-- Breadcrumb Section Begin -->
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
                <h4>Create Account</h4>
                <div class="breadcrumb__links">
                    <a href="index-2.html">Home</a>
                    <span>Create Account</span>
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
             <form method="POST" id="form" action="{{ route('register') }}">
                @csrf
                <h2>REGISTER WITH VINAIKA</h2>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Your Email Address </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Your Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Enter Password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Enter Password" />
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn product__btn signin_btn w-100 save" >Create an account</button>
                  <div class="already-btnRegisterPage text-center">
                    <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
                  </div>
            </form>
        </div>
    </div>
</div>
</section>
</div>
@endsection