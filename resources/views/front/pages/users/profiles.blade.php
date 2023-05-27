@php use Illuminate\Support\Facades\Auth; @endphp
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
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{$user->avatar}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <h4 class="mb-0 mt-2">{{$user->name??'Tún'}}</h4>
                                <p class="text-muted font-14">{{$user->roles->pluck('name')->implode(',')}}</p>
                                <div class="text-left mt-3">
                                    <h4 class="font-13 text-uppercase">About Me :</h4>
                                    <p class="text-muted font-13 mb-3">
                                        {{$user->bio}}
                                    </p>
                                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{$user->full_name??'Tunss'}}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{$user->phone}}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{$user->email}}</span></p>

                                </div>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->


                    </div> <!-- end col-->

                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    <li class="nav-item">
                                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                            Thông tin
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#plan" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                            Gói đăng kí
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                            Thiết lập
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="aboutme">
                                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                            Bài đăng</h5>
                                        @if($properties->count()==0)
                                            <span class="text-danger">Bạn chưa có bài đăng nào cả, hãy đăng kí và bắt đầu đăng bài thôi</span>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Thông tin</th>
                                                    <th>Ngày đăng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($properties as $property)
                                                    <tr>
                                                        <td>{{$property->id}}</td>
                                                        <td><img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="table-user" class="mr-2 rounded-circle" width="64"
                                                                 height="64">{{$property->name}}
                                                        </td>
                                                        <td>{{$property->created_at}}</td>
                                                        <td>
                                                            @if($property->is_active==false)
                                                                <span class="badge badge-warning">Chờ duyệt</span>
                                                            @else
                                                                <span class="badge badge-success">Đã duyệt</span>
                                                            @endif
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div> <!-- end tab-pane -->
                                    <!-- end about me section content -->
                                    <div class="tab-pane" id="plan">
                                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                            Gói đăng kí thành viên của bạn
                                        </h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Thông tin</th>
                                                    <th>Ngày đăng kí</th>
                                                    <th>Thời gian còn lại</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    @if($user->subscriptions->first()!=null)
                                                        <td>
                                                            {{$user->subscription()->plan->name??''}}
                                                        </td>
                                                        <td>{{$user->subscription()->created_at??''}}</td>
                                                        <td>
                                                            {{$user->subscription()->getSubscriptionTotalDurationIn('day').' ngày'??''}}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{route('plans.index')}}" class="btn btn-warning">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form action="{{route('plans.vnPay',$user->subscription()->plan??'')}}" method="post">
                                                                @csrf
                                                                <button type="submit" name="redirect" class="btn btn-success">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </form>

                                                            <a href="{{route('plans.cancel')}}" class="btn btn-danger">
                                                                <i class="fa fa-x">X</i>
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="settings">
                                        <form>
                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Thông tin cá nhân</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname">Họ</label>
                                                        <input type="text" class="form-control" id="firstname" name="first_name" placeholder="Enter first name" value="{{$user->first_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Tên</label>
                                                        <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Enter last name" value="{{$user->last_name}}">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="userbio">Giới thiệu</label>
                                                        <textarea class="form-control" id="userbio" rows="4" name="bio" placeholder="Write something...">{{$user->bio}}</textarea>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email </label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone </label>
                                                        <input type="email" class="form-control" id="phone" name="phone" placeholder="Enter email" value="{{$user->phone}}">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                            </div>
                                        </form>
                                        @include('profile.partials.update-password-form')

                                    </div>
                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
@endpush
