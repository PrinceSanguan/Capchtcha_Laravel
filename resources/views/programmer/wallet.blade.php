@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trial</h1>
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
                  <th>Remaining Trial</th>
                  <th>Trial Level</th>
                  <th>Action</th>

              </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->name }}</td>
                        <td>{{ $datas->trial }}</td>
                        <td>{{ $datas->trialLevel ? $datas->trialLevel : "Not available" }}</td>
                        <td>

                          <form method="post" action="{{ route('programmer.send_trial', ['id' => $datas->id]) }}">
                            @csrf
                            <div class="form-group text-center">
                                <br>
                                <button type="submit" name="trialLevel" value="1" class="btn {{ $datas->trialLevel === 1 ? 'btn-danger' : 'btn-primary' }}">Level 1</button>
                                <button type="submit" name="trialLevel" value="2" class="btn {{ $datas->trialLevel === 2 ? 'btn-danger' : 'btn-primary' }}">Level 2</button>
                                <button type="submit" name="trialLevel" value="3" class="btn {{ $datas->trialLevel === 3 ? 'btn-danger' : 'btn-primary' }}">Level 3</button>
                                <button type="submit" name="trialLevel" value="4" class="btn {{ $datas->trialLevel === 4 ? 'btn-danger' : 'btn-primary' }}">Level 4</button>
                                <button type="submit" name="trialLevel" value="5" class="btn {{ $datas->trialLevel === 5 ? 'btn-danger' : 'btn-primary' }}">Level 5</button>
                                <button type="submit" name="trialLevel" value="6" class="btn {{ $datas->trialLevel === 6 ? 'btn-danger' : 'btn-primary' }}">Level 6</button>
                            </div>
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