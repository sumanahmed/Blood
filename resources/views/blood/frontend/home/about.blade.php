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
            @foreach($volunters as $volunter)
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="team-layout-1">
                        <figure class="team-member">
                            <a href="#" title="ALEXANDER GARY">
                                <img src="{{ asset($volunter->thumbnail) }}" alt="{{ $volunter->name }}"/>
                            </a>
                        </figure> <!-- end. team-member  -->

                        <article class="team-info">
                            <h3>{{ $volunter->name }}</h3>                                   
                            <h4>{{ $volunter->designation }}</h4>
                        </article>

                        <div class="team-content">
                        </div>
                    </div> <!--  end team-layout-1 -->
                </div> <!--  end .col-md-4 col-sm-12  -->
            @endforeach
        </div> <!-- end .row  --> 
    </div>
</section> 

<section class="section-content-block section-our-team">
    <div class="container wow fadeInUp">
        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Our Videos</h2>
                <p class="section-subheading">A lot of video about donating blood.</p>
            </div> <!-- end .col-sm-10  -->                      

        </div> <!-- end .row  -->
        <div class="row">
            @foreach($videos as $video)
                <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">                    
                    <iframe src="{{ $video->link }}" width="420" height="315" frameborder="0" allowfullscreen></iframe>
                </div> <!--  end .col-md-4 col-sm-12  -->
            @endforeach
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
                @foreach($sponsors as $sponsor) 
                    <div class="client-logo">
                        <a href="{{ $sponsor->link }}" target="_blank">
                            <img src="{{ asset($sponsor->image) }}" alt="{{ $sponsor->title }}" />
                        </a>
                    </div>
                @endforeach
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

                    <h6>Shahriar Sumon</h6>
                    <span>CTO, Fulcrum Design, Dhaka, Bangladesh</span>

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

                    <h6>Rabbil Hasan</h6>
                    <span>MD, Pickme, Bangladesh</span>

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

                    <h6>Tanvir Jalal</h6>
                    <span>CTO, Digicart Solutions, Dhaka, Bangladesh</span>

                </div> <!-- end .testimony-layout-1  -->

            </div> <!--  end col-md-10  --> 

        </div>    
    </div>
</section> 
@endsection