@extends('blood.frontend.layout.frontend')
@section('title','Campaign')
@section('content')
    <section class="page-header" data-stellar-background-ratio="1.2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Campaign Lists</h3>
                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / All Campaigns
                    </p>
                </div>
            </div> <!-- end .row  -->
        </div> <!-- end .container  -->
    </section> <!-- end .page-header  -->

    <section class="section-content-block">
        <div class="container">
            <div class="row section-heading-wrapper">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading">Donation Campaigns</h2>
                    <p class="section-subheading">Campaigns to encourage new donors to join and existing to continue to give blood.</p>
                </div> <!-- end .col-sm-12  -->  
            </div> <!-- end .row  -->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="event-latest">
                        <div class="row"> 
                            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                <div class="event-latest-thumbnail">
                                    <a href="#">
                                        <img src="{{ asset('blood/frontend/images/event_1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div> <!--  col-sm-5  -->

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="event-details">
                                    <a class="latest-date" href="#">14 June, 2017</a>
                                    <h4 class="event-latest-title">
                                        <a href="#">World Blood Donors Day</a>
                                    </h4>
                                    <p>Every year, on 14 June, countries around the world celebrate World Blood Donor Day. The event serves to thank voluntary.</p>
                                    <div class="event-latest-details">
                                        <a class="author" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 10.00am - 3.00pm</a>
                                        <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</a>
                                    </div>
                                </div>
                            </div> <!--  col-sm-7  -->
                        </div>
                    </div>
                </div> <!--  col-sm-6  -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="event-latest">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                <div class="event-latest-thumbnail">
                                    <a href="#">
                                        <img src="{{ asset('blood/frontend/images/event_2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div> <!--  col-sm-5  -->

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="event-details">
                                    <a class="latest-date" href="#">20 Sep, 2017</a>
                                    <h4 class="event-latest-title">
                                        <a href="#">O- Blood donors needed</a>
                                    </h4>
                                    <p>O Negative blood cells are called “universal” meaning they can be transfused to almost any patient in need and blood cells are safest.</p>
                                    <div class="event-latest-details">
                                        <a class="author" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 10.00am - 3.00pm</a>
                                        <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</a>
                                    </div>
                                </div>
                            </div> <!--  col-sm-7  -->
                        </div>
                    </div>
                </div> <!--  col-sm-6  -->
            </div> <!--  end .row  -->

            <div class="row margin-bottom-30">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="event-latest">
                        <div class="row"> 
                            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                <div class="event-latest-thumbnail">
                                    <a href="#">
                                        <img src="{{ asset('blood/frontend/images/event_3.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div> <!--  col-sm-5  -->

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="event-details">
                                    <a class="latest-date" href="#">20 Sep, 2017</a>
                                    <h4 class="event-latest-title">
                                        <a href="#">You are Somebody’s Type</a>
                                    </h4>
                                    <p>Many people has same blood group like you. so donate now and bring smiles in their face and encourage others for donate blood.</p>
                                    <div class="event-latest-details">
                                        <a class="author" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 10.00am - 3.00pm</a>
                                        <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</a>
                                    </div>
                                </div>
                            </div> <!--  col-sm-7  -->
                        </div>
                    </div>
                </div> <!--  col-sm-6  -->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="event-latest">
                        <div class="row"> 
                            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                <div class="event-latest-thumbnail">
                                    <a href="#">
                                        <img src="{{ asset('blood/frontend/images/event_4.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div> <!--  col-sm-5  -->

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="event-details">
                                    <a class="latest-date" href="#">20 Sep, 2017</a>
                                    <h4 class="event-latest-title">
                                        <a href="#">Donation - Feel Real Peace</a>
                                    </h4>
                                    <p>You're the real hero because you can gift a new life for patient.So donate your blood and enjoy a precious life. Don't fear, it's really easy.</p>
                                    <div class="event-latest-details">
                                        <a class="author" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 10.00am - 3.00pm</a>
                                        <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> California, USA</a>
                                    </div>
                                </div>
                            </div> <!--  col-sm-7  -->
                        </div>
                    </div>
                </div> <!--  col-sm-6  -->
            </div> <!--  end .row  -->    
            <div class="row">
                <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                    <a class="btn btn-load-more" href="#">Load All Campaigns</a>
                </div>
            </div>
        </div> <!--  end .container  --> 
    </section>
@endsection