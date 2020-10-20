@extends('blood.admin.layout.admin')
@section('title','Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Donors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addDonorModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Blood Group</th>
                                <th>Last Donate Date</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Last Donate Date</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($donors as $donor)
                                <tr>
                                    <td>{{ $donor->name }}</td>
                                    <td>{{ $donor->bloodGroup->name }}</td>
                                    <td>{{ $donor->last_donate_date }}</td>
                                    <td>{{ $donor->district->name }}</td>
                                    <td>{{ $donor->current_address }}</td>
                                    <td>{{ $donor->phone }}</td>
                                    <td><img src="{{ asset($donor->thumbnail) }}" alt="donor image" style="width: 60px;height: 60px;"></td>
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editDonor" data-target="#editDonormodal"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteDonor" data-target="#deleteDonormodal"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addDonorModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Donor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="name" class="form-control" placeholder="Enter Donar Full Name" required>
                                <span class="text-danger errorName"> </span>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Phone <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="phone" class="form-control" placeholder="Enter Donar Phone Number" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <span class="text-danger errorPhone"> </span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" placeholder="Enter Donar Email">
                                <span class="text-danger errorEmail"> </span>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="division_id">Division <span class="text-danger" title="Required">*</span></label>
                                <select id="division_id" class="form-control select2">
                                  <option value="">Select Division</option>
                                </select>
                                <span class="text-danger errorDivisionId"> </span>
                            </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="district_id">District <span class="text-danger" title="Required">*</span></label>
                                <select id="district_id" class="form-control select2">
                                  <option value="">Select District</option>
                                </select>
                                <span class="text-danger errorDistrictId"> </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="thana_id">Thana <span class="text-danger" title="Required">*</span></label>
                                <select id="thana_id" class="form-control select2">
                                  <option value="">Select Thana</option>
                                </select>
                                <span class="text-danger errorThanaId"> </span>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dob">Date of Birth <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="dob" class="form-control datePicker" placeholder="Enter Donar Phone Number" required>
                                <span class="text-danger errorDob"> </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="dob">Last Donate Date</label>
                                <input type="text" id="last_donate_date" class="form-control datePicker">
                                <span class="text-danger errorDob"> </span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="permanent_address">Permanent Address <span class="text-danger" title="Required">*</span></label>
                                <textarea id="permanent_address" class="form-control" placeholder="Enter Donar Permanent Address" required></textarea>
                                <span class="text-danger errorPermanentAddress"> </span>
                            </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="current_address">Current Address <span class="text-danger" title="Required">*</span></label>
                                <textarea id="current_address" class="form-control" placeholder="Enter Donar Current Address" required></textarea>
                                <span class="text-danger errorCurrentAddress"> </span>
                            </div>
                        </div> 
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createDonor">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="addDonorModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Donor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_name" class="form-control" placeholder="Enter Donar Full Name" required>
                                <span class="text-danger errorName"> </span>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Phone <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_phone" class="form-control" placeholder="Enter Donar Phone Number" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <span class="text-danger errorPhone"> </span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="edit_email" class="form-control" placeholder="Enter Donar Email">
                                <span class="text-danger errorEmail"> </span>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="division_id">Division <span class="text-danger" title="Required">*</span></label>
                                <select id="edit_division_id" class="form-control select2">
                                  <option value="">Select Division</option>
                                </select>
                                <span class="text-danger errorDivisionId"> </span>
                            </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="district_id">District <span class="text-danger" title="Required">*</span></label>
                                <select id="edit_district_id" class="form-control select2">
                                  <option value="">Select District</option>
                                </select>
                                <span class="text-danger errorDistrictId"> </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="thana_id">Thana <span class="text-danger" title="Required">*</span></label>
                                <select id="edit_thana_id" class="form-control select2">
                                  <option value="">Select Thana</option>
                                </select>
                                <span class="text-danger errorThanaId"> </span>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dob">Date of Birth <span class="text-danger" title="Required">*</span></label>
                                <input type="text" id="edit_dob" class="form-control datePicker" placeholder="Enter Donar Phone Number" required>
                                <span class="text-danger errorDob"> </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="dob">Last Donate Date</label>
                                <input type="text" id="edit_last_donate_date" class="form-control datePicker">
                                <span class="text-danger errorDob"> </span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="permanent_address">Permanent Address <span class="text-danger" title="Required">*</span></label>
                                <textarea id="edit_permanent_address" class="form-control" placeholder="Enter Donar Permanent Address" required></textarea>
                                <span class="text-danger errorPermanentAddress"> </span>
                            </div>
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="current_address">Current Address <span class="text-danger" title="Required">*</span></label>
                                <textarea id="edit_current_address" class="form-control" placeholder="Enter Donar Current Address" required></textarea>
                                <span class="text-danger errorCurrentAddress"> </span>
                            </div>
                        </div> 
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updateDonor">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteDonormodal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroy">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/donor.js') }}"></script>
    <script>
        $('.nav-donor').addClass('active');
    </script>
@endsection