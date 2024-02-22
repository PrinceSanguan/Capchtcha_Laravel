@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Player Account</h1>
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
              <th>Username</th>
              <th>Name</th>
              <th>Earnings</th>
              <th>Account type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                      <td>{{ $datas->username }}</td>
                      <td>{{ $datas->name }}</td>
                      <td>&#8369;{{ $datas->point }}.00</td>

                      <td>{{ $datas->account }}</td>
                        <td>
                          <form method="post" action="{{ route('programmer.update.level', ['id' => $datas->id]) }}">
                            @csrf
                            <button type="submit" name="account" value="{{ $datas->account === 'regular' ? 'premium' : 'regular' }}" class="btn {{ $datas->account === 'regular' ? 'btn-danger' : 'btn-success' }}">
                                {{ $datas->account === 'regular' ? 'Premium' : 'Regular' }}
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