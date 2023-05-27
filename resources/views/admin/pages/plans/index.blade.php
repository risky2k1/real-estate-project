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
                            <div>
                                <a href="{{route('admin.properties.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Plan</a>
                            </div>
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
                                <div class="col-sm-12">
                                    <table class="table table-centered w-100 dt-responsive nowrap no-footer dtr-inline" style="width: 100%;">
                                        <thead class="thead-light">
                                        <tr role="row">
                                            <th rowspan="1" colspan="1" style="width: 20px">
                                                #
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Name
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Tag
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Description
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Price
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Signup fee
                                            </th>
                                            <th class="all" tabindex="0"
                                                     rowspan="1" colspan="1" style="width: 381.8px;">Currency
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Trial period
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Trial interval
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Trial mode
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Grace period
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Grace interval
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Invoice period
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Invoice interval
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Tier
                                            </th>
                                            <th class="all" tabindex="0"
                                                rowspan="1" colspan="1" style="width: 381.8px;">Active
                                            </th>
                                            <th style="width: 85.6px;" class="" rowspan="1" colspan="1">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plans as $plan)
                                            <tr role="row" class="odd">
                                                <td class="" tabindex="0">
                                                    {{$plan->id}}
                                                </td>
                                                <td>{{$plan->name}}</td>
                                                <td>{{$plan->tag}}</td>
                                                <td>{{$plan->description}}</td>
                                                <td>{{$plan->price}}</td>
                                                <td>{{$plan->signup_fee}}</td>
                                                <td>{{$plan->currency}}</td>
                                                <td>{{$plan->trial_period}}</td>
                                                <td>{{$plan->trial_interval}}</td>
                                                <td>{{$plan->trial_mode}}</td>
                                                <td>{{$plan->grace_period}}</td>
                                                <td>{{$plan->grace_interval}}</td>
                                                <td>{{$plan->invoice_period}}</td>
                                                <td>{{$plan->invoice_interval}}</td>
                                                <td>{{$plan->tier}}</td>
                                                <td>{{$plan->is_active}}</td>
                                                <td class="table-action">
                                                    <a href="#" class="action-icon">
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
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@push('js')
@endpush
