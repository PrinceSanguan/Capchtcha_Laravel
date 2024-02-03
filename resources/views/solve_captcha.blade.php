@include('include.header')
@include('include.navbar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Solve Captcha</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!---------------------------------------------- Main content ------------------------------------------------------------->
  <div class="content">

     <!-- Profile Image -->
     <div class="card card-primary card-outline">
      <div class="card-body box-profile">

  <!------------------------------------Image--------------------------------------------------------------->
  <div class="card card-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info">
      <h3 class="widget-user-username">{{ $users->name }}</h3>
      <h5 class="widget-user-desc">{{ $users->work }}</h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle elevation-2" src="{{asset('upload-profile/' . $users->image)}}" alt="User Avatar">
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-4 border-right">
          <div class="description-block">

          </div>
          <!-- /.description-block -->
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>

  <div class="card card-primary">
    <div class="card-header text-center">
        <h3 class="card-title">Captcha</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('update.points')}}">
        @csrf
        <div class="card-body d-flex flex-column align-items-center">
            <span style="display: inline-block;">{!! captcha_img('math') !!}</span>
        </div>

        <div class="input-wrapper" style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
          <input type="text" class="form-input" placeholder="Enter Captcha" name="captcha" required>
        </div>
        <!-- /.card-body -->

        <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

  <div class="small-box bg-warning">
    <div class="inner">
      <h3>{{$users->point}} Points</h3>

      <p style="font-size: 1.5em;">Total Points</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-plus"></i>
    </div>
  </div>
  <!-------------------------------------------------------------------------------------- Main content -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-wrapper -->

    @include('include.footer')