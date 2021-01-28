<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link" style="background:#f4f6f9">
      <div class="login-logo"><img style="width: 120px;" src="{{ asset('blood/frontend/images/logo.png') }}"/></div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="nav-link nav-dashboard">
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
            <a href="{{ route('backend.profile') }}" class="nav-link nav-profile">
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
            <a href="{{ route('backend.ambulance.index') }}" class="nav-link nav-ambulance">
              <i class="nav-icon fas fa-users"></i>
              <p>Ambulances</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('backend.symptom.index') }}" class="nav-link nav-symptom">
              <i class="nav-icon fas fa-users"></i>
              <p>Symptom</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.doctor.index') }}" class="nav-link nav-medicine">
              <i class="nav-icon fas fa-users"></i>
              <p>Doctor</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.medicine.index') }}" class="nav-link nav-medicine">
              <i class="nav-icon fas fa-users"></i>
              <p>Medicines</p>
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
          <li class="nav-item">
            <a href="{{ route('backend.campaign.index') }}" class="nav-link nav-campaign">
              <i class="nav-icon fas fa-users"></i>
              <p>Campaign</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-setting">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.division.index') }}" class="nav-link nav-division">
                  <p>Division</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.district.index') }}" class="nav-link nav-post">
                  <p>District</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.thana.index') }}" class="nav-link nav-thana">
                  <p>Thana</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>