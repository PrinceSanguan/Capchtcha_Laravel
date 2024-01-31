@include('include.header')
@include('include.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Profile</h1>
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

          <h3 class="profile-username text-center">Prince E. Sanguan</h3>

          <p class="text-muted text-center">Welder</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Username</b> <a class="float-right">princesanguan44</a>
            </li>
            <li class="list-group-item">
              <b>Email Address</b> <a class="float-right">princesanguan24</a>
            </li>
            <li class="list-group-item">
              <b>Gcash Number</b> <a class="float-right">09473808046</a>
            </li>
            <li class="list-group-item">
              <b>Address</b> <a class="float-right">Mandaluyong City</a>
            </li>
            <li class="list-group-item">
              <b>Gender</b> <a class="float-right">Male</a>
            </li>
          </ul>

          {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
        </div>
        <!-- /.card-body -->
      </div>

    </div>
    <!-------------------------------------------------------------------------------------- Main content -->
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')
