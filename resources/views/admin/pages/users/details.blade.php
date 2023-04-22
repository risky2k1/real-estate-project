@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{$user->avatar}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{$user->name}}</h4>
                    <p class="text-muted font-14">Role</p>

                    <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

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

                            <h5 class="text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                Experience</h5>

                            <div class="timeline-alt pb-0">
                                <div class="timeline-item">
                                    <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                        <p class="font-14">websitename.com <span
                                                    class="ml-2 font-12">Year: 2015 - 18</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-3">Everyone realizes why a new common language
                                            would be desirable: one could refuse to pay expensive translators.
                                            To achieve this, it would be necessary to have uniform grammar,
                                            pronunciation and more common words.</p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="mdi mdi-circle bg-primary-lighten text-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                        <p class="font-14">Software Inc. <span
                                                    class="ml-2 font-12">Year: 2012 - 15</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-3">If several languages coalesce, the grammar
                                            of the resulting language is more simple and regular than that of
                                            the individual languages. The new common language will be more
                                            simple and regular than the existing European languages.</p>

                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                        <p class="font-14">Coderthemes Design LLP <span class="ml-2 font-12">Year: 2010 - 12</span>
                                        </p>
                                        <p class="text-muted mt-2 mb-0 pb-2">The European languages are members of
                                            the same family. Their separate existence is a myth. For science
                                            music sport etc, Europe uses the same vocabulary. The languages
                                            only differ in their grammar their pronunciation.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end timeline -->

                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                Projects</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Clients</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="assets/images/users/avatar-2.jpg" alt="table-user"
                                                 class="mr-2 rounded-circle" height="24"> Halette Boivin
                                        </td>
                                        <td>App design and development</td>
                                        <td>01/01/2015</td>
                                        <td>10/15/2018</td>
                                        <td><span class="badge badge-info-lighten">Work in Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="assets/images/users/avatar-3.jpg" alt="table-user"
                                                 class="mr-2 rounded-circle" height="24"> Durandana Jolicoeur
                                        </td>
                                        <td>Coffee detail page - Main Page</td>
                                        <td>21/07/2016</td>
                                        <td>12/05/2018</td>
                                        <td><span class="badge badge-danger-lighten">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                 class="mr-2 rounded-circle" height="24"> Lucas Sabourin
                                        </td>
                                        <td>Poster illustation design</td>
                                        <td>18/03/2018</td>
                                        <td>28/09/2018</td>
                                        <td><span class="badge badge-success-lighten">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="assets/images/users/avatar-6.jpg" alt="table-user"
                                                 class="mr-2 rounded-circle" height="24"> Donatien Brunelle
                                        </td>
                                        <td>Drinking bottle graphics</td>
                                        <td>02/10/2017</td>
                                        <td>07/05/2018</td>
                                        <td><span class="badge badge-info-lighten">Work in Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img src="assets/images/users/avatar-5.jpg" alt="table-user"
                                                 class="mr-2 rounded-circle" height="24"> Karel Auberjo
                                        </td>
                                        <td>Landing page design - Home</td>
                                        <td>17/01/2017</td>
                                        <td>25/05/2021</td>
                                        <td><span class="badge badge-warning-lighten">Coming soon</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end tab-pane -->
                        <!-- end about me section content -->

                        <div class="tab-pane show active" id="settings">
                            <form action="{{route('admin.users.update')}}" method="post">
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