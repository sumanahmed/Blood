
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/all.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/icheck-bootstrap.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/toastr.css') }}">
</head>
<body class="hold-transition login-page" style="height:75vh;background:#CFD8DC;">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo"><img style="width: 120px;margin: 10px 82px;" src="{{ asset('blood/frontend/images/logo.png') }}"/></div>
      <p class="login-box-msg">LOGIN PANEL</p>
      <form action="{{ route('backend.admin.signin') }}" method="POST" class="form-signin">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" id="remember" value="1" {{ old('remember') !== null ? 'checked' : '' }}>
              <label for="remember">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="{{ asset('blood/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/adminlte.js') }}"></script>
<script src="{{ asset('blood/admin/js/toastr.js') }}"></script>
@if(Session::has('error_message'))
    <script>
        toastr.error("{{ Session::get('error_message') }}")
    </script>
@endif
@if(Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}")
    </script>
@endif
</body>
</html>
