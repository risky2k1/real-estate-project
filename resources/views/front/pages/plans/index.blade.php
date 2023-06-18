@extends('front.layouts.master')
@push('css')
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>
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
                            <h3 class="mb-2">Các gói</h3>
                            <p class="text-muted w-50 m-auto">
                                Lựa chọn gói phù hợp với nhu cầu của bạn
                            </p>
                        </div>

                        <!-- Plans -->
                        <div class="row mt-sm-5 mt-3 mb-3">
                            @foreach($plans as $plan)
                                <div class="col-md-4">
                                    <div class="card card-pricing">
                                        <div class="card-body text-center">
                                            <p class="card-pricing-plan-name font-weight-bold text-uppercase">{{$plan->name}}</p>
                                            <i class="card-pricing-icon dripicons-user text-primary"></i>
                                            <h2 class="card-pricing-price">{{$plan->price}}$ <span>/ Month</span></h2>
                                            <ul class="card-pricing-features">
                                                <li>{{$plan->getFeatureByTag('post_per_day')->value}} bài viết /tuần</li>
                                                @if($plan->getFeatureByTag('feature_property'))
                                                    <li>{{$plan->getFeatureByTag('feature_property')->name}}</li>
                                                @endif
                                                <li>Hỗ trợ 24/7</li>
                                            </ul>
                                            <form action="{{route('plans.vnPay',$plan)}}" method="post">
                                                @csrf
                                                <button type="submit" name="redirect" class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</button>
                                            </form>
                                        </div>
                                    </div> <!-- end Pricing_card -->
                                </div> <!-- end col -->
                            @endforeach
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
