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
    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="{{asset('index/images/hero-bg.png')}}" alt="" />
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{route('welcome')}}">
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
                <a class="nav-link" href="{{route('welcome')}}"
                  >Home <span class="sr-only"></span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('services')}}">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('why.us')}}">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('practice')}}">Practice</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('signin')}}">
                  <i class="fa fa-user" aria-hidden="true"></i> Sign in</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('auth.login')}}">
                  <i class="fa fa-key" aria-hidden="true"></i> Login</a
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->