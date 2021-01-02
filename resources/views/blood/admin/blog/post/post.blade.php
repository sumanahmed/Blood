@extends('blood.admin.layout.admin')
@section('title','Post')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#addPostModal"><i class="fas fa-plus-circle"></i> Create</button>
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
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="allPost">
                            @foreach($posts as $post)
                                <tr class="post-{{ $post->id }}">
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category_name }}</td>
                                    <td><img src="{{ asset($post->thumbnail) }}" alt="Post image" style="width: 60px;height: 60px;"></td>
                                    <td>{{ $post->status == 1 ? 'Show' : 'Hide' }}</td>
                                    <td style="vertical-align:middle;text-align:center;">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" id="editPost" data-target="#editPostModal" data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-description="{{ $post->description }}" data-category_id="{{ $post->category_id }}" data-status="{{ $post->status }}" data-thumbnail="{{ $post->thumbnail }}"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" id="deletePost" data-target="#deletePostModal" data-id="{{ $post->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" tabindex="-1" id="addPostModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Create New Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="createPostForm" method="POST" enctype="multipart/form-data">
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
                                    <label for="link">Descripion <span class="text-danger" title="Required">*</span></label>                                    
                                    <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                                    <span class="text-danger errorDescription"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="category_id">Category <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger errorCategory"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger" title="Required">*</span></label>
                                    <input type="file" name="thumbnail" id="image" required>
                                    <span class="text-danger errorImage"> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="createPost">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editPostModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-default" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                  <h5 class="modal-title text-center w-100">Update Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="editPostForm" method="POST" enctype="multipart/form-data">
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
                                    <label for="link">Descripion <span class="text-danger" title="Required">*</span></label>                                    
                                    <textarea class="form-control" name="description" id="edit_description" rows="4" required></textarea>
                                    <span class="text-danger errorLink"> </span>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit_category_id">Category <span class="text-danger" title="Required">*</span></label>
                                    <select class="form-control" name="category_id" id="edit_category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger errorCategory"> </span>
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
                                    <input type="file" name="thumbnail" id="edit_image">
                                    <span class="text-danger errorImage"> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="updatePost">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deletePostModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-success" id="destroyPost">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{ asset('blood/admin/js/post.js') }}"></script>
    <script>        
        $('.menu-blogs').addClass('menu-open');
        $('.nav-post').addClass('active');
    </script>
@endsection