@extends('blood.admin.layout.admin')
@section('title','symptom')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Symptom</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addSymptomModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="allSymptom">
                            @foreach($symptomS as $symptom)
                                <tr class="symptom-{{ $symptom->id }}">
                                    <td>{{ $symptom->name }}</td>                                    
                                    <td>{{ $symptom->days }}</td>                                    
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editSymptom" data-target="#editSymptomModal" data-id="{{ $symptom->id }}" data-question="{{ $symptom->name }}" data-answer="{{ $symptom->days }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteSymptom" data-target="#deleteSymptomModal" data-id="{{ $symptom->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addSymptomModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Symptom</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">name<span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="name" class="form-control" placeholder="name" required>
                                <span class="text-danger errorName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="days">Days <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="days" class="form-control" placeholder="Days" required>
                                <span class="text-danger errorDay"> </span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createSymptom">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editSymptomModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Symptom</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_name" class="form-control" placeholder="Name" required>
                                <input type="hidden" id="edit_id" />
                                <span class="text-danger errorName"> </span>
                            </div>
                            <div class="form-group">
                                <label for="days">Days <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_days" class="form-control" placeholder="days" required>
                                <span class="text-danger errorDay"> </span>
                            </div>
                        </div> 
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updateSymptom">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteSymptomModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroySymptom">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/symptom.js') }}"></script>
    <script>
        $('.nav-symptom').addClass('active');
    </script>
@endsection