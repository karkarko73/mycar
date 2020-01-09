@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{ asset('loginform/images/bg-01.jpg') }});">
                <span class="login100-form-title-1">
                    Sign In
                </span>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf

                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                    <span class="label-input100">Email</span>
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email"
                        name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input id="password" class="input100 @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" type="password" placeholder="Enter password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">

                        <input class="form-check-input input-checkbox100" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="label-checkbox100" for="remember">
                            Remember me
                        </label>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="txt1">
                            Forgot Password?
                        </a>
                        @endif
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
