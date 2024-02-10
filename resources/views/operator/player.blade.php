@include('operator.header')
@include('operator.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Player</h1>
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
                <th>Username</th>
                <th>Email</th>
                <th>Points</th>
                <th>Type</th>
                <th>Referred By</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->username }}</td>
                        <td>{{ $datas->email }}</td>
                        <td>{{ $datas->point }}</td>
                        <td>{{ $datas->type }}</td>
                        <td>
                            @if ($datas->referredBy)
                                {{ $datas->referredBy->name }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $datas->created_at->format('F j, Y g:ia') }}</td>
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

@include('include.footer')