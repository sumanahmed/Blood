@extends('blood.frontend.layout.frontend')
@section('title','Home')
@section('content')
    <section class="section-banner">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="banner-content">
                        <h2>
                            Donate blood and get real blessings.
                        </h2>					
                        <h3>Blood is the most precious gift that anyone can give to another person.<br>
                            Donating blood not only saves the life also save donor's lives.
                        </h3>
                        <a href="#" class="btn btn-slider">GET APPOINTMENT</a>   
                    </div>
                </div> <!-- end .col-md-12  -->
            </div>
        </div>
    </section>

    <section class="section-content-block section-process">
        <div class="container">
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading"><span>Find</span> Donor</h2>                    
                </div> <!-- end .col-sm-10  -->  
            </div> <!--  end .row  -->

            <div class="row wow fadeInUp mt-5">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="search-form">
                        <form action="{{ route('frontend.index') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="blood_group_id">Blood Group</label>
                                        <select name="blood_group_id" id="blood_group_id" class="form-control select2">
                                            <option value="0">Select</option>
                                            @foreach($blood_groups as $blood_group)
                                                <option value="{{ $blood_group->id }}" @if(isset($_GET['blood_group_id']) && $_GET['blood_group_id'] == $blood_group->id) selected @endif>{{ $blood_group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="division_id">Division</label>
                                        <select name="division_id" id="division_id" class="form-control select2">
                                            <option value="0">Select</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" @if(isset($_GET['division_id']) && $_GET['division_id'] == $division->id) selected @endif>{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="district_id">District</label>
                                        <select name="district_id" id="district_id" class="form-control select2">
                                            <option value="0">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" @if(isset($_GET['district_id']) && $_GET['district_id'] == $district->id) selected @endif>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="thana_id">Thana</label>
                                        <select name="thana_id" id="thana_id" class="form-control select2">
                                            <option value="0">Select</option>
                                            @foreach($thanas as $thana)
                                                <option value="{{ $thana->id }}" @if(isset($_GET['thana_id']) && $_GET['thana_id'] == $thana->id) selected @endif>{{ $thana->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Donor Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Donor Name" class="form-control" style="height: 35px;">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default" style="margin-top: 26px;">Find <i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!--  end .col-lg-3 -->                
            </div> <!--  end .row --> 
            
            <div class="row wow fadeInUp" style="margin-top: 30px;">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="donor_list">
                        @if($donors && $donors->count() > 0)
                            <table class="table table-bordered table-hover table-primary table-responsive" id="dtTable">
                                <tr>
                                    <th>Sl</th>
                                    <th>Blood Group</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Last Donate Date</th>
                                    <th>Current Address</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                                @php $i=1; @endphp
                                @foreach($donors as $donor)
                                    @php 
                                        $start  = date_create($donor->last_donate_date);
                                        $end    = date_create($today);
                                        $days   = date_diff($start, $end)->format("%a");                                                                        
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $donor->bloodGroup->name }}</td>
                                        <td>{{ $donor->name }}</td>
                                        <td><a href="tel:{{ $donor->phone }}" style="color:#000">{{ $donor->phone }}</a></td>
                                        <td>{{ date('d.m.Y', strtotime($donor->last_donate_date)) }}</td>
                                        <td>{{ $donor->current_address }}</td>
                                        <td><img src="{{ asset($donor->thumbnail) }}" style="width: 60px;height:40px;"/></td>
                                        <td>
                                            @if($days > 90)
                                                <span class="bg-green doante_status">Capable</span>
                                            @else
                                                <span class="bg-red doante_status">Not Capable</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else 
                            <h4 class="text-center">Sorry, Donor not found !</h4>
                        @endif
                    </div>
                </div> <!--  end .col-lg-3 -->                    
            </div> <!--  end .row -->             
        </div> <!--  end .container  -->
    </section>
    
    <section class="section-content-block section-process">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading"><span>Donation</span> Process</h2>
                    <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
                </div> <!-- end .col-sm-10  -->                    

            </div> <!--  end .row  -->

            <div class="row wow fadeInUp">
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="process-layout">
                        <figure class="process-img">
                            <img src="{{ asset('blood/frontend/images/process_1.jpg') }}" alt="service" />
                            <div class="step">
                                <h3>1</h3>
                            </div>
                        </figure> <!-- end .cause-img  -->
                        <article class="process-info">
                            <h2>Registration</h2>   
                            <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                        </article>
                    </div> <!--  end .process-layout -->
                </div> <!--  end .col-lg-3 -->
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="process-layout">
                        <figure class="process-img">
                            <img src="{{ asset('blood/frontend/images/process_2.jpg') }}" alt="process" />
                            <div class="step">
                                <h3>2</h3>
                            </div>
                        </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                        <article class="process-info">                                   
                            <h2>Screening</h2>
                            <p>A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                        </article>

                    </div> <!--  end .process-layout -->

                </div> <!--  end .col-lg-3 -->


                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="process-layout">
                        <figure class="process-img">
                            <img src="{{ asset('blood/frontend/images/process_3.jpg') }}" alt="process" />
                            <div class="step">
                                <h3>3</h3>
                            </div>
                        </figure> <!-- end .cause-img  -->
                        <article class="process-info">
                            <h2>Donation</h2>
                            <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                        </article>
                    </div> <!--  end .process-layout -->
                </div> <!--  end .col-lg-3 -->
            </div> <!--  end .row --> 
        </div> <!--  end .container  -->
    </section>

    <section class="section-content-block section-secondary-bg section-our-team">
        <div class="container wow fadeInUp">
            <div class="row section-heading-wrapper">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading">Our Volunteers</h2>
                    <p class="section-subheading">The volunteers who give their time and talents help to fulfill our mission.</p>
                </div> <!-- end .col-sm-10  -->      
            </div> <!-- end .row  -->
            <div class="row">
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="team-layout-1">       
                        <figure class="team-member">
                            <a href="#" title="ALEXANDER GARY">
                                <img src="{{ asset('blood/frontend/images/team_9.jpg') }}" alt="ALEXANDER GARY"/>
                            </a>
                        </figure> <!-- end. team-member  -->

                        <article class="team-info">
                            <h3>ALEXANDER GARY</h3>                                   
                            <h4>Co-Founder</h4>
                        </article>

                        <div class="team-content">
                            <div class="team-social-share text-center clearfix">
                                <a class="fa fa-facebook rectangle" href="#" title="Facebook"></a>
                                <a class="fa fa-twitter rectangle" href="#" title="Twitter"></a>
                                <a class="fa fa-google-plus rectangle" href="#" title="Google Plus"></a>
                                <a class="fa fa-linkedin rectangle" href="#" title="Linkedin"></a>
                            </div> <!-- end .author-social-box  -->
                        </div>     
                    </div> <!--  end team-layout-1 -->
                </div> <!--  end .col-md-4 col-sm-12  -->
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="team-layout-1">
                        <figure class="team-member">
                            <a href="#" title="MELISSA MUNOZ">
                                <img src="{{ asset('blood/frontend/images/team_6.jpg') }}" alt="MELISSA MUNOZ" />
                            </a>
                        </figure> <!-- end. team-member  -->
                        <article class="team-info">
                            <h3>MELISSA MUNOZ</h3>                                   
                            <h4>Founder</h4>
                        </article>
                        <div class="team-content">
                            <div class="team-social-share text-center clearfix">
                                <a class="fa fa-facebook rectangle" href="#" title="Facebook"></a>
                                <a class="fa fa-twitter rectangle" href="#" title="Twitter"></a>
                                <a class="fa fa-google-plus rectangle" href="#" title="Google Plus"></a>
                                <a class="fa fa-linkedin rectangle" href="#" title="Linkedin"></a>
                            </div> <!-- end .author-social-box  -->
                        </div>                             
                    </div> <!--  end team layout-1 -->
                </div> <!--  end .col-md-4 col-sm-12  -->
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="team-layout-1">    
                        <figure class="team-member">
                            <a href="#" title="JOHN ABRAHAM">
                                <img src="{{ asset('blood/frontend/images/team_7.jpg') }}" alt="JOHN ABRAHAM" />
                            </a>          
                        </figure> <!-- end. team-member  -->

                        <article class="team-info">
                            <h3>JOHN ABRAHAM</h3>                                   
                            <h4>Manager</h4>
                        </article>
                        <div class="team-content">

                            <div class="team-social-share text-center clearfix">
                                <a class="fa fa-facebook rectangle" href="#" title="Facebook"></a>
                                <a class="fa fa-twitter rectangle" href="#" title="Twitter"></a>
                                <a class="fa fa-google-plus rectangle" href="#" title="Google Plus"></a>
                                <a class="fa fa-linkedin rectangle" href="#" title="Linkedin"></a>
                            </div> <!-- end .author-social-box  -->
                        </div>      
                    </div> <!--  end team-layout-1 -->
                </div> <!--  end .col-md-4 col-sm-12  -->  
            </div> <!-- end .row  --> 
        </div> <!-- end .container  -->
    </section>

    <section class="cta-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <h2>We are helping people from 40 years</h2>
                    <p>
                        You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                    </p>
                    <a class="btn btn-cta-2" href="#">BECOME VOLUNTEER</a>
                </div> <!--  end .col-md-8  -->
            </div> <!--  end .row  -->
        </div>
    </section>

    <section class="section-appointment">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 
                    <figure class="appointment-img">
                        <img src="{{ asset('blood/frontend/images/appointment.jpg') }}" alt="appointment image">
                    </figure>
                </div> <!--  end col-lg-6  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                    <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Request Appointment</h3>
                        <form class="appoinment-form"> 
                            <div class="form-group col-md-6">
                                <input id="your_name" class="form-control" placeholder="Name" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="your_email" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                                <input id="your_phone" class="form-control" placeholder="Phone" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="select-style">                                    
                                    <select class="form-control" name="your_center">
                                        <option>Donation Center</option>
                                        <option>Los Angles</option>
                                        <option>California</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <input id="your_date" class="form-control" placeholder="Date" type="text">
                            </div>


                            <div class="form-group col-md-6">
                                <input id="your_time" class="form-control" placeholder="Time" type="text">
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea id="textarea_message" class="form-control" rows="4" placeholder="Your Message..."></textarea>
                            </div>                                                          

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button id="btn_submit" class="btn-submit" type="submit">Get Appointment</button>
                            </div>

                        </form>
                    </div> <!-- end .appointment-form-wrapper  -->
                </div> <!--  end .col-lg-6 -->
            </div> <!--  end .row  -->
        </div> <!--  end .container -->
    </section>

    <section class="section-content-block section-secondary-bg">
        <div class="container">
            <div class="row section-heading-wrapper">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading">Photo Gallery</h2>
                    <p class="section-subheading">Campaign photos of different parts of world and our prestigious voluntary work</p>
                </div> <!-- end .col-sm-10  -->            
            </div> <!-- end .row  -->
        </div> <!--  end .container -->
        <div class="container-fluid wow fadeInUp">
            <div class="no-padding-gallery gallery-carousel">
                @foreach($gallerys as $gallery)
                    <a class="gallery-light-box xs-margin" data-gall="myGallery" href="{{ asset($gallery->image) }}">
                        <figure class="gallery-img">
                            <img src="{{ asset($gallery->image) }}" alt="gallery image" />
                        </figure> <!-- end .cause-img  -->
                    </a> <!-- end .gallery-light-box  -->
                @endforeach    
            </div> <!-- end .row  -->
        </div><!-- end .container-fluid  -->
    </section>

    <section class="section-content-block section-home-blog section-pure-white-bg">
        <div class="container wow fadeInUp">
            <div class="row section-heading-wrapper">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading">Recent Blog</h2>
                    <p class="section-subheading">
                        Latest news and statements regarding giving blood, blood processing and supply.
                    </p>
                </div> <!-- end .col-md-12  -->
            </div> <!--  end .row  -->
            <div class="row">
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="latest-news-container"> 
                        <a href="#">
                            <figure>
                                <img src="{{ asset('blood/frontend/images/blog_thumb_1.jpg') }}" alt="latest news">
                            </figure>
                        </a>
                        <div class="news-content">
                            <h3><a href="#">Blood Connects Us All in a Soul</a></h3>
                            <div class="news-meta-info">
                                <i class="fa fa-clock-o"></i> April 4, 2017
                                &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                            </div>                                

                            <div class="update-details">                                     
                                In many countries, demand exceeds supply, and blood services face the challenge of making blood available for patient. 
                            </div>
                        </div>
                    </div><!--  end .update-info  -->
                </div> <!--  end col-lg-4  -->
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="latest-news-container"> 
                        <a href="#">
                            <figure>
                                <img src="{{ asset('blood/frontend/images/blog_thumb_2.jpg') }}" alt="latest news">
                            </figure>
                        </a>
                        <div class="news-content">
                            <h3><a href="#">Give Blood and Save three Lives</a></h3>
                            <div class="news-meta-info">
                                <i class="fa fa-clock-o"></i> April 4, 2017
                                &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                            </div>                                

                            <div class="update-details">                                    
                                To save a life, you don’t need to use muscle. By donating just one unit of blood, you can save three lives or even several lives.
                            </div>
                        </div>
                    </div><!--  end .update-info  -->
                </div> <!--  end col-lg-4  -->
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="latest-news-container"> 
                        <a href="#">
                            <figure>
                                <img src="{{ asset('blood/frontend/images/blog_thumb_3.jpg') }}" alt="latest news">
                            </figure>
                        </a>

                        <div class="news-content">
                            <h3><a href="#">Why Should I donate Blood ?</a></h3>
                            <div class="news-meta-info">
                                <i class="fa fa-clock-o"></i> April 4, 2017
                                &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                            </div>                                

                            <div class="update-details">
                                Blood is the most precious gift that anyone can give to another person.Donating blood not only saves the life also donors.
                            </div>
                        </div>
                    </div><!--  end .update-info  -->
                </div> <!--  end col-lg-4  -->
            </div> <!-- end row  -->
            <div class="row">
                <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                    <a href="#" class="btn btn-load-more">- Load More Blog -</a>
                </div>
            </div> <!-- end .row  -->
        </div> <!-- end .container  -->
    </section> 
@endsection