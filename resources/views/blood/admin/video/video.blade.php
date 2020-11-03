@extends('blood.admin.layout.admin')
@section('title','Video')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Videos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addVideoModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Link</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="allVideo">
                            @foreach($videos as $video)
                                <tr class="video-{{ $video->id }}">
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->link }}</td>
                                    <td><img src="{{ asset($video->image) }}" alt="Video image" style="width: 60px;height: 60px;"></td>
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editVideo" data-target="#editVideomodal" data-id="{{ $video->id }}" data-title="{{ $video->title }}" data-link="{{ $video->link }}" data-image="{{ $video->image }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deleteVideo" data-target="#deleteVideomodal" data-id="{{ $video->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addVideoModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Video</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="createVideoForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Title">Title <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="title" class="form-control" placeholder="Title" required>
                                    <span class="text-danger errorTitle"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="link">Link <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="link" class="form-control" placeholder="link" required>
                                    <span class="text-danger errorLink"> </span>
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
                    <button type="button" class="btn btn-success" id="createVideo">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editVideoModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Video</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="editVideoForm" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="Title">Title <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_title" class="form-control" placeholder="Title" required>
                                    <input type="hidden" id="edit_id" />
                                    <span class="text-danger errorTitle"> </span>
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="link">Link <span class="text-danger" title="Required">*</span></label>
                                    <input type="text" id="edit_link" class="form-control" placeholder="link" required>
                                    <span class="text-danger errorLink"> </span>
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
                    <button type="button" class="btn btn-success" id="updateVideo">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteVideoModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroyVideo">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/video.js') }}"></script>
    <script>
        $('.nav-video').addClass('active');
    </script>
@endsection