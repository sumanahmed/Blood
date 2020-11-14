@extends('blood.admin.layout.admin')
@section('title','District')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All District</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <table class="table table-bordered table-hover table-sm data_table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Division</th>
                                <th>District Name</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Division</th>
                                <th>District Name</th>
                            </tr>
                        </tfoot>
                        <tbody id="allFaq">
                            @foreach($districts as $key=>$district)
                                <tr class="division-{{ $district->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $district->division->name }}</td> 
                                    <td>{{ $district->name }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
    <script>
        $('.menu-setting').addClass('menu-open');
        $('.nav-district').addClass('active');
    </script>
@endsection