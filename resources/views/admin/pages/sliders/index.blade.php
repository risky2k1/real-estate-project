@extends('admin.layouts.index')
@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('admin.sliders.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Slider</a>
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
                                <th>Slider Name</th>
                                <th>Image</th>
                                <th>Active</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="#"  class="text-body">{{$slider->name}}</a>
                                            <br>
                                            <span></span>
                                        </p>
                                    </td>
                                    <td>
                                        <img src="{{asset('storage/'.$slider->path)}}" alt="" style="width: 300px;height: 300px">
                                    </td>
                                    <td>
                                        <input class="slider-checkbox" data-id="{{$slider->id}}" type="checkbox" id="slider_checkbox" @if($slider->is_active==true) checked  @endif>
                                    </td>

                                    <td class="table-action">
                                        {{--                                        <a href="{{route('admin.sliders.show',$slider)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>--}}
                                        {{--                                        <a href="{{route('admin.sliders.edit',$slider)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>--}}
                                        <form action="{{route('admin.sliders.destroy',$slider)}}" method="post" id="delete_slider">
                                            @csrf
                                            @method('delete')
                                            <a href="javascript:{}" class="action-icon" onclick="document.getElementById('delete_slider').submit();"><i class="mdi mdi-delete"></i></a>
                                        </form>
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
    <script>
        $(document).ready(function() {
            $('.slider-checkbox').change(function() {
                var is_active = $(this).is(':checked')
                if (is_active==='true'){
                    is_active =1;
                }
                else is_active=0;
                var id = $(this).attr('data-id');
                console.log(is_active);
                console.log(id);
                $.ajax({
                    url: '/admin/sliders/status-update/' + {{$slider->id??''}},
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        is_active: is_active,
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
