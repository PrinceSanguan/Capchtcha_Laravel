@include('operator.header')
@include('operator.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Operator Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
<div class="row">

<!--------------------------------Total Players---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ $totalPlayers }}</h3>

      <p>Pending Referral</p>
    </div>
    <div class="icon">
      <i class="fas fa-user"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Total Players---------------------------------------------->

<!--------------------------------Total Agent---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3>{{ $totalAgents }}</h3>

      <p>Total Agent</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-nurse"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Total Agent---------------------------------------------->

<!--------------------------------Points---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ $currentPoints }}</h3>

      <p>Total Points</p>
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Points---------------------------------------------->
</div>
    </div>
    <!-------------------------------------------------------------------------------------- Main content -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')