@extends('front.layouts.master')
@push('css')
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
@endpush
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
    <div class="container-fluid">

        <!-- start page title -->
       
        <!-- end page title -->


        <div class="row justify-content-center">
            <div class="col-xl-10">

                <!-- Pricing Title-->
                <div class="text-center">
                    <h3 class="mb-2">Our Plans and Pricing</h3>
                    <p class="text-muted w-50 m-auto">
                        We have plans and prices that fit your business perfectly. Make your client site a success with our products.
                    </p>
                </div>

                <!-- Plans -->
                <div class="row mt-sm-5 mt-3 mb-3">
                    <div class="col-md-4">
                        <div class="card card-pricing">
                            <div class="card-body text-center">
                                <p class="card-pricing-plan-name font-weight-bold text-uppercase">Professional Pack</p>
                                <i class="card-pricing-icon dripicons-user text-primary"></i>
                                <h2 class="card-pricing-price">$19 <span>/ Month</span></h2>
                                <ul class="card-pricing-features">
                                    <li>10 GB Storage</li>
                                    <li>500 GB Bandwidth</li>
                                    <li>No Domain</li>
                                    <li>1 User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div> <!-- end Pricing_card -->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card card-pricing card-pricing-recommended">
                            <div class="card-body text-center">
                                <div class="card-pricing-plan-tag">Recommended</div>
                                <p class="card-pricing-plan-name font-weight-bold text-uppercase">Business Pack</p>
                                <i class="card-pricing-icon dripicons-briefcase text-primary"></i>
                                <h2 class="card-pricing-price">$29 <span>/ Month</span></h2>
                                <ul class="card-pricing-features">
                                    <li>50 GB Storage</li>
                                    <li>900 GB Bandwidth</li>
                                    <li>2 Domain</li>
                                    <li>10 User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div> <!-- end Pricing_card -->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <div class="card card-pricing">
                            <div class="card-body text-center">
                                <p class="card-pricing-plan-name font-weight-bold text-uppercase">Enterprise Pack</p>
                                <i class="card-pricing-icon dripicons-store text-primary"></i>
                                <h2 class="card-pricing-price">$39 <span>/ Month</span></h2>
                                <ul class="card-pricing-features">
                                    <li>100 GB Storege</li>
                                    <li>Unlimited Bandwidth</li>
                                    <li>10 Domain</li>
                                    <li>Unlimited User</li>
                                    <li>Email Support</li>
                                    <li>24x7 Support</li>
                                </ul>
                                <button class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                            </div>
                        </div> <!-- end Pricing_card -->
                    </div> <!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- end col-->
        </div>
        <!-- end row -->
    </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
@endpush
