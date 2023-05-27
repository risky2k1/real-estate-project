@extends('admin.layouts.index')
@push('css')
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('admin.properties.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Property</a>
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
                        <table class="table table-centered dt-responsive">
                            <thead class="thead-light">
                            <tr>
                                <th>Property Information</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>Rooms</th>
                                <th>Furnish</th>
                                <th>Status</th>
                                <th style="width: 85px;">Action</th>
                                <th>Approve</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div style="width: 100px">
                                                @if ($property->images->count() > 0 && file_exists(public_path('storage/' . $property->images[0]->path)))
                                                    <img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="contact-img" title="contact-img" class="rounded mr-3" height="64" width="64"/>
                                                @else
                                                    <img src="{{asset('storage/meme.jpg')}}" alt="no-found" class="rounded mr-3" height="48">
                                                @endif
                                            </div>
                                            <div>
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="#" class="text-body">{{$property->name}}</a>
                                                    <br>
                                                    <span>{{$property->area}}m<sup>2</sup></span>
                                                </p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        {{$property->categories->pluck('name')->implode(',')??''}}
                                    </td>
                                    <td>
                                        {{$property->status_name}}
                                    </td>
                                    <td>
                                        @if($property->status_name !=='For rent')
                                            {{number_format($property->property_price).' đ'}}
                                            <br>
                                            {{number_format($property->property_price/$property->area).' đ/ m'}}<sup>2</sup>
                                            <br>
                                        @else
                                            {{number_format($property->property_price).' đ / month'}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$property->longitude}}
                                        <br>
                                        {{$property->latitude}}
                                    </td>
                                    <td>
                                        <i class="mdi mdi-door"></i>
                                        {{$property->rooms}}
                                        <br>
                                        <i class="mdi mdi-bed-empty"></i>
                                        {{$property->bed_rooms}}
                                        <br>
                                        <i class="mdi mdi-shower"></i>
                                        {{$property->bath_rooms}}
                                    </td>
                                    <td>
                                        @if($property->furnished==1)
                                            <span class="badge badge-success-lighten">Furnished</span>
                                        @else
                                            <span class="badge badge-danger-lighten">Unfurnished</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($property->is_active==1)
                                            <span class="badge_1 badge badge-success-lighten">Active</span>
                                        @else
                                            <span class="badge_2 badge badge-danger-lighten">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="table-action">
                                        <a href="{{route('admin.properties.show',$property)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="{{route('admin.properties.edit',$property)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" class="property-checkbox" data-id="{{$property->id}}" {{$property->is_active==true?'checked':''}} >
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
    <script>
        $(document).ready(function () {
            $('.property-checkbox').change(function () {
                let propertyId = $(this).data('id');
                let is_active = $(this).prop("checked");
                console.log(propertyId)
                console.log(is_active)
                if (is_active === true) {
                    is_active = 1;
                } else is_active = 0;
                $.ajax({
                    url: '/admin/properties/change-status',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        propertyId: propertyId,
                        is_active: is_active,
                    },
                    success: function (response) {
                        console.log(response.data);
                        $('.badge_2').removeClass('badge-danger-lighten').addClass('badge-success-lighten');
                        $.toast({
                            heading: 'Thành công',
                            text: 'Bạn vừa thay đổi trạng thái thành công',
                            icon: 'success',
                            loader: true,        // Change it to false to disable loader
                            loaderBg: '#9EC600',
                            position :'top-right',// To change the background
                        });
                    },
                    error: function (response) {
                        console.log('0000')
                    }
                });
            });
        });
    </script>
@endpush
