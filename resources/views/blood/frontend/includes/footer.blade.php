<footer>        
    <section class="footer-widget-area footer-widget-area-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-footer">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <img src="{{ asset('blood/frontend/images/logo-footer.png') }}" alt="" />
                            </div> <!--  end col-lg-3-->
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <p>
                                    We are world largest and trustful blood donation center. We have been working since 1973 with a prestigious vision to helping patient to provide blood.
                                    We are working all over the world, organizing blood donation campaign to grow awareness among the people to donate blood.
                                </p>
                            </div> <!--  end .col-lg-9  -->
                        </div> <!--  end .row -->
                    </div> <!--  end .about-footer  -->
                </div> <!--  end .col-md-12  -->
            </div> <!--  end .row  -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <div class="sidebar-widget-wrapper">
                            <div class="footer-widget-header clearfix">
                                <h3>Subscribe Us</h3>
                            </div>
                            <p>Signup for regular newsletter and stay up to date with our latest news.</p>
                            <div class="footer-subscription">
                                <p>
                                    <input id="mc4wp_email" class="form-control" required="" placeholder="Enter Your Email" name="EMAIL" type="email">
                                </p>
                                <p>
                                    <input class="btn btn-default" value="Subscribe Now" type="submit">
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <!--  end .col-md-4 col-sm-12 -->   					                      

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <div class="sidebar-widget-wrapper">
                            <div class="footer-widget-header clearfix">
                                <h3>Contact Us</h3>
                            </div>  <!--  end .footer-widget-header --> 
                            <div class="textwidget">     
                                @php 
                                    $profile = \App\Models\Profile::find(1);
                                @endphp
                                <i class="fa fa-envelope-o fa-contact"></i> <p><a href="#">{{ $profile->email_1 }}</a></p>
                                <i class="fa fa-location-arrow fa-contact"></i> <p>{{ $profile->address }}</p>
                                <i class="fa fa-phone fa-contact"></i> <p>Cell:&nbsp; {{ $profile->mobile_1 }}</p>   
                            </div>
                        </div> <!-- end .footer-widget-wrapper  -->
                    </div> <!--  end .footer-widget  -->
                </div> <!--  end .col-md-4 col-sm-12 -->   
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-widget clearfix">
                        <div class="sidebar-widget-wrapper">
                            <div class="footer-widget-header clearfix">
                                <h3>Support Links</h3>
                            </div>  <!--  end .footer-widget-header --> 
                            <ul class="footer-useful-links">
                                <li>
                                    <a href="http://www.blooddonorsbd.com/" target="_blank">
                                        <i class="fa fa-caret-right fa-footer"></i>
                                        Blood Donors BD
                                    </a>
                                </li>                                
                                <li>
                                    <a href="https://badhan.org/" target="_blank">
                                        <i class="fa fa-caret-right fa-footer"></i>
                                        Badhan
                                    </a>
                                </li>
                                <li>
                                    <a href="https://blood.quantummethod.org.bd/en" target="_blank">
                                        <i class="fa fa-caret-right fa-footer"></i>
                                        Quantum Method
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.bdquery.com/sandhani-blood-transfusion-posthumous-eye-donation" target="_blank">
                                        <i class="fa fa-caret-right fa-footer"></i>
                                        Sandhani Blood
                                    </a>
                                </li>                               
                                <li>
                                    <a href="http://www.bdrcs.org/donate-blood" target="_blank">
                                        <i class="fa fa-caret-right fa-footer"></i>
                                        Bangladesh Red Cresent Society
                                    </a>
                                </li>
                            </ul>
                        </div> <!--  end .footer-widget  --> 
                    </div> <!--  end .footer-widget  -->     
                </div> <!--  end .col-md-4 col-sm-12 --> 
            </div> <!-- end row  -->
        </div> <!-- end .container  -->
    </section> <!--  end .footer-widget-area  -->

    <!--FOOTER CONTENT  -->

    <section class="footer-contents">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <p class="copyright-text"> Copyright © <?php echo date('Y'); ?>, All Right Reserved - Blood Donation </p>
                </div>  <!-- end .col-sm-6  -->
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="{{ route('frontend.index') }}" title="Home">Home</a></li>
                                <li><a href="{{ route('frontend.about') }}" title="About Us">About Us</a></li>
                                <li><a href="{{ route('frontend.campaign') }}">Campaigns</a></li>
                                <li><a href="{{ route('frontend.faq') }}" title="FAQ">FAQ</a></li>
                                <li><a href="{{ route('frontend.gallery') }}" title="Gallery">Gallery</a></li>
                                <li><a href="{{ route('frontend.blog') }}">Blog</a></li> 
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div> <!--  end .footer-nav  -->
                </div> <!--  end .col-lg-6  -->
            </div> <!-- end .row  -->
        </div> <!--  end .container  -->
    </section> <!--  end .footer-content  -->
</footer>