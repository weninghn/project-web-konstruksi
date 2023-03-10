  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">PT Madyang Konstruksi</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user') }}" class="nav-link">
              <i class="fas fa-user-alt" aria-hidden="true"></i>
              <p>
                  User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/client" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Client
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/project" class="nav-link">
              <i class="fas fa-file"></i>
              <p>
                Project
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="/offer" class="nav-link">
              <i class="fas fa-file-invoice-dollar"></i>
              <p>
                Penawaran
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="/bill" class="nav-link">
              <i class="fas fa-file-invoice-dollar"></i>
              <p>
                Tagihan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/payment" class="nav-link">
              <i class="fa fa-credit-card"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/progres" class="nav-link">
              <i class="fas fa-hourglass-half"></i>
              <p>
                Progress
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="nav-link">
              <i class="fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>