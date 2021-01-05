@extends('blood.frontend.layout.frontend')
@section('title','Registration')
@section('content')
    <section class="section-appointment">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 
                    <figure class="appointment-img">
                        <img src="{{ asset('blood/frontend/images/register.png') }}" alt="appointment image">
                    </figure>
                </div> <!--  end col-lg-6  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Request Appointment</h3>
                        <form action="{{ route('donor.signup') }}" method="post" class="appoinment-form"> 
                            @csrf 
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}" required>
                                    @if( $errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email </label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    @if( $errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}" required>
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
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
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
                                    <input type="date" name="dob" id="dob" class="form-control" placeholder="Date" value="{{old('dob')}}" required>
                                    @if( $errors->has('dob'))
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_donate_date">Last Donate Date</label>
                                    <input type="date" name="last_donate_date" id="last_donate_date" class="form-control" placeholder="Last Donate Date" value="{{old('last_donate_date')}}">
                                    @if( $errors->has('last_donate_date'))
                                        <span class="text-danger">{{ $errors->first('last_donate_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                    <label for="current_address">Current Address <span class="text-danger">*</span></label>
                                    <textarea name="current_address" id="current_address" class="form-control" rows="4" placeholder="Current address" value="{{ old('current_address') }}" required></textarea>
                                    @if( $errors->has('current_address'))
                                        <span class="text-danger">{{ $errors->first('current_address') }}</span>
                                    @endif
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="permanent_address">Permanent Address <span class="text-danger">*</span></label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control" rows="4" placeholder="Permanent address" value="{{ old('permanent_address') }}" required></textarea>
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
                                                <option value="{{ $blood_group->id }}">{{ $blood_group->name }}</option>
                                            @endforeach
                                        </select>
                                        @if( $errors->has('blood_group_id'))
                                            <span class="text-danger">{{ $errors->first('blood_group_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="thumbnail">Image <span class="text-danger">*</span></label>                                   
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">              
                                    <label for="password">Password <span class="text-danger">*</span></label> 
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password')}}" required/>
                                    @if( $errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button id="btn_submit" class="btn-submit" type="submit">Get Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end .appointment-form-wrapper  -->
                </div> <!--  end .col-lg-6 -->
            </div> <!--  end .row  -->
        </div> <!--  end .container -->
    </section>
@endsection