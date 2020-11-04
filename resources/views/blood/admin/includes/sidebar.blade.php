<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link" style="background:#f4f6f9">
      <div class="login-logo"><img style="width: 120px;" src="{{ asset('blood/admin/images/logo.png') }}"/></div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.html" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.donor.index') }}" class="nav-link nav-donor">
              <i class="nav-icon fas fa-users"></i>
              <p>Donor</p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="{{ route('backend.gallery.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Gallery</p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{ route('backend.video.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Video</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-blogs">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>Blogs<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.category.index') }}" class="nav-link nav-category">
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.post.index') }}" class="nav-link nav-post">
                  <p>Posts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.user.index') }}" class="nav-link nav-user">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.faq.index') }}" class="nav-link nav-faq">
              <i class="nav-icon fas fa-users"></i>
              <p>FAQs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.slider.index') }}" class="nav-link nav-slider">
              <i class="nav-icon fas fa-users"></i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.sponsor.index') }}" class="nav-link nav-sponsor">
              <i class="nav-icon fas fa-users"></i>
              <p>Sponsors</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>