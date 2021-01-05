@extends('blood.frontend.layout.frontend')
@section('title','Dashboard')
@section('styles')
    <style>
       .tabs-left {
        border-bottom: none;
        border-right: 1px solid #ddd;
        }

        .tabs-left>li {
        float: none;
        margin:0px;
        
        }

        .tabs-left>li.active>a,
        .tabs-left>li.active>a:hover,
        .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
        background:#FE3C47;
        border:none;
        border-radius:0px;
        margin:0px;
        }
        .nav-tabs>li>a:hover {
            /* margin-right: 2px; */
            line-height: 1.42857143;
            border: 1px solid transparent;
            /* border-radius: 4px 4px 0 0; */
        }
        .tabs-left>li.active>a::after{content: "";
            position: absolute;
            top: 10px;
            right: -10px;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;        
            border-left: 10px solid #FE3C47;
            display: block;
            width: 0;
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
    <section class="page-header" data-stellar-background-ratio="1.2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Donor dashboard</h3>
                </div>
            </div> <!-- end .row  -->
        </div> <!-- end .container  -->
    </section> <!-- end .page-header  -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <!-- tabs -->
                    <ul class="nav nav-tabs tabs-left sideways">
                        <li class="active"><a href="#donor" data-toggle="tab">Donor</a></li>
                        <li><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#blog" data-toggle="tab">Blog</a></li>
                    </ul>
                    <!-- /tabs -->
                </div>
                <div class="col-xs-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="donor">                
                            <div class="">
                                <span>Dear <strong>{{ Auth::guard('donor')->user()->name }}</strong>, welcome to your dashboard.</span>
                            </div>
                        </div> 
                        <div class="tab-pane" id="profile"> 
                            <div class="">
                                <h5>Edit Profile</h5>
                                <form action="{{ route('donor.update', $donor->id) }}" method="post" class="appoinment-form"> 
                                    @csrf 
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $donor->name }}" required>
                                            @if( $errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email </label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $donor->email }}">
                                            @if( $errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{ $donor->phone}}" required>
                                            @if( $errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="division_id">Division <span class="text-danger">*</span></label>
                                            <div class="select-style">                                    
                                                <select class="form-control" name="division_id" id="division_id">
                                                    <option>Select Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}" @if($donor->division_id == $division->id) selected @endif>{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->has('division_id'))
                                                    <span class="text-danger">{{ $errors->first('division_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="district_id">District <span class="text-danger">*</span></label>
                                            <div class="select-style">                                    
                                                <select class="form-control" name="district_id" id="district_id">
                                                    <option>Select District</option>
                                                    @foreach($donor_districts as $donor_district)
                                                        <option value="{{ $donor_district->id }}" @if($donor->district_id == $donor_district->id) selected @endif>{{ $donor_district->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->has('district_id'))
                                                    <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="thana_id">Thana <span class="text-danger">*</span></label>
                                            <div class="select-style">                                    
                                                <select class="form-control" name="thana_id" id="thana_id">
                                                    <option>Select Thana</option>
                                                    @foreach($donor_thanas as $donor_thana)
                                                        <option value="{{ $donor_thana->id }}" @if($donor->thana_id == $donor_thana->id) selected @endif>{{ $donor_thana->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->has('thana_id'))
                                                    <span class="text-danger">{{ $errors->first('thana_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" name="dob" id="dob" class="form-control" placeholder="Date" value="{{ $donor->dob }}" required>
                                            @if( $errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="last_donate_date">Last Donate Date</label>
                                            <input type="date" name="last_donate_date" id="last_donate_date" class="form-control" placeholder="Last Donate Date" value="{{ $donor->last_donate_date }}">
                                            @if( $errors->has('last_donate_date'))
                                                <span class="text-danger">{{ $errors->first('last_donate_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                            <label for="current_address">Current Address <span class="text-danger">*</span></label>
                                            <textarea name="current_address" id="current_address" class="form-control" rows="4" placeholder="Current address" value="{{ old('current_address') }}" required>{{ $donor->current_address }}</textarea>
                                            @if( $errors->has('current_address'))
                                                <span class="text-danger">{{ $errors->first('current_address') }}</span>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="permanent_address">Permanent Address <span class="text-danger">*</span></label>
                                            <textarea name="permanent_address" id="permanent_address" class="form-control" rows="4" placeholder="Permanent address" value="{{ old('permanent_address') }}" required>{{ $donor->permanent_address }}</textarea>
                                            @if( $errors->has('permanent_address'))
                                                <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                            @endif
                                        </div>                                                          
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="select-style">          
                                                <label for="blood_group_id">Blood Group <span class="text-danger">*</span></label>
                                                <select class="form-control" name="blood_group_id" id="blood_group_id">
                                                    <option>Select Blood Group</option>
                                                    @foreach($blood_groups as $blood_group)
                                                        <option value="{{ $blood_group->id }}" @if($blood_group->id == $donor->blood_group_id) selected @endif>{{ $blood_group->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if( $errors->has('blood_group_id'))
                                                    <span class="text-danger">{{ $errors->first('blood_group_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">              
                                            <label for="password">Password </label> 
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password')}}"/>
                                            @if( $errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="currentImage">Current Image <span class="text-danger">*</span></label>                                   
                                            <img src="{{ asset($donor->thumbnail) }}" class="form-control" id="currentImage" style="width: 80px;height:60px;" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="thumbnail">Update Image <span class="text-danger">*</span></label>                                   
                                            <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <button id="btn_submit" class="btn-submit" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                        <div class="tab-pane" id="blog"> 
                           
                            <div class="table-section">
                                <div class="heading" style="overflow: hidden;margin-bottom:10px;">
                                    <h5 class="text-left" style="float: left;">Blog</h5>
                                    <span class="text-right" style="float: right;">
                                        <a href="{{ route('donor.blog.create', $donor->id) }}" class="btn btn-success">Add New</a>
                                    </span>
                                </div>
                                @if((isset($status) && isset($divisions)) && $status == 0)                                
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                        </tr>
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->title }}</td>
                                                <td><img src="{{ asset($blog->title) }}" style="width:80px;height:60px" /></td>                                            
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif

                                @if(isset($status) && $status == 1) 
                                    <div class="blog-create">
                                        <form action="{{ route('donor.blog.store', $donor_id) }}" method="post" class="appoinment-form" enctype="multipart/form-data"> 
                                            @csrf 
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Title <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                                                    @if( $errors->has('title'))
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                                    <div class="select-style">                                    
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if( $errors->has('category_id'))
                                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                                    <label for="description">Description <span class="text-danger">*</span></label>
                                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description" required></textarea>
                                                    @if( $errors->has('description'))
                                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="thumbnail">Thumbnail<span class="text-danger">*</span></label>                                   
                                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">
                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                    <button id="btn_submit" class="btn-submit" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>                               
                                @endif
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection