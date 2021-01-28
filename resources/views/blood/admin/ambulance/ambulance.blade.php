@extends('blood.admin.layout.admin')
@section('title','ambulance')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All ambulance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addAmbulanceModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Name</th>
                                <th>Driver Name</th>
                                <th>Driver phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="allambulance">
                            @foreach($ambulances as $ambulance)
                                <tr class="ambulance-{{ $ambulance->id }}">
                                    <td>{{ $ambulance->name }}</td>                                    
                                    <td>{{ $ambulance->driver_name }}</td>                                    
                                    <td>{{ $ambulance->driver_phone }}</td>                                    
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editAmbulance" data-target="#editAmbulanceModal" data-id="{{ $ambulance->id }}" data-name="{{ $ambulance->name }}" data-driver_name="{{ $ambulance->driver_name }}" data-driver_phone={{ $ambulance->driver_phone }} da><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteAmbulance" data-target="#deleteAmbulanceModal" data-id="{{ $ambulance->id }}"><i class="fas fa-trash"></i></button>
                                    </td>
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
    <div class="modal fade" tabindex="-1" id="addAmbulanceModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Ambulance</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="name" class="form-control" placeholder="Enter Name" required>
                                <span class="text-danger errorName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="driver_name">Driver Name <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="driver_name" class="form-control" placeholder="Enter Driver Name" required>
                                <span class="text-danger errorDriverName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="driver_phone">Driver Phone<span class="text-danger" title="Required">*</span></label>
                                <input type="number" id="driver_phone" class="form-control" placeholder="Enter Driver Phone" required>
                                <span class="text-danger errorDriverPhone"> </span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createAmbulance">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editAmbulanceModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Ambulance</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_name" class="form-control" placeholder="name" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger errorName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="driver_name">Driver Name<span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_driver_name" class="form-control" placeholder="Driver Name" required>
                                <span class="text-danger errorDriverName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="driver_phone">Driver Phone<span class="text-danger" title="Required">*</span></label>
                                <input type="number" id="edit_driver_phone" class="form-control" placeholder="Driver Phone" required>
                                <span class="text-danger errorDriverPhone"> </span>
                            </div>
                        </div> 
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updateAmbulance">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteAmbulanceModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                  <h5 class="modal-title text-center w-100">Delete Confirmation</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="del_id">
                    <h3 class="text-center">Are you sure to delete ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="destroyAmbulance">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/ambulance.js') }}"></script>
    <script>
        $('.nav-ambulance').addClass('active');
    </script>
@endsection