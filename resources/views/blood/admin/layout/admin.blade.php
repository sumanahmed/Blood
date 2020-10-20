@include('blood.admin.includes.header')
<div class="wrapper">
  @include('blood.admin.includes.navbar')
  @include('blood.admin.includes.sidebar')
  <div class="content-wrapper">
    @yield('content')
  </div>
  <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date('Y'); ?> Blood.</strong> All rights reserved.
  </footer>
  @include('blood.admin.includes.footer')
</div>