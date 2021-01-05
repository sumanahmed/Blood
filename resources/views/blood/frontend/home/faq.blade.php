@extends('blood.frontend.layout.frontend')
@section('title','Faq')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>FAQ</h3>
                <p class="page-breadcrumb">
                    <a href="#">Home</a> / FAQ
                </p>
            </div>
        </div> 
    </div> 
</section> 
<section class="section-content-block section-faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">F.A.Q</h2>
                <p class="section-subheading">
                    know more about blood donation and know how you can help people.
                </p>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="accordion">
                @foreach($faqs as $faq)
                    <div class="panel panel-default faq-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $faq->id }}" >{{ $faq->question }}</a>
                            </h4>
                        </div>
                        <div id="collapse{{ $faq->id }}" class="panel-collapse collapse">
                            <div class="panel-body"> {{ $faq->answer }}</div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- end .col-md-6  -->
        </div> <!-- end .row  -->
    </div> 
</section> 
@endsection