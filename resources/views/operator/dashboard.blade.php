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
                            <input type="text" class="form-control" id="referralLink" value="https://yourwebsite.com/referral/user123" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" onclick="copyReferralLink()">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Players Card -->
            <div class="col-md-3">
                <div class="card bg-success">
                    <div class="card-body">
                        <h3 class="card-title">{{ $totalPlayers }}</h3>
                        <p class="card-text">My Players</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Total Agents Card -->
            <div class="col-md-3">
                <div class="card bg-info">
                    <div class="card-body">
                        <h3 class="card-title">{{ $totalAgents }}</h3>
                        <p class="card-text">My Agents</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
</div>

@include('include.footer')