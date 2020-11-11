@extends('blood.frontend.layout.frontend')
@section('title','Gallery')
@section('content')
    <section class="page-header" data-stellar-background-ratio="1.2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>Gallery</h3>
                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / Gallery
                    </p>
                </div>
            </div> 
        </div>
    </section>
    <section class="section-content-block section-secondary-bg">
        <div class="container">
            <div class="row section-heading-wrapper">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading"><span>Photo</span> Gallery</h2>
                    <p class="section-subheading">
                        Campaign photos of different parts of world and our prestigious voluntary work
                    </p>
                </div> 
            </div> <!-- end .row  -->
        </div> <!--  end .container -->
        <div class="container wow fadeInUp">
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
@endsection