<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- login form link start --}}

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginform/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginform/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginform/css/main.css') }}">

    {{-- login form link end --}}


    <style>
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #2dc997;
            border-color: #2dc997;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loginform/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('loginform/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginform/js/main.js') }}"></script>
</body>

</html>
