<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title??'My Land'}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('app-logo.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    @include('front.layouts.css')
    @stack('css')
</head>

<body>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    @include('front.layouts.spinner')
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('front.layouts.nav-bar')
    <!-- Navbar End -->


    <!-- Header Start -->
    @include('front.layouts.header')

    <!-- Header End -->
    <!-- About Start -->
    @include('front.layouts.about')
    <!-- About End -->

    <!-- Category Start -->
{{--    @include('front.layouts.category')--}}
    <!-- Category End -->

    <!-- Search Start -->
    @include('front.layouts.search')
    <!-- Search End -->

    <!-- Property List Start -->
    @yield('content')
    <!-- Property List End -->


    <!-- Call to Action Start -->
    @include('front.layouts.call-to-action')
    <!-- Call to Action End -->


    <!-- Team Start -->
    @include('front.layouts.team')
    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('front.layouts.testimonial')
    <!-- Testimonial End -->


    <!-- Footer Start -->
    @include('front.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
@include('front.layouts.js')
@stack('js')
</body>

</html>
