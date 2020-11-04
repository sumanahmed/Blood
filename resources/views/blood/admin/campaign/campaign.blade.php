@extends('blood.admin.layout.admin')
@section('title','Campaign')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Campaign</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addCampaignModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="allCampaign">
                            @foreach($campaigns as $campaign)
                                <tr class="campaign-{{ $campaign->id }}">
                                    <td>{{ $campaign->title }}</td>
                                    <td>{{ $campaign->date }}</td>
                                    <td>{{ $campaign->location }}</td>
                                    <td><img src="{{ asset($campaign->image) }}" alt="Campaignimage" style="width: 60px;height: 60px;"></td>
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editCampaign" data-target="#editCampaignModal" data-id="{{ $campaign->id }}" data-title="{{ $campaign->title }}" data-description="{{ $campaign->description }}" data-date="{{ $campaign->date }}" data-location="{{ $campaign->location }}" data-status="{{ $campaign->status }}" data-image="{{ $campaign->image }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteCampaign" data-target="#deleteCampaignModal" data-id="{{ $campaign->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addCampaignModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Campaign</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="createCampaignForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="title" class="form-control" placeholder="Title" required>
                                    <span class="text-danger errorTitle"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger" title="Required">*</span></label>
                                    <textarea id="description" class="form-control" placeholder="Description" required></textarea>
                                    <span class="text-danger errorDescription"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Date <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="date" class="form-control datePicker" required>
                                    <span class="text-danger errorDate"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="location">Location <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="location" class="form-control" placeholder="Location" required>
                                    <span class="text-danger errorLocation"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger" title="Required">*</span></label>                                    
                                    <select id="status" class="form-control" required>
                                        <option value="1">On</option>
                                        <option value="0">Off</option>
                                    </select>
                                    <span class="text-danger errorStatus"> </span>
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
                    <button type="button" class="btn btn-success" id="createCampaign">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editCampaignModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Campaign</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="editCampaignForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_title" class="form-control" placeholder="Title" required>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger errorTitle"> </span>
                                </div>
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger" title="Required">*</span></label>
                                    <textarea id="edit_description" class="form-control" placeholder="Description" required></textarea>
                                    <span class="text-danger errorDescription"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Date <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_date" class="form-control datePicker" required>
                                    <span class="text-danger errorDate"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="location">Location <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_location" class="form-control" placeholder="Location" required>
                                    <span class="text-danger errorLocation"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger" title="Required">*</span></label>                                    
                                    <select id="edit_status" class="form-control" required>
                                        <option value="1">On</option>
                                        <option value="0">Off</option>
                                    </select>
                                    <span class="text-danger errorStatus"> </span>
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
                    <button type="button" class="btn btn-success" id="updateCampaign">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteCampaignModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroyCampaign">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/campaign.js') }}"></script>
    <script>
        $('.nav-campaign').addClass('active');
    </script>
@endsection