@extends('blood.admin.layout.admin')
@section('title','Doctor')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Doctors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addDoctorModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Designation</th>
                                <th>Specialist</th>
                                <th>Siting Place</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Specialist</th>
                                <th>Siting Place</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="allDoctor">
                            @foreach($doctors as $doctor)
                                <tr class="doctor-{{ $doctor->id }}">
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->designation }}</td>
                                    <td>{{ $doctor->specialist }}</td>
                                    <td>{{ $doctor->siting_place }}</td>
                                    <td><img src="{{ asset($doctor->image) }}" alt="Doctor image" style="width: 60px;height: 60px;"></td>
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editDoctor" data-target="#editDoctorModal" data-id="{{ $doctor->id }}" data-name="{{ $doctor->name }}" data-designation="{{ $doctor->designation }}" data-specialist="{{ $doctor->specialist }}" data-siting_place="{{ $doctor->siting_place }}" data-image="{{ $doctor->image }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteDoctor" data-target="#deleteDoctorModal" data-id="{{ $doctor->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addDoctorModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Doctor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="createDoctorForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="name" class="form-control" placeholder="Name" required>
                                    <span class="text-danger errorName"> </span>
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="designation">Designation <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="designation" class="form-control" placeholder="Designation" required>
                                    <span class="text-danger errorDesignation"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="specialist">Specialist <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="specialist" class="form-control" placeholder="Specialist" required>
                                    <span class="text-danger errorSpecialist"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="siting_place">Siting Place <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="siting_place" class="form-control" placeholder="Siting Place" required>
                                    <span class="text-danger errorSitingPlace"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger" title="Required">*</span></label>
                                    <input type="file" name="image" id="image" required>
                                    <span class="text-danger errorImage"> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createDoctor">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editDoctorModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Gallery Image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="editDoctorForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_name" class="form-control" placeholder="Name" required>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger errorName"> </span>
                                </div>
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_designation">Designation <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_designation" class="form-control" placeholder="Designation" required>
                                    <span class="text-danger errorDesignation"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_specialist">Specialist <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_specialist" class="form-control" placeholder="Specialist" required>
                                    <span class="text-danger errorSpecialist"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_siting_place">Siting Place <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_siting_place" class="form-control" placeholder="Siting Place" required>
                                    <span class="text-danger errorSitingPlace"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Previous Image<span class="text-danger" title="Required">*</span></label>
                                    <img src="" id="previousImage" class="form-control" style="width: 100px;height:80px;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger" title="Required">*</span></label>
                                    <input type="file" name="image" id="edit_image">
                                    <span class="text-danger errorImage"> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updateDoctor">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteDoctorModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroyGallery">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/doctor.js') }}"></script>
    <script>
        $('.nav-gallery').addClass('active');
    </script>
@endsection