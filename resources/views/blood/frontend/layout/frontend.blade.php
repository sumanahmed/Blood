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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="{{ asset('blood/frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('blood/frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('blood/frontend/css/venobox.css') }}" rel="stylesheet" type="text/css"/>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
                $('.table').DataTable();
            });
        </script>
        @yield('scripts')
    </body>
</html>