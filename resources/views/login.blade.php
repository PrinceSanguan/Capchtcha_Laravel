<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    	<!-- Include the link to the favicon.ico file -->
	<link rel="icon" href="{{ asset('captcha.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{ asset('captcha.ico') }}" type="image/x-icon">

     <!-- Open Graph meta tags -->
 <meta property="og:title" content="Captcha | Earn Money" />
 <meta property="og:image" content="{{ asset('images/captcha.jpg') }}" />
 <meta property="og:url" content="http://princecarolwedding.free.nf/" />
 <meta property="og:site_name" content="Captcha | Earn Money" />
 <meta property="og:description" content="Captcha | Earn Money" />

    <title>Captcha | Earn Money</title>
  </head>
  <body>

  @if(session('success'))
    <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 2000); // (2 seconds)
    </script>
 @endif
    
    <div class="page d-flex justify-content-center">
    <div class="container bg-light">
      <div class="row main-row">
        <div class="col-md-6 d-flex main-svg">
          <img class="svg-img" src="{{asset('assests/captcha.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex main-content">
          <div class="row">
            <div class="col-md-11">
              <div class="mb-4">
              <h2 class="display-3 text-center">Earn Money<span style="color: #AD50A7;">!</span></h2>
              <p class="mb-4">You need to <strong class="text-dark">Approved</strong> to access this website. If you don't have an account you can <a href="{{route('signin')}}"><strong>Sign Up</strong></a>.</p>
            </div>


            <form action="{{route('login')}}" method="post">
              @csrf

              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
                  @error('username')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <input type="submit" value="Log In" class="btn text-white btn-block">
              
            </form>

            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>

  </body>
</html>
