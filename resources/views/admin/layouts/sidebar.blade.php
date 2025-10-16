<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  @if(auth()->check() && auth()->user()->role === 'admin')
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">Tjahya Teknik :: Admin</span>
  </a>
  @else
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">Tjahya Teknik</span>
  </a>
  @endif
  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <!-- <a href="/" class="nav-link" {{ Request::is('admin/dashboard') ? 'active':'' }}> -->
            <a href="/" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Website
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
        @if(auth()->check() && auth()->user()->role === 'admin')
        <li class="nav-item" {{ Request::is('admin/pesan') ? 'active':'' }}>
          <a href="/admin/pesan" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Pesan
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('admin/posts') ? 'menu-is-opening menu-open':'' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Blog
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/posts/blog" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/posts/kategori" class="nav-link {{Request::is('admin/posts/kategori') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="/admin/about" class="nav-link" {{ Request::is('admin/about') ? 'active':'' }}>
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              About
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/service" class="nav-link" {{ Request::is('admin/service') ? 'active':'' }}>
            <i class="nav-icon fas fa-list"></i>
            <p>
              Services
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/banner" class="nav-link" {{ Request::is('admin/banner') ? 'active':'' }}>
            <i class="nav-icon fas fa-image"></i>
            <p>
              Banner
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/user" class="nav-link  {{ Request::is('admin/user') ? 'active':'' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
        @endif


        <li class="nav-item">
          <a href="/bookings" class="nav-link  {{ Request::is('bookings') ? 'active':'' }}">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>
              Booking
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>