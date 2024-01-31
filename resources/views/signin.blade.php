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
 <meta property="og:image" content="{{ asset('images/captcha.png') }}" />
 <meta property="og:url" content="http://princecarolwedding.free.nf/" />
 <meta property="og:site_name" content="Captcha | Earn Money" />
 <meta property="og:description" content="Captcha | Earn Money" />

    <title>Captcha | Earn Money</title>
  </head>
  <body>
    
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
              <p class="mb-4">You need to <strong class="text-dark">Approved</strong> to access this website. If you successfully approved <a href="{{route('login')}}"><strong>Log in </strong></a>Here.</p>
            </div>

            <form action="{{route('signin.form')}}" method="post">
              @csrf

              <div class="form-group">
                <label for="username">Unique Username</label>
                <input type="text" class="form-control" name="username" required>
                  @error('username')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="Complete_name">Complete Name</label>
                <input type="text" class="form-control" name="name" required>
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password">Retype Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
                  @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password">Gcash Number</label>
                <input type="text" class="form-control" name="number" required>
                  @error('number')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <input type="submit" value="Sign In" class="btn text-white btn-block">

            </form>

            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>

  </body>
</html>
