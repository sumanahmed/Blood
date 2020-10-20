<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>Blood - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('shobuj_bazar/frontend/images/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/toastr.css') }}">
  <link rel="stylesheet" href="{{ asset('blood/admin/css/custom.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

