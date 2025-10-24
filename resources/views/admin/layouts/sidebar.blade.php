<aside class="main-sidebar elevation-4"
  style="background: linear-gradient(180deg, #e8ebf0, #dcd9f3);
         box-shadow: 2px 0 25px rgba(0,0,0,0.08);
         border-radius: 0 15px 15px 0;">

  <!-- Brand Logo -->
  @if(auth()->check() && auth()->user()->role === 'admin')
  <a href="" class="brand-link text-center py-3"
    style="background: rgba(255,255,255,0.4);
           border-bottom: 1px solid rgba(0,0,0,0.05);
           border-radius: 0 15px 0 0;
           text-shadow: 0 1px 2px rgba(0,0,0,0.15);">
    <span class="brand-text fw-bold text-dark">Tjahya Teknik :: Admin</span>
  </a>
  @else
  <a href="" class="brand-link text-center py-3"
    style="background: rgba(255,255,255,0.4);
           border-bottom: 1px solid rgba(0,0,0,0.05);
           border-radius: 0 15px 0 0;
           text-shadow: 0 1px 2px rgba(0,0,0,0.15);">
    <span class="brand-text fw-bold text-dark">Tjahya Teknik</span>
  </a>
  @endif

  <div class="sidebar mt-3">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="/" class="nav-link {{ Request::is('/') ? 'active':'' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Website</p>
          </a>
        </li>

        @if(auth()->check() && auth()->user()->role === 'admin')
        <li class="nav-item">
          <a href="/admin/pesan" class="nav-link {{ Request::is('admin/pesan') ? 'active':'' }}">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Pesan</p>
          </a>
        </li>

        <li class="nav-item {{ Request::is('admin/posts*') ? 'menu-is-opening menu-open':'' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Blog
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/posts/blog" class="nav-link {{ Request::is('admin/posts/blog') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/posts/kategori" class="nav-link {{ Request::is('admin/posts/kategori') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="/admin/about" class="nav-link {{ Request::is('admin/about') ? 'active':'' }}">
            <i class="nav-icon fas fa-calendar"></i>
            <p>About</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/service" class="nav-link {{ Request::is('admin/service') ? 'active':'' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>Services</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/banner" class="nav-link {{ Request::is('admin/banner') ? 'active':'' }}">
            <i class="nav-icon fas fa-image"></i>
            <p>Banner</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/user" class="nav-link {{ Request::is('admin/user') ? 'active':'' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="/bookings" class="nav-link {{ Request::is('bookings') ? 'active':'' }}">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Booking</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>

<style>
  .main-sidebar {
    font-family: 'Poppins', sans-serif;
  }

  /* === NAV LINK === */
  .nav-sidebar .nav-link {
    border-radius: 12px;
    margin: 6px 10px;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.25);
    color: #333;
    position: relative;
  }

  .nav-sidebar .nav-link:hover {
    background: rgba(255, 255, 255, 0.45);
    color: #1a1a24;
    transform: translateX(2px);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
  }

  .nav-sidebar .nav-link.active {
    background: rgba(255, 255, 255, 0.6);
    font-weight: 600;
    color: #2a2a2a;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.08);
  }

  /* === ICON === */
  .nav-sidebar .nav-icon {
    color: #4e4e5b;
    transition: all 0.3s ease;
  }

  .nav-sidebar .nav-link:hover .nav-icon {
    color: #7988a3;
  }

  .nav-treeview .nav-link {
    margin-left: 25px;
    font-size: 0.95rem;
    background: rgba(255, 255, 255, 0.15);
  }

  .nav-treeview .nav-link.active {
    background: rgba(255, 255, 255, 0.25);
    font-weight: 600;
  }

  .brand-link {
    font-size: 1rem;
    letter-spacing: 0.5px;
    color: #2c3e50;
  }
</style>