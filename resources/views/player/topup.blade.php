@include('player.header')
@include('player.navbar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Make your account Premium</h1>
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

  @if(session('error'))
  <div id="error-alert" class="alert alert-danger" style="font-size: 18px; padding: 20px;">
      {{ session('error') }}
  </div>
  <script>
      setTimeout(function() {
          document.getElementById('error-alert').style.display = 'none';
      }, 5000);
  </script>
@endif


<!-- general form elements -->
<div class="card card-primary text-center">
  <div class="card-header">
    <h3 class="card-title">Cash in Here!</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form method="post" action="{{route('topupSuccess')}}">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label>Gcash Number</label>
        <input type="text" class="form-control mx-auto" value="09351234234" disabled>
      </div>

      <div class="form-group">
        <label>Name on the Gcash</label>
        <input type="text" class="form-control mx-auto" value="CAROL C." disabled>
      </div>
    </div>

    <div class="form-group">
      <label>Need to Topup</label>
      <input type="text" class="form-control mx-auto" value="120 pesos" disabled>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Already Done</button>
    </div>
  </form>
</div>
<!-- /.card -->
  <!-------------------------------------------------------------------------------------- Main content -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-wrapper -->

    @include('player.footer')