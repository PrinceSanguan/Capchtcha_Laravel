@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Send Money</h1>
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
                  <th>ID</th>
                  <th>Username</th>
                  <th>Type</th>
                  <th>Points</th>
                  <th>Send Money</th>
                  <th>Deduct points</th>

              </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->id }}</td>
                        <td>{{ $datas->username }}</td>
                        <td>{{ $datas->type }}</td>
                        <td>{{ $datas->point }}</td>
                        <td>
                          <div class="card card-primary">
                            <div class="card-header text-center">
                                <h3 class="card-title">Send Points</h3><br>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('programmer.send_point', ['id' => $datas->id]) }}">
                              @csrf
                              <div class="form-group text-center"><br>
                                <input type="text" name="point" class="form-control" placeholder="Enter Points">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                        </td>
                        <td>
                          <div class="card card-danger">
                            <div class="card-header text-center">
                                <h3 class="card-title">Deduct Points</h3><br>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('programmer.deduct_point', ['id' => $datas->id]) }}">
                              @csrf
                              <div class="form-group text-center"><br>
                                <input type="text" name="point" class="form-control" placeholder="Enter Points">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
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