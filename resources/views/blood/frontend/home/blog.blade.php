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
                    @foreach($blogs as $blog)
                        <article class="post single-post">
                            <div class="single-post-content">
                                <a title="" href="#">
                                    <img alt="" src="{{ asset($blog->thumbnail) }}" />
                                </a>
                            </div> <!-- end .bd-view  -->
                            <div class="single-post-title">
                                <h2>
                                    <a href="#">{{ $blog->title }}</a>
                                </h2> 
                                <p class="single-post-meta">
                                    <i class="fa fa-user"></i>
                                    &nbsp;Deborah Beck
                                    &nbsp;<i class="fa fa-book"></i>
                                    &nbsp;<a title="View all posts" href="#"> Relation </a>
                                    &nbsp;<i class="fa fa-calendar"></i>
                                    &nbsp;January 19, 2016
                                </p>
                                <p>{{ $blog->description }}</p>
                            </div> <!-- end col-sm-8  -->
                        </article>
                    @endforeach
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
                        <ul class="widget-post-category clearfix">                            
                            @foreach($categories as $category)
                                <li>
                                    <a title="View all posts filed under Environment" href="#">{{ $category->name }}</a>
                                    @php  $blog_count = \App\Models\Blog::where('category_id',$category->id)->count('id'); @endphp
                                    <span class="pull-right badge">{{ $blog_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div> <!--  end .widget -->

                    <div class="widget site-sidebar">
                        <h2 class="widget-title">Recent Posts</h2>
                        @foreach($recent_blogs as $recent_blog)
                            <div class="single-recent-post">
                                <a href="#">{{ $recent_blog->title }}</a>
                                <span><i class="fa fa-calendar icon-color"></i>&nbsp; {{ date('F j, Y', strtotime($recent_blog->created_at)) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div> 
            </div> 
        </div> 
    </section>
@endsection