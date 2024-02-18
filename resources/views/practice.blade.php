@include('header')

      <!-- Solving Captcha section -->

      <section class="client_section layout_padding text-center">
        <div class="container">
            <img src="{{asset('index/images/cashin.gif')}}" alt="" class="img-fluid" />
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2 style="color: white">Practice Solving <span>Captcha</span></h2>
            </div>
          <div>

            <form method="post" action="{{ route('practice.solve') }}">
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
            <h3 style="color: white;">&#8369;{{ number_format(session('totalIncome', request()->cookie('totalIncome', 0.00)), 2) }}</h3>
          </div>

          @if(session('success'))
          <div class="alert alert-success mt-3">
              {{ session('success') }}
          </div>
          @endif
  
          @if(session('error'))
          <div class="alert alert-danger mt-3">
              {{ session('error') }}
          </div>
          @endif

      </section>

      
  
    <!-- end Solving Captcha section -->

@include('footer')