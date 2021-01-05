@extends('blood.frontend.layout.frontend')
@section('title','Login')
@section('content')
    <section class="section-appointment">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 
                    <figure class="appointment-img">
                        <img src="{{ asset('blood/frontend/images/login.jpg') }}" alt="appointment image" style="margin-left: 75px;">
                    </figure>
                </div> <!--  end col-lg-6  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Request Sign In</h3>
                        <form action="{{ route('donor.signin') }}" method="post" class="appoinment-form"> 
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    @if( $errors->has('email_phone'))
                                        <span class="text-danger">{{ $errors->first('email_phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    @if( $errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <button id="btn_submit" class="btn-submit" type="submit" style="margin-right: 160px;">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end .appointment-form-wrapper  -->
                </div> <!--  end .col-lg-6 -->
            </div> <!--  end .row  -->
        </div> <!--  end .container -->
    </section>
@endsection