<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('index/css/bootstrap.css')}}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"/>

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="{{asset('index/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('index/css/style.css')}}" rel="stylesheet" />

    <!-- responsive style -->
    <link href="{{asset('index/css/responsive.css')}}" rel="stylesheet" />

    <!-- Include the link to the favicon.ico file -->
    <link rel="icon" href="{{ asset('captcha.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('captcha.ico') }}" type="image/x-icon">

     <!-- Open Graph meta tags -->
     <meta property="og:title" content="Captcha | Earn Money" />
     <meta property="og:image" content="{{ asset('images/cap.png') }}" />
     <meta property="og:url" content="http://captcha.free.nf/" />
     <meta property="og:site_name" content="Captcha | Earn Money" />
     <meta property="og:description" content="Captcha | Earn Money" />

    <title>Captcha | Earn Money</title>
</head>

<body>

  <div class="hero_area">

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span> Crypto Captcha </span>
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href=""
                  >Home <span class="sr-only"></span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="why.html">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('auth.login')}}">
                  <i class="fa fa-user" aria-hidden="true"></i> Login</a
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

      <!-- Solving Captcha section -->

      <section class="client_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2 style="color: white">Practice Solving <span>Captcha</span></h2>
          </div>
          <div>

            <form id="captchaForm" method="post" action="{{ route('update.points') }}">
              @csrf
              <div class="card-body d-flex flex-column align-items-center">
                <span style="display: inline-block;">{!! captcha_img('inverseIndex') !!}</span>
              </div>
      
              <div class="input-wrapper" style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                <input type="text" class="form-input" placeholder="Enter Captcha" name="captcha" required>
              </div><br>
              <!-- /.card-body -->
      
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      
          <div class="small-box inner text-center">
            <p style="font-size: 1.5em; color: white ;">Total Income</p>
            <h3 style="color: white;">&#8369;0.00</h3>
          </div>

        </div>
      </section>
      
  
    <!-- end Solving Captcha section -->

     <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; All Rights Reserved By 2024
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="{{asset('index/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
  ></script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{asset('index/js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  ></script>
  <!-- custom js -->
  <script type="text/javascript" src="{{asset('index/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>
</html>
</body>