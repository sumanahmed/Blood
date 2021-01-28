@extends('blood.frontend.layout.frontend')
@section('title','Home')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>
                        Telemedicine
                    </h3>
                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / Telemedicine
                    </p>
                </div>
            </div> <!-- end .row  -->
        </div>
    </section>
    <section class="section-content-block section-process">
        <div class="container">
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading">Get Medicine Suggestion</h2>                    
                </div> <!-- end .col-sm-10  -->  
            </div> <!--  end .row  -->

            <div class="row wow fadeInUp mt-5">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="search-form">
                        <form action="{{ route('frontend.telemedicine') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="symptom_id">Symptom</label>
                                        <select name="symptom_id" id="symptom_id" class="form-control select2">
                                            <option value="0">Select</option>
                                            @foreach($symptoms as $symptom)
                                                <option value="{{ $symptom->id }}" @if(isset($_GET['symptom_id']) && $_GET['symptom_id'] == $symptom->id) selected @endif>{{ $symptom->name }}</option>
                                            @endforeach
                                        </select>
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
                        @if($medicines && $medicines->count() > 0)
                            <table class="table table-bordered table-hover table-primary" id="dtTable">
                                <tr>
                                    <th>Sl</th>
                                    <th>Symptom</th>
                                    <th>Medicine</th>
                                    <th>Type</th>
                                    <th>Dose</th>
                                </tr>
                                @php $i=1; @endphp
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $medicine->symptom_name }}</td>
                                        <td>{{ $medicine->name }}</td>
                                        @if($medicine->status == 1)
                                            <td>Table</td>
                                        @elseif($medicine->status == 2)
                                            <td>Capsule</td>
                                        @else
                                            <td>Table</td>
                                        @endif
                                        <td>{{ $medicine->dose }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else 
                            <h4 class="text-center">Sorry, Medicine not found !</h4>
                        @endif
                    </div>
                        {{ $medicines->links() }}
                </div> <!--  end .col-lg-3 -->                    
            </div> <!--  end .row -->      
            
            @if($medicines && $medicines->count() > 0)
                <div class="row wow fadeInUp" style="margin-top: 30px;"> 
                    <div class="col-md-3">
                        <img class="img-responsive profile-img" src="{{ asset($medicines[0]->image) }}"/>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content">
                            <p>Name: {{ $medicines[0]->doctor_name }}</p>
                            <p>Specialist: {{ $medicines[0]->specialist }}</p>
                            <p>Designation: {{ $medicines[0]->designation }}</p>
                            <p>Siting Place: {{ $medicines[0]->siting_place }}</p>
                            <a href="#" class="btn btn-success">Book Now</a>
                        </div>
                    </div>
                </div>
            @endif
        </div> <!--  end .container  -->
    </section>
@endsection