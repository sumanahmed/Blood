@extends('blood.frontend.layout.frontend')
@section('title','Home')
@section('content')
    <div class="slider-wrap">
        <div id="slider_1" class="owl-carousel owl-theme">
            @foreach($sliders as $slider)
                <div class="item">
                    <img src="{{ asset($slider->image) }}" alt="img">
                    <div class="slider-content text-center">
                        <div class="container">

                            <div class="slider-contents-info">
                                <h3>{{ $slider->title }}</h3>
                                <a href="{{ route('donor.register') }}" class="btn btn-slider">Get Appontment <i class="fa fa-long-arrow-right"></i></a>
                            </div> <!-- end .slider-contents-info  -->
                        </div><!-- /.slider-content -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="section-banner">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="banner-content">
                        <h2>
                            Donate blood.
                        </h2>					
                        <h3>Blood is the most precious gift that anyone can give to another person.<br>
                            Donating blood not only saves the life also save donor's lives.
                        </h3>
                        <a href="{{ route('donor.register') }}" class="btn btn-slider">GET APPOINTMENT</a>   
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
                    <div class="donor_list table-responsive">
                        @if($donors && $donors->count() > 0)
                            <table class="table table-bordered table-hover table-primary" id="dtTable">
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
                                        <td style="text-align: center;"><a href="tel:{{ $donor->phone }}" style="color:#000"><i class="fa fa-phone"></i></a></td>
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
                        {{ $donors->links() }}
                </div> <!--  end .col-lg-3 -->                    
            </div> <!--  end .row -->             
        </div> <!--  end .container  -->
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
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="latest-news-container"> 
                            <a href="#">
                                <figure>
                                    <img src="{{ asset($blog->thumbnail) }}" alt="latest news">
                                </figure>
                            </a>
                            <div class="news-content">
                                <h3><a href="#">{{ $blog->title }}</a></h3>
                                <div class="news-meta-info">
                                    <i class="fa fa-clock-o"></i> {{ date('F j, Y', strtotime($blog->created_at)) }}
                                    &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                                </div>                                

                                <div class="update-details">                                     
                                    {{ substr($blog->description,0,50)."..." }}
                                </div>
                            </div>
                        </div><!--  end .update-info  -->
                    </div> 
                @endforeach
            </div> <!-- end row  -->
            <div class="row">
                <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                    <a href="{{ route('frontend.blog') }}" class="btn btn-load-more">- Load More Blog -</a>
                </div>
            </div> <!-- end .row  -->
        </div> <!-- end .container  -->
    </section> 
@endsection