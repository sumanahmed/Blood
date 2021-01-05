@extends('blood.admin.layout.admin')
@section('title','Dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content-header">
      <div class="container-fluid">
        <form action="{{ route('backend.dashboard') }}" method="get">
          <div class="row mb-2">
            <div class="col-sm-3">
              <div class="form-group">
                  <label class="col-form-label">Start Date <span class="text-danger" title="Required">*</span></label>
                  <input type="text" class="form-control datePicker" name="start_date" placeholder="Start Date" @isset($start_date) value="{{ $start_date }}" @endisset required>                
            </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                  <label class="col-form-label">End Date <span class="text-danger" title="Required">*</span></label>
                  <input type="text" class="form-control datePicker" name="end_date" placeholder="End Date" @isset($end_date) value="{{ $end_date }}" @endisset required>                
            </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">                
                <button type="submit" class="btn btn-default" style="margin-top:38px;">Filter</button>
            </div>
            </div>
          </div><!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $donor }}</h3>
                <p>Total Donor</p>
              </div>             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $blog }}</h3>
                <p>Total Blog</p>
              </div>              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $video }}</h3>
                <p>Total Video</p>
              </div>             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $image }}</h3>
                <p>Total Image</p>
              </div>              
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.nav-dashboard').addClass('active');
    </script>
@endsection