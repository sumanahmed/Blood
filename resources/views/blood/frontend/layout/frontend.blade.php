<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>@yield('title') - Blood Donation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">        
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('blood/frontend/images/favicon.png') }}" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- The styles -->
        <link href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="{{ asset('blood/frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('blood/frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/venobox.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('blood/admin/css/toastr.css') }}">
        <link href="{{ asset('blood/frontend/css/styles.css') }}" rel="stylesheet"/>
        <link href="{{ asset('blood/frontend/css/custom.css') }}" rel="stylesheet"/>
        @yield('styles')
    </head>
    <body> 
        <!-- <div id="preloader">
            <span class="margin-bottom"><img src="{{ asset('blood/frontend/images/loader.gif') }}" alt="" /></span>
        </div> -->
        @include('blood.frontend.includes.header')
        @yield('content')
        @include('blood.frontend.includes.footer') 
        <!-- Back To Top Button  -->
        <a id="backTop">Back To Top</a>
        <script src="{{ asset('blood/frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/wow.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/jquery.backTop.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/waypoints-sticky.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/venobox.min.js') }}"></script>
        <script src="{{ asset('blood/frontend/js/custom-scripts.js') }}"></script>        
        <script src="{{ asset('blood/admin/js/toastr.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#dtTable').DataTable();
            });

            //get district by division_id
            jQuery('#division_id').on('change', function() {
                var division_id = jQuery(this).val();
                console.log('yess');
                jQuery.get('/district/'+ division_id,function(data){ 
                    jQuery("#district_id").empty();
                    jQuery("#district_id").append('<option selected disabled>Select</option>');
                    for(var i=0; i < data.length; i++){
                        jQuery("#district_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }
                });
            });

            //show district by division_id
            jQuery('#district_id').on('change', function() {
                var district_id = jQuery(this).val();
                jQuery.get('/thana/'+ district_id,function(data){
                    jQuery("#thana_id").empty();
                    jQuery("#thana_id").append('<option selected disabled>Select</option>');
                    for(var i=0; i < data.length; i++){
                        jQuery("#thana_id").append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }
                });
            });
        </script>
        @if(Session::has('error_message'))
            <script>
                toastr.error("{{ Session::get('error_message') }}")
            </script>
        @endif
        @if(Session::has('message'))
            <script>
                toastr.success("{{ Session::get('message') }}")
            </script>
        @endif
        @yield('scripts')
    </body>
</html>