@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{ asset('loginform/images/bg-01.jpg') }});">
                <span class="login100-form-title-1">
                    Register
                </span>
            </div>

            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Name</span>

                    <input class="input100 @error('name') is-invalid @enderror" id="name" type="text"
                        value="{{ old('name') }}" required autocomplete="email" autofocus type="text" name="name"
                        placeholder="Enter name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>

                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus name="email"
                        placeholder="Enter email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Phone No</span>

                    <input class="input100 @error('email') is-invalid @enderror" id="phone" type="number"
                        value="{{ old('phone') }}" name="phone" placeholder="Enter Phone Number">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Password</span>

                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password"
                        value="{{ old('email') }}" name="password" placeholder="Enter Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Confirm Password</span>

                    <input class="input100 @error('password-confirm') is-invalid @enderror" id="password-confirm"
                        name="password_confirmation" required autocomplete="new-password" type="password"
                        placeholder="Enter Confirm Password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
