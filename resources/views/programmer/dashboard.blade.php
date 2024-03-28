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

  <!-- Referral Link Card -->
  <div class="col-md-6">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Referral Link</h3>
        </div>
        <div class="card-body">
            <p>Share your unique referral link to earn more!</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="referralLink" value="{{ $referralLink }}" readonly>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="copyReferralLink()">Copy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------Pending Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-blue">
    <div class="inner">
      <h3>{{ $pendingAccounts }}</h3>

      <p>Pending Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Pending Account---------------------------------------------->

<!--------------------------------Total Player Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3>{{ $totalPlayerAccounts }}</h3>

      <p>Total Player Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!--------------------------------Total Player Account---------------------------------------------->

<!--------------------------------Points---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ $totalPoints }}</h3>

      <p>Total Points Circulated</p>
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

@include('programmer.footer')