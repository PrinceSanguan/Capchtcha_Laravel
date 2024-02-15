@include('agent.header')
@include('agent.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agent Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container mt-3">
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

            <!-- Total Players Card -->
            <div class="col-md-3">
                <div class="card bg-info">
                    <div class="card-body">
                        <h2 class="card-title">My Referred Players</h2>
                        <h3 class="card-text">{{ $totalPlayers }}</h3>  
                    </div>
                    <div class="card-footer">
                        <a href="{{route('agent.player')}}" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Total Earnings Card -->
            <div class="col-md-3">
              <div class="card bg-success">
                  <div class="card-body">
                      <h2 class="card-title">My Total Earnings</h2>
                      <h3 class="card-text">&#8369;{{ $currentEarnings }}.00</h3>  
                  </div>
              </div>
          </div>

        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
</div>

@include('include.footer')
