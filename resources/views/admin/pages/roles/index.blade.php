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
                            <a href="{{route('admin.roles.create')}}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle mr-2"></i> Add Roles</a>
                            <a href="{{route('admin.roles.create.permissions')}}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle mr-2"></i> Add Permissions</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i>
                                </button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <div id="products-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="products-datatable_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                            ></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-centered w-100 dt-responsive nowrap dataTable no-footer dtr-inline"
                                           id="products-datatable" role="grid"
                                           aria-describedby="products-datatable_info" style="width: 1412px;">
                                        <thead class="thead-light">
                                        <tr role="row">
                                            <th rowspan="1" colspan="1" style="width: 20px">
                                                #
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Role name
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Permissions
                                            </th>
                                            <th class="" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 143.8px;">Created date
                                            </th>
                                            <th style="width: 85.6px;" class="" rowspan="1" colspan="1">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr role="row" class="odd">
                                                <td class="dt-checkboxes-cell" tabindex="0">
                                                    {{$role->id}}
                                                </td>
                                                <td>
                                                    {{$role->name}}
                                                </td>
                                                <td>
                                                    @if($role->name=='Super Admin')
                                                        <span class="badge badge-success">All permissions</span>
                                                    @endif
                                                    @foreach($role->permissions->pluck('name')->toArray() as $permission)
                                                        <span class="badge badge-success">{{$permission}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{$role->created_at}}
                                                </td>
                                                <td class="table-action">
                                                    <a href="{{route('admin.roles.edit',$role)}}" class="action-icon">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="action-icon">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="action-icon">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div>
                                        <ul class="pagination pagination-rounded">
                                            {{--                                            {{$roles->links()}}--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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