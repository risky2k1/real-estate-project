<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- third party css -->
    <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    @stack('css')
</head>

<body>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layouts.left-side-bar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('admin.layouts.top-bar')
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$title??''}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('content')

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('admin.layouts.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- third party js -->
<script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.j')}}s"></script>
<script src="{{asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- third party js ends -->
@stack('js')
</body>
</html>