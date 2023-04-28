@extends('admin.layouts.index')
@push('css')
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('admin.properties.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Products</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table table-responsive">
                        <table class="table table-centered dt-responsive nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Rooms</th>
                                <th>Furnish</th>
                                <th>Status</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                            <tr>
                                <td>
                                    <img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" />
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        <a href="#" class="text-body">{{$property->name}}</a>
                                        <br>
                                        {{$property->slug}}
                                        <br>
                                        <span>{{$property->area}}m<sup>2</sup></span>
                                    </p>
                                </td>
                                <td>
                                    {{$property->categories??''}}
                                </td>
                                <td>
                                    {{$property->property_type}}
                                </td>
                                <td>
                                    {{$property->property_status}}
                                </td>

                                <td>
                                    {{number_format($property->property_price).' đ'}}
                                    <br>
                                    {{number_format($property->property_price_per_meter).' đ'}}
                                    <br>
                                </td>
                                <td>
                                    {{$property->longitude}}
                                    <br>
                                    {{$property->latitude}}
                                </td>
                                <td>
                                    {{$property->rooms}}
                                    <br>
                                    {{$property->bed_rooms}}
                                    <br>
                                    {{$property->bath_rooms}}
                                </td>
                                <td>
                                    <input type="checkbox" class="custom-checkbox">
                                </td>
                                <td>
                                    <input type="checkbox" class="custom-checkbox">
                                </td>

                                <td class="table-action">
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap4.min.js')}}"></script>
@endpush