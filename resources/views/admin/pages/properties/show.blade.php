@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- Product image -->
                            @if (!$property->images->count() > 0 && !file_exists(public_path('storage/' . $property->images[0]->path)))
                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                    <img src="{{asset('storage/meme.jpg')}}" alt="no-found" class="img-fluid" style="max-width: 280px;">
                                </a>
                            @else
                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                    <img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="contact-img" class="img-fluid" style="max-width: 280px;"/>
                                </a>
                                @foreach($property->images as $image)
                                    <div class="d-lg-flex d-none justify-content-center">
                                        <a href="javascript: void(0);">
                                            <img src="{{asset('storage'.'/'.$image->path)}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img"/>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div> <!-- end col -->
                        <div class="col-lg-7">
                            <form class="pl-lg-4">
                                <!-- Product title -->
                                <h3 class="mt-0">{{$property->name}}</h3>
                                <p class="mb-1">Add date:{{$property->created_at}}</p>
                                <!-- Product stock -->
                                <div class="mt-3">
                                    <h4><span class="badge badge-success-lighten">{{$property->status_name}}</span></h4>
                                </div>

                                <!-- Product description -->
                                <div class="mt-4">
                                    <h6 class="font-14">Price</h6>
                                    @if($property->status_name!=='For rent')
                                        <h3> {{number_format($property->property_price).' đ'}}</h3>
                                    @else
                                    <h3> {{number_format($property->property_price).' đ/month'}}</h3>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <h6 class="font-14">Area</h6>
                                    <h3>{{$property->area.'m'}}<sup>2</sup></h3>
                                </div>


                                <!-- Product description -->
                                <div class="mt-4">
                                    <h6 class="font-14">Description:</h6>
                                    {{strip_tags($property->description)}}
                                </div>

                                <!-- Product information -->
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="font-14">Furnished:</h6>
                                            <p class="text-sm lh-150">{{$property->furnish_status}}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="font-14">Number of Orders:</h6>
                                            <p class="text-sm lh-150">5,458</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="font-14">Revenue:</h6>
                                            <p class="text-sm lh-150">$8,57,014</p>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end col -->
                    </div> <!-- end row-->

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-centered mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Outlets</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Revenue</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ASOS Ridley Outlet - NYC</td>
                                <td>$139.58</td>
                                <td>
                                    <div class="progress-w-percent mb-0">
                                        <span class="progress-value">478 </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>$1,89,547</td>
                            </tr>
                            <tr>
                                <td>Marco Outlet - SRT</td>
                                <td>$149.99</td>
                                <td>
                                    <div class="progress-w-percent mb-0">
                                        <span class="progress-value">73 </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>$87,245</td>
                            </tr>
                            <tr>
                                <td>Chairtest Outlet - HY</td>
                                <td>$135.87</td>
                                <td>
                                    <div class="progress-w-percent mb-0">
                                        <span class="progress-value">781 </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>$5,87,478</td>
                            </tr>
                            <tr>
                                <td>Nworld Group - India</td>
                                <td>$159.89</td>
                                <td>
                                    <div class="progress-w-percent mb-0">
                                        <span class="progress-value">815 </span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>$55,781</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection