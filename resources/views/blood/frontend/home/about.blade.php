@extends('blood.frontend.layout.frontend')
@section('title','About Us')
@section('content')
<section class="page-header">
    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    About Us
                </h3>

                <p class="page-breadcrumb">
                    <a href="#">Home</a> / About Us
                </p>


            </div>

        </div> <!-- end .row  -->

    </div>
</section>
<section class="section-content-block section-our-team">
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

    </div>
</section> 

<section class="section-counter">
    <div class="container wow fadeInUp">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-heartbeat icon"></i>
                    <span class="counter">2578</span>                            
                    <h4>Success Smile</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-stethoscope icon"></i>
                    <span class="counter">3235</span>                            
                    <h4>Happy Donors</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-users icon"></i>
                    <span class="counter">3568</span>                             
                    <h4>Happy Recipient</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-building icon"></i>
                    <span class="counter">1364</span>                            
                    <h4>Total Awards</h4>

                </div>

            </div> <!--  end .col-lg-3  -->


        </div> <!-- end row  -->

    </div> 
</section>

<section class="section-client-logo">
    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Our Sponsors</h2>
                <p class="section-subheading">The sponsors who give their valuable amount to fulfill our mission.</p>
            </div> <!-- end .col-sm-10  -->                      

        </div> <!-- end .row  -->


        <div class="row">

            <div class="logo-items logo-layout-1 text-center">

                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_1.jpg') }}" alt="" />

                </div>

                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_2.jpg') }}" alt="" />

                </div>


                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_3.jpg') }}" alt="" />

                </div>



                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_4.jpg') }}" alt="" />

                </div>

                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_5.jpg') }}" alt="" />

                </div>



                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_6.jpg') }}" alt="" />

                </div>

                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_7.jpg') }}" alt="" />

                </div>

                <div class="client-logo">

                    <img src="{{ asset('blood/frontend/images/logo_8.jpg') }}" alt="" />

                </div>


            </div> <!-- end .testimonial-container  -->

        </div> <!-- end row  -->

    </div> 
</section> 

<section class="section-content-block section-client-testimonial">
    <div class="container">
        <div class="testimonial-container text-center">

            <div class="col-md-10 col-md-offset-1 col-sm-12">

                <div class="testimony-layout-1">
                    <h3 class="people-quote">Donor Opinion</h3>
                    <p class="testimony-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        I proudly donate blood on a regular basis because it gives others something they desperately need to survive. Just knowing I can make a difference in someone else’s life makes me feel great!                                 
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </p>

                    <h6>Brandon Munson</h6>
                    <span>CTO, Fulcrum Design, USA</span>

                </div> <!-- end .testimony-layout-1  -->

            </div> <!--  end col-md-10  -->

            <div class="col-md-10 col-md-offset-1 col-sm-12">

                <div class="testimony-layout-1">
                    <h3 class="people-quote">Donor Opinion</h3>
                    <p class="testimony-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        I have been a donor since high school. Although I have not been a donor every year, I always want to give to the human race. I love to help others! Moreover it gives a real peace in my mind.                                   
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </p>

                    <h6>Brandon Munson</h6>
                    <span>CTO, Fulcrum Design, USA</span>

                </div> <!-- end .testimony-layout-1  -->

            </div> <!--  end col-md-10  -->

            <div class="col-md-10 col-md-offset-1 col-sm-12">

                <div class="testimony-layout-1">
                    <h3 class="people-quote">Recipient Opinion</h3>
                    <p class="testimony-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        I wish I could tell you my donor how grateful I am for your selfless act.You gave me new life. We may be coworkers or schoolmates or just two in the same community.I'm very grateful to you.                                   
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </p>

                    <h6>Brandon Munson</h6>
                    <span>CTO, Fulcrum Design, USA</span>

                </div> <!-- end .testimony-layout-1  -->

            </div> <!--  end col-md-10  --> 

        </div>    
    </div>
</section> 

<section class="cta-section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>We are helping people from 40 years</h2>
                <p>
                    You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                </p>
            </div> <!--  end .col-md-8  -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a class="btn btn-cta-1" href="#">Request Appointment</a>
            </div> <!--  end .col-md-4  -->
        </div> <!--  end .row  -->
    </div>
</section> 
@endsection