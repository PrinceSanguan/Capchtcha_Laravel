@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Player Transactions</h1>
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

    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>

              </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->user->name }}</td>
                        <td>&#8369;{{ $datas->amount }}.00</td>
                        <td>{{ $datas->type }}</td>
                        <td>{{ $datas->created_at->format('F j, Y g:ia') }}</td>
                        <td>{{ $datas->status }}</td>
                        <td>
                          <form method="post" action="{{ route('programmer.transaction_status', ['id' => $datas->id]) }}">
                              @csrf
                              <input type="hidden" name="status" value="approved">
                              <button type="submit" class="btn btn-success" {{ $datas->status === 'approved' ? 'disabled' : '' }}>
                                  Approve
                              </button>
                              
                          </form>
                        </td>
                        <td>
                          <form method="post" action="{{ route('programmer.transaction_status', ['id' => $datas->id]) }}">
                              @csrf
                              <input type="hidden" name="status" value="disapproved">
                              <button type="submit" class="btn btn-danger" {{ $datas->status === 'disapproved' ? 'disabled' : '' }}>
                                  Disapprove
                              </button>
                          </form>
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

@include('programmer.footer')