@include('agent.header')
@include('agent.navbar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Send Money</h1>
        </div>
      </div>
    </div>
  </div>

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


    <div class="small-box bg-success">
      <div class="inner">
        <h3>&#8369;{{ $userPoints }}.00</h3>
        <p>Current Money</p>
      </div>
      <div class="icon">
        <i class="fas fa-wallet"></i>
      </div>
      <a href="{{route('agent.topup')}}" class="small-box-footer">
        Add money? <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>


  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Username</th>
          <th>Type</th>
          <th>Earnings</th>
          <th>Send Money</th>
        </tr>
      </thead>
      <tbody>
        @if ($data)
          @foreach ($data as $datas)
            <tr>
              <td>{{ $datas->username }}</td>
              <td>{{ $datas->type }}</td>
              <td>&#8369;{{ $datas->point }}.00</td>
              <td>
                <div class="card card-primary">
                  <div class="card-header text-center">
                    <h3 class="card-title">Send Points</h3><br>
                  </div>
                  <form method="post" action="{{ route('agent.send_point', ['id' => $datas->id]) }}">
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
</div>
</div>
</div>
</div>

@include('agent.footer')
