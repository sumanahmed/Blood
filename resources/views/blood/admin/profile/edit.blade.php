@extends('blood.admin.layout.admin')
@section('title','Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
            <div class="col-sm-6"><ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          Update Profile
        </div>
        <div class="card-body">
            <form action="{{ route('backend.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                        <label for="name">Name <span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="name" name="name" value="{{ $profile->name }}" class="form-control" placeholder="Name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                        <label for="address">Address <span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="address" name="address" value="{{ $profile->address }}" class="form-control" placeholder="Address">
                        @if($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-group">
                        <label for="slogan">Slogan<span class="text-danger" title="Required">*</span></label>
                        <input type="text" id="slogan" name="slogan" value="{{ $profile->slogan }}" class="form-control" placeholder="Slogan">
                        @if($errors->has('slogan'))
                            <span class="text-danger">{{ $errors->first('slogan') }}</span>
                        @endif
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                      <label for="zip_code">Zip Code <span class="text-danger" title="Required">*</span></label>
                      <input type="text" id="zip_code" name="zip_code" value="{{ $profile->zip_code }}" class="form-control" placeholder="Zip Code" required>
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                      <label for="phone_1">Phone One <span class="text-danger" title="Required">*</span></label>
                      <input type="text" id="phone_1" name="phone_1" value="{{ $profile->phone_1 }}" class="form-control" placeholder="Phone no one" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                      <label for="phone_2">Phone Two </label>
                      <input type="text" id="phone_2" name="phone_2" value="{{ $profile->phone_2 }}" class="form-control" placeholder="Phone no two" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                      <label for="email_1">Email One <span class="text-danger" title="Required">*</span></label>
                      <input type="email" id="email_1" name="email_1" value="{{ $profile->email_1 }}" class="form-control" placeholder="Email One" required>
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                      <label for="email_2">Email Two</label>
                      <input type="email" id="email_2" name="email_2" value="{{ $profile->email_2 }}" class="form-control" placeholder="Email Two" >
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                      <label for="facebook">Facebook </label>
                      <input type="text" id="facebook" name="facebook" value="{{ $profile->facebook }}" class="form-control" placeholder="Enter Facebook Link">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                  <div class="form-group">
                      <label for="twitter">Twitter </label>
                      <input type="text" id="twitter" name="twitter" value="{{ $profile->twitter }}" class="form-control" placeholder="Enter Twitter Link">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
              <div class="col-4">
                  <div class="form-group">
                      <label for="pinterest">Pinterest </label>
                      <input type="text" id="pinterest" name="pinterest" value="{{ $profile->pinterest }}" class="form-control" placeholder="Enter Pinterest Link">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>

              <div class="col-4">
                  <div class="form-group">
                      <label for="youtube">Youtube </label>
                      <input type="text" id="youtube" name="youtube" value="{{ $profile->youtube }}" class="form-control" placeholder="Enter Youtube Link">
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="privacy_policy">Privacy Policy  <span class="text-danger" title="Required">*</span></label>
                      <textarea class="form-control ckeditor" id="privacy_policy" name="privacy_policy" rows="4" placeholder="Enter Privacy Policy">{{ $profile->privacy_policy }}</textarea>
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                      <label for="terms_condition">Terms & Condition  <span class="text-danger" title="Required">*</span></label>
                      <textarea class="form-control ckeditor" id="terms_condition" name="terms_condition" rows="4" placeholder="Enter Terms Condition">{{ $profile->terms_condition }}</textarea>
                      <span class="text-danger errorCompnayName"></span>
                  </div>
              </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="logo">Logo <span class="text-danger" title="Required">*</span></label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="logo" id="logoUpload" accept=".png, .jpg, .jpeg"/>
                                <label for="logoUpload"><i class="fas fa-pencil-alt"></i></label>
                            </div>
                            <div class="avatar-preview" style="width:100%">
                                @if($profile->logo != null)
                                    <div id="logoPreview" style="background-image: url({{ asset($profile->logo) }});"></div>
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
    <script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.inline('ckeditor');
    </script>
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