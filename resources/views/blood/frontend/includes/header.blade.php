<header class="main-header clearfix">
    <div class="top-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <p>Welcome to blood donation center.</p>
                </div>
                <div class="col-md-4col-sm-12">
                    <div class="top-bar-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>   
                </div> 
            </div>
        </div> <!--  end .container -->
    </div> <!--  end .top-bar  -->
    <section class="header-wrapper navgiation-wrapper">
        <div class="navbar navbar-default">			
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="{{ route('frontend.index') }}"><img alt="" src="{{ asset('blood/frontend/images/logo.png') }}"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('frontend.index') }}" title="Home">Home</a></li>
                        <li><a href="{{ route('frontend.about') }}" title="About Us">About Us</a></li>
                        <li><a href="{{ route('frontend.campaign') }}">Campaigns</a></li>
                        <li><a href="{{ route('frontend.faq') }}" title="FAQ">FAQ</a></li>
                        <li><a href="{{ route('frontend.gallery') }}" title="Gallery">Gallery</a></li>
                        <li><a href="{{ route('frontend.blog') }}">Blog</a></li> 
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header> <!-- end main-header  -->