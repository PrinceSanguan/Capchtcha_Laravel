@include('player.header')
@include('player.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transactions</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!----------------------------------------------- Main content -------------------------------------->
    @if(session('success'))
    <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
    @endif 
    
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Amount</th>
              <th>Type</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @if ($transaction)
                @foreach ($transaction as $transactions)
                    <tr>
                      <td>&#8369;{{ $transactions->amount }}.00</td>
                      <td>{{ ucfirst($transactions->type) }}</td>
                      <td>{{ $transactions->created_at->format('F j, Y g:ia') }}</td>

                      <td>
                        @if($transactions->status === 'pending')
                            <span class="btn btn-warning no-hover" style="pointer-events: none;">{{ ucfirst($transactions->status) }}</span>
                        @elseif($transactions->status === 'approved')
                            <span class="btn btn-success no-hover" style="pointer-events: none;">{{ ucfirst($transactions->status) }}</span>
                        @elseif($transactions->status === 'disapproved')
                            <span class="btn btn-danger no-hover" style="pointer-events: none;">{{ ucfirst($transactions->status) }}</span>
                        @else
                            {{ ucfirst($transactions->status) }}
                        @endif
                    </td>

                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
  </div>
    
    <!----------------------------------------------- Main content -------------------------------------->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  @include('player.footer')