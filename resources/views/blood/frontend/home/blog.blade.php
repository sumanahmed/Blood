@extends('blood.frontend.layout.frontend')
@section('title','Blog')
@section('content')
    <section class="page-header" data-stellar-background-ratio="1.2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Gallery</h3>
                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / Blog
                    </p>
                </div>
            </div> 
        </div>
    </section>
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <article class="post single-post">
                        <div class="single-post-content">
                            <a title="" href="#">
                                <img alt="" src="{{ asset('blood/frontend/images/blog_1.jpg') }}" />
                            </a>
                        </div> <!-- end .bd-view  -->
                        <div class="single-post-title">
                            <h2>
                                <a href="#">
                                    Blood Connects Us All in a Soul.Let's donate without hesitation.
                                </a>
                            </h2> 
                            <p class="single-post-meta">
                                <i class="fa fa-user"></i>
                                &nbsp;Deborah Beck
                                &nbsp;<i class="fa fa-book"></i>
                                &nbsp;<a title="View all posts" href="#"> Relation </a>
                                &nbsp;<i class="fa fa-calendar"></i>
                                &nbsp;January 19, 2016
                            </p>
                            <p>We have adopted the slogan “Share life, give blood”, to draw attention to the roles that voluntary donation systems play in encouraging people to care for one another and promote community cohesion.</p>
                        </div> <!-- end col-sm-8  -->
                    </article>
                    <div class="blog-pagination text-center clearfix">    
                        <ul class="pagination">
                            <li><a href="#" class="prev page-numbers"><i class="fa fa-caret-left"></i></a></li>
                            <li><a href="#" class="page-numbers">1</a></li>
                            <li><a href="#" class="page-numbers current">2</a></li>
                            <li><a href="#" class="page-numbers">3</a></li>
                            <li><a href="#" class="next page-numbers"><i class="fa fa-caret-right"></i></a></li>          
                        </ul> <!-- end pagination  -->
                    </div> <!--  end blog-pagination -->
                </div> <!--  end col-sm-8 -->

                <div class="col-md-4 col-sm-12">
                    <div class="widget site-sidebar">
                        <h2 class="widget-title">Search</h2>
                        <form action="index.html" id="search-form" class="search-form" role="form" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search....">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="hidden" value="submit" />
                        </form> <!-- end #search-form  -->
                    </div> <!--  end .widget -->      
                    <div class="widget site-sidebar">
                        <h2 class="widget-title">Categories</h2>
                        <ul class="widget-post-category clearfix">                            <li>
                                <a title="View all posts filed under Environment" href="#">Blood Relation</a>
                                <span class="pull-right badge">42</span>
                            </li>
                            <li>
                                <a title="View all posts filed under Technology" href="#">AB- Blood donor</a>
                                <span class="pull-right badge">40</span>
                            </li>
                            <li>
                                <a title="View all posts filed under Health" href="#">Keep Safe Blood</a>
                                <span class="pull-right badge">32</span>
                            </li>
                            <li>
                                <a title="View all posts filed under Disaster" href="#">Preserve Blood</a>
                                <span class="pull-right badge">26</span>
                            </li>
                            <li>
                                <a title="View all posts filed under Environment Right" href="#">Donation center</a>
                                <span class="pull-right badge">18</span>
                            </li>
                            <li>
                                <a title="View all posts filed under Education" href="#">Proper Education</a>
                                <span class="pull-right badge">12</span>
                            </li>
                        </ul>
                    </div> <!--  end .widget -->

                    <div class="widget site-sidebar">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="single-recent-post">
                            <a href="#">Zomato Commits to Making Food Delivery</a>
                            <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 19, 2017</span>
                        </div>
                        <div class="single-recent-post">
                            <a href="#">Make Kalam's House A Knowledge Centre</a>
                            <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 18, 2017</span>
                        </div>
                        <div class="single-recent-post">
                            <a href="#">Central Government Retracts Proposal</a>
                            <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 17, 2017</span>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </section>
@endsection