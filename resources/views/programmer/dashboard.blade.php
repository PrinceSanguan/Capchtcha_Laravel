@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Programmer Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
<div class="row">
<!--------------------------------Total User---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3>1</h3>

      <p>Total Players</p>
    </div>
    <div class="icon">
      <i class="fas fa-user"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Total User---------------------------------------------->

<!--------------------------------Total Agent---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>2</h3>

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

<!--------------------------------Total Operator---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3>3</h3>

      <p>Total Operator</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-secret"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Total Operator---------------------------------------------->

<!--------------------------------Wallet---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>1</h3>

      <p>Wallet</p>
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Wallet---------------------------------------------->
</div>
    </div>
    <!-------------------------------------------------------------------------------------- Main content -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('include.footer')