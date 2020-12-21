<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            @if( Auth::user()->image != null)
              <img src="{{ asset(Auth::user()->image) }}" class="img-circle" style="height: 30px;" alt="User Image">
            @else
              <img src="{{ asset('blood/admin/images/avatar.png') }}" class="img-circle" style="height: 30px;" alt="User Image">
            @endif
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right mt-3">
          <div class="dropdown-divider"></div>
          <a href="{{ route('backend.user.edit', Auth::user()->id) }}" class="dropdown-item">
            <i class="fas fa-user-edit mr-2"></i> Edit Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
            <form id="logoutForm" action="{{ route('backend.admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </a>
      </li>
    </ul>
</nav>