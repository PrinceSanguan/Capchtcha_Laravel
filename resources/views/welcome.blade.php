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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"/>

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

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


<a href="{{route('auth.login')}}">Login</a>