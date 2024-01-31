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
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('images/captcha.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Captcha Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Welcome, Prince Sanguan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-header" style="font-size: 1.2em; color: yellow;">USER</li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              EARNINGS
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-wallet"></i>
            <p>
              TOP UP
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              WITHDRAW
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tv"></i>
            <p>
              SOLVE CAPTCHA
            </p>
          </a>
        </li>

        <li class="nav-header" style="font-size: 1.2em; color: yellow;">SETTINGS</li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              CHANGE PASSWORD
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