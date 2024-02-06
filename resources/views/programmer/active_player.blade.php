@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Active Player</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!----------------------------------------------- Main content -------------------------------------->
      
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
            <th>Reason</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-success">Approved</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>219</td>
            <td>Alexander Pierce</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-warning">Pending</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>657</td>
            <td>Bob Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-primary">Approved</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
          <tr>
            <td>175</td>
            <td>Mike Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-danger">Denied</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr>
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