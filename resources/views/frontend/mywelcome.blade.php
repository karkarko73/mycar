<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('regna/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('regna/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Google Fonts -->
  <link href="{{ asset('regna/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700') }}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('regna/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('regna/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('regna/lib/animate/animate.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('regna/css/style.css') }}" rel="stylesheet">


</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">View Products</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('admin/post') }}">Home</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
          </li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to Car Sharing Group</h1>
      <a href="#about" class="btn-get-started">Let's see what we have!</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    {{------------------------------------- card area start ----------------------------------}}
    <section id="about">

    @yield('content')

    </section>
    {{------------------------------------- card area end ----------------------------------}}

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Services</h3>
          <p class="section-description">You can buy or sell your cars by posting with our site.This website is use by million of users in Myanmar.</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
              <h4 class="title"><a href="">For more information</a></h4>
                <p class="description">
                    <p class="fa fa-envelope">karkarko73@example.com</p><br>
                    <p class="fa fa-phone">09693533352</p>
                </p>
            </div>
          </div>

      </div>
    </section><!-- #services -->>





    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Web Development</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('regna/download1.png') }}" alt=""></div>
              <h4>S M H</h4>
              <span>Laravel Developer</span>
              <div class="social">
                <a href="https://web.facebook.com/soemin.htut.940"><i class="fa fa-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
          <p class="section-description">Join us and discuss what you want!</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Hledan</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>karkarko73@example.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>09693533352</p>
              </div>
            </div>

          </div>


        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('regna/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('regna/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('regna/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('regna/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('regna/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('regna/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('regna/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('regna/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('regna/lib/superfish/superfish.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('regna/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('regna/js/main.js') }}"></script>

</body>
</html>
