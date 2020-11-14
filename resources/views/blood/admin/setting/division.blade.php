@extends('blood.admin.layout.admin')
@section('title','Division')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Division</h1>
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Division</th>
                            </tr>
                        </tfoot>
                        <tbody id="allFaq">
                            @foreach($divisions as $key=>$division)
                                <tr class="division-{{ $division->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $division->name }}</td> 
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
    <script src="{{ asset('blood/admin/js/faq.js') }}"></script>
    <script>
        $('.menu-setting').addClass('menu-open');
        $('.nav-division').addClass('active');
    </script>
@endsection