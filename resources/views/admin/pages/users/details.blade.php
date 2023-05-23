@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{$user->avatar}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{$user->name}}</h4>
                    <p class="text-muted font-14">Role</p>

                    <a href="{{url('/chatify/'.$user->id)}}" type="button" class="btn btn-danger btn-sm mb-2">Message</a>

                    <div class="text-left mt-3">
                        <p class="text-muted mb-2 font-13">
                            <strong>Full Name :</strong>
                            <span class="ml-2">{{$user->name}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong>Mobile :</strong>
                            <span class="ml-2">{{$user->phone}}</span>
                        </p>
                        <p class="text-muted mb-2 font-13">
                            <strong>Email :</strong>
                            <span class="ml-2 ">{{$user->email}}</span>
                        </p>
                    </div>

                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                        class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                        class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                        class="mdi mdi-github-circle"></i></a>
                        </li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false"
                               class="nav-link rounded-0 active">
                                Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="aboutme">
                            <!-- end timeline -->

                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                Projects</h5>
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
                                            <td><img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="table-user" class="mr-2 rounded-circle" width="64" height="64">{{$property->name}}
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

                        <div class="tab-pane show active" id="settings">
                            <form action="{{route('admin.users.update',$user)}}" method="post">
                                @csrf
                                @method('patch')
                                <h5 class="mb-4 text-uppercase">
                                    <i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="first_name"
                                                   value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" name="last_name"
                                                   value="{{$user->last_name}}">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="userbio">Bio</label>
                                            <textarea class="form-control" id="userbio" rows="4"
                                                      placeholder="Write something..."
                                                      name="bio">{{$user->bio}}</textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="useremail">Email Address</label>
                                            <input type="email" class="form-control" id="useremail"
                                                   value="{{$user->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                            class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyname">Company Name</label>
                                            <input type="text" class="form-control" id="companyname"
                                                   placeholder="Enter company name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cwebsite">Website</label>
                                            <input type="text" class="form-control" id="cwebsite"
                                                   placeholder="Enter website url">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-fb">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="mdi mdi-facebook"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-fb"
                                                       placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-tw">Twitter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="mdi mdi-twitter"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-tw"
                                                       placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-insta">Instagram</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="mdi mdi-instagram"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-insta"
                                                       placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-lin">Linkedin</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="mdi mdi-linkedin"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-lin"
                                                       placeholder="Url">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-sky">Skype</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-sky"
                                                       placeholder="@username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-gh">Github</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="mdi mdi-github-circle"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="social-gh"
                                                       placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-2"><i
                                                class="mdi mdi-content-save"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
