<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="{{ asset('images/captcha.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Programmer</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<!--------------------------------image---------------------------------------------------------------->
      <div class="image">
         <img src=" {{asset('upload-profile/' . $users->image)}}" class="img-circle elevation-2" alt="User Image">
      </div>
<!----------------------------Image--------------------------------------------------------------------->
      <div class="info">
        <a href="{{route('programmer.dashboard')}}" class="d-block"> {{ $users->name }} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-header" style="font-size: 1.2em; color: yellow;">ACTIVE USER</li>

      <li class="nav-item menu-open" style="margin-bottom: 10px;">
        <a href="{{route('programmer.all_account')}}" class="nav-link">
          <i class="nav-icon fas fa-users fa-spin"></i>
          <p>
            ALL ACCOUNT
          </p>
        </a>
      </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{route('programmer.player')}}" class="nav-link">
            <i class="nav-icon fas fa-user fa-spin"></i>
            <p>
              PLAYERS
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{route('programmer.agent')}}" class="nav-link">
            <i class="nav-icon fas fa-user-nurse fa-spin"></i>
            <p>
              AGENT
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-user-secret fa-spin"></i>
            <p>
              OPERATOR
            </p>
          </a>
        </li>

        <li class="nav-header" style="font-size: 1.2em; color: yellow;">MONEY</li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-wallet fa-spin"></i>
            <p>
              WALLET
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{route('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt fa-spin"></i>
            <p>
              LOGOUT
            </p>
          </a>
        </li>

      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>