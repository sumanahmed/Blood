@extends('blood.frontend.layout.frontend')
@section('title','Campaign')
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
                <div class="col-md-12 col-sm-12">
                    <span>Dear <strong>{{ Auth::guard('donor')->user()->name }}</strong>, welcome to your dashboard</span>
                </div> 
            </div> 
        </div> 
    </section>
@endsection