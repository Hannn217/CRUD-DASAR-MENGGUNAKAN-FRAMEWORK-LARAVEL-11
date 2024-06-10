 <!-- Brand Logo -->
 <a href="/" class="brand-link">
    <span class="brand-text font-weight-light">Gallery</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->username }}</a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Main Menu</li>
        <li class="nav-item">
          <a href="/home" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/berita" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Berita
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->