@extends('blood.admin.layout.admin')
@section('title','Medicine')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Medicines</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addMedicineModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Symptom</th>
                                <th>Doctor</th>
                                <th>Medicine Name</th>
                                <th>Dose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="allmedicine">
                            @foreach($medicines as $medicine)
                                <tr class="medicine-{{ $medicine->id }}">
                                    <td>{{ $medicine->symptom_name }}</td>
                                    <td>{{ $medicine->doctor_name }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->dose }}</td>
                                    @if($medicine->status == 1)
                                        <td>Table</td>
                                    @elseif($medicine->status == 2)
                                        <td>Capsule</td>
                                    @else
                                        <td>Table</td>
                                    @endif
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editMedicine" data-target="#editMedicineModal" data-id="{{ $medicine->id }}" data-symptom_id="{{ $medicine->symptom_id }}" data-doctor_id="{{ $medicine->doctor_id }}" data-name="{{ $medicine->name }}" data-dose="{{ $medicine->dose }}" data-status="{{ $medicine->status }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteMedicine" data-target="#deleteMedicineModal" data-id="{{ $medicine->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addMedicineModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Medicine</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="createMedicineForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="symptom_id">Symptom <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="symptom_id" id="symptom_id">
                                        @foreach($symptoms as $symptom)
                                            <option value="{{ $symptom->id }}">{{ $symptom->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger errorSymptom"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="doctor_id">Doctor <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="doctor_id" id="doctor_id">
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger errorDoctor"> </span>
                                </div>
                            </div> 
                        </div>
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
                                    <label for="Dose">Dose <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="dose" class="form-control" placeholder="Dose" required>
                                    <span class="text-danger errorDose"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Type <span class="text-danger" title="Required">*</span></label>
                                    <select id="status" class="form-control" required>
                                        <option value="1">Tablet</option>
                                        <option value="2">Capsule</option>
                                        <option value="3">Syrup</option>
                                    </select>
                                    <span class="text-danger errorStatus"> </span>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createMedicine">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editMedicineModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Medicine</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="editMedicineForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_symptom_id">Symptom <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="symptom_id" id="edit_symptom_id">
                                        @foreach($symptoms as $symptom)
                                        <option value="{{ $symptom->id }}">{{ $symptom->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger errorSymptom"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_doctor_id">Doctor <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="edit_doctor_id" id="edit_doctor_id">
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger errorDoctor"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_name" class="form-control" placeholder="Name" required>
                                    <span class="text-danger errorName"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Dose">Dose <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_dose" class="form-control" placeholder="Dose" required>
                                    <span class="text-danger errorDose"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Type <span class="text-danger" title="Required">*</span></label>
                                    <select id="edit_status" class="form-control" required>
                                        <option value="1">Tablet</option>
                                        <option value="2">Capsule</option>
                                        <option value="3">Syrup</option>
                                    </select>
                                    <span class="text-danger errorStatus"> </span>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updateMedicine">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteMedicineModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroyMedicine">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/medicine.js') }}"></script>
    <script>        
        $('.menu-blogs').addClass('menu-open');
        $('.nav-medicine').addClass('active');
    </script>
@endsection