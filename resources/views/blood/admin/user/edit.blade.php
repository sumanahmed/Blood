@extends('blood.admin.layout.admin')
@section('title','User')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
            <div class="col-sm-6"><ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          Update User Profile
        </div>
        <div class="card-body">
            <form action="{{ route('backend.user.user_update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                        <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">                        
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                        <label for="email">Email <span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-group">
                        <label for="phone">Phone<span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                  </div>
              </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="logo">Thumbnail <span class="text-danger" title="Required">*</span></label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="thumbnail" id="logoUpload" accept=".png, .jpg, .jpeg"/>
                                <label for="logoUpload"><i class="fas fa-pencil-alt"></i></label>
                            </div>
                            <div class="avatar-preview" style="width:100%">
                                @if($user->thumbnail != null)
                                    <div id="logoPreview" style="background-image: url({{ asset($user->thumbnail) }});"></div>
                                @else
                                    <div id="logoPreview" style="background-image: url({{ asset('shobuj_bazar/backend/images/default_bg.jpg') }});"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit"/>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>

          </form>
        </div>
      </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.nav-profile').addClass('active');
        function logo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoPreview').css('background-image', 'url('+e.target.result +')');
                    $('#logoPreview').hide();
                    $('#logoPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logoUpload").change(function() {
            logo(this);
        });
    </script>
@endsection