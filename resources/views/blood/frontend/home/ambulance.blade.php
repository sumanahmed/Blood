@extends('blood.frontend.layout.frontend')
@section('title','Home')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>
                        Ambulance
                    </h3>
                    <p class="page-breadcrumb">
                        <a href="#">Home</a> / Ambulance
                    </p>
                </div>
            </div> <!-- end .row  -->
        </div>
    </section>
    <section class="section-content-block section-process">
        <div class="container">
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="section-heading"><span>Find</span> Ambulance</h2>                    
                </div> <!-- end .col-sm-10  -->  
            </div> <!--  end .row  -->

            <div class="row wow fadeInUp" style="margin-top: 30px;">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="donor_list table-responsive">
                        @if($ambulances && $ambulances->count() > 0)
                            <table class="table table-bordered table-hover table-primary" id="dtTable">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Driver Name</th>
                                    <th>Driver Mobile No</th>
                                    <th>Current Status</th>
                                </tr>
                                @php $i=1; @endphp
                                @foreach($ambulances as $ambulance)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $ambulance->name }}</td>
                                        <td>{{ $ambulance->driver_name }}</td>
                                        <td>{{ $ambulance->driver_phone }}</td>
                                        <td>{{ $ambulance->current_status == 1 ? 'In Fare' : 'Out of Fare' }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else 
                            <h4 class="text-center">Sorry, ambulance not found !</h4>
                        @endif
                    </div>
                    {{ $ambulances->links() }}
                </div> <!--  end .col-lg-3 -->                    
            </div> <!--  end .row -->             
        </div> <!--  end .container  -->
    </section>
@endsection