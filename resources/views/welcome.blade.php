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
    <!-- slider section -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Crypto <br />
                      Captcha
                    </h1>
                    <p>
                      Crypto Captcha is a digital security mechanism, 
                      combining cryptographic challenges with user verification, 
                      ensuring secure access to online platforms.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/slider-img.png')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Easy <br />
                      Money
                    </h1>
                    <p>
                      A Crypto Captcha is an innovative authentication 
                      method employing cryptographic puzzles to verify 
                      user identity, enhancing online security measures.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/slider-img.png')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Unlimited <br />
                      Income
                    </h1>
                    <p>
                      In the digital realm, Crypto Captcha stands as a safeguard, 
                      employing cryptographic puzzles to authenticate users and 
                      protect online systems from unauthorized access.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('index/images/slider-img.png')}}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li
            data-target="#customCarousel1"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Our <span>Services</span></h2>
          <p>
            At Crypto Captcha, our services revolve around 
            enhancing online security through innovative cryptographic 
            solutions. We provide a seamless integration of captivating 
            captchas, blending user engagement with robust authentication.
          </p>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s1.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Currency Wallet</h5>
                <p>
                  At Crypto Captcha, our services are centered around 
                  fortifying online security through cutting-edge cryptographic 
                  solutions. In addition to our captivating captcha authentication, 
                  we provide seamless integration with currency wallets. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s2.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Security Storage</h5>
                <p>
                  At Crypto Captcha, our commitment to security 
                  extends to our innovative 'Security Storage' feature. 
                  With military-grade encryption, our storage solutions
                  offer a fortress for your digital assets.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/s3.png')}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>Expert Support</h5>
                <p>
                  At Crypto Captcha, we take pride in offering unparalleled 
                  expert support to our users. Our dedicated team of experts 
                  stands ready to provide personalized assistance and guidance 
                  on all aspects of our services.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>About <span>Us</span></h2>
        <p>
          Embark on a journey with Crypto Captcha, where unlocking 
          financial opportunities is as simple as engaging with captivating puzzles. 
          Answer each captivating captcha and watch as your earnings flourish effortlessly
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{asset('index/images/about-img.png')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>Crypto Captcha</h3>
            <p>
              Step into the world of Crypto Captcha, where unlocking financial 
              potential is a delightful experience. By responding to engaging 
              captchas, you effortlessly earn money, transforming each interaction 
              into a rewarding opportunity. 
            </p>
            <p>
              Embrace the seamless fusion of fun and finance, as every puzzle you 
              solve contributes to your flourishing earnings. Join us on this captivating 
              journey, where simplicity meets prosperity, making each captcha not just a 
              challenge, but a pathway to financial fulfillment.
            </p>
            <a href=""> Read More </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Why Choose <span>Us</span></h2>
      </div>
      <div class="why_container">
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w1.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Expert Management</h5>
            <p>
              Our commitment to excellence extends to our 
              'Expert Management' services. Entrust your cryptographic journey 
              to our seasoned professionals who skillfully navigate the dynamic 
              landscape of digital security. 
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w2.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Secure Investment</h5>
            <p>
              Our platform seamlessly integrates cutting-edge cryptographic solutions, 
              offering a fortress of protection for your online interactions.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w3.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Instant Trading</h5>
            <p>
              We redefine convenience with our groundbreaking 'Instant Trading' feature. 
              Seamlessly integrated into our platform, this service allows users to execute 
              cryptocurrency trades swiftly and effortlessly.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('index/images/w4.png')}}" alt="" />
          </div>
          <div class="detail-box">
            <h5>Happy Customers</h5>
            <p>
              We prioritize user experience through seamless captchas,
               secure currency wallets, and expert support, ensuring a delightful 
               journey in the crypto realm. Our dedication to customer happiness 
               goes beyond just functionality — it's about creating a trusted 
               community where every interaction is rewarding.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end why section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>What says our <span>Client</span></h2>
      </div>
      <div class="carousel-wrap">
        <div class="owl-carousel client_owl-carousel">

          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/client1.jpg')}}" alt="" class="box-img" />
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>Tinoy</h6>
                    <p>Student</p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Malaking tulong sa akin itong captcha na ito. Dahil dito natustusan ko ang
                  aking pag aaral at nakabili ng mga gamit na kailangan sa school. Subukan nyo din
                  at para kumita kayo.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('index/images/client2.jpg')}}" alt="" class="box-img" />
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>Rica</h6>
                    <p>Single mom</p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Malaking tulong ito sa aming anak dahil dito nakakuha ako 
                  ng panggatas ng hndi ko kailangan humingi ng tulong ng iba. 
                  Sa bahay lang at walang hassle.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

 

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

    {{-- <a href="{{route('auth.login')}}">Login</a> --}}




