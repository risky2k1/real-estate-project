@extends('admin.layouts.index')
@push('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet'/>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter project name">
                            </div>

                            <div class="form-group">
                                <label for="project-overview">Overview</label>
                                <textarea class="form-control" id="project-overview" rows="5" placeholder="Enter some brief about project.."></textarea>
                            </div>

                            <!-- Date View -->
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="d-M-yyyy" data-date-autoclose="true">
                            </div>

                            <div class="form-group">
                                <label for="project-budget">Budget</label>
                                <input type="text" id="project-budget" class="form-control" placeholder="Enter project budget">
                            </div>

                            <div class="form-group mb-0">
                                <label for="project-overview">Team Members</label>

                                <select class="form-control select2" data-toggle="select2">
                                    <option>Select</option>
                                    <option value="AZ">Mary Scott</option>
                                    <option value="CO">Holly Campbell</option>
                                    <option value="ID">Beatrice Mills</option>
                                    <option value="MT">Melinda Gills</option>
                                    <option value="NE">Linda Garza</option>
                                    <option value="NM">Randy Ortez</option>
                                    <option value="ND">Lorene Block</option>
                                    <option value="UT">Mike Baker</option>
                                </select>

                                <div class="mt-2">
                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme" class="d-inline-block">
                                        <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty" class="d-inline-block">
                                        <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson" class="d-inline-block">
                                        <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lorene Block" class="d-inline-block">
                                        <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mike Baker" class="d-inline-block">
                                        <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>
                                </div>

                            </div>

                        </div> <!-- end col-->

                        <div class="col-xl-6">
                            <div class="form-group mt-3 mt-xl-0">
                                <label for="projectname" class="mb-0">Avatar</label>
                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                      data-upload-preview-template="#uploadPreviewTemplate">
                                    <div class="fallback">
                                        <input name="file" type="file" />
                                    </div>

                                    <div class="dz-message needsclick">
                                        <i class="h3 text-muted dripicons-cloud-upload"></i>
                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </form>

                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                <!-- file preview template -->
                                <div class="d-none" id="uploadPreviewTemplate">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                        <i class="dripicons-cross"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end file preview template -->
                            </div>

                            <!-- Date View -->
                            <div class="form-group">
                                <label>Due Date</label>
                                <input type="text" class="form-control" data-provide="datepicker" data-date-format="d-M-yyyy" data-date-autoclose="true">
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
    <!-- init js -->
    <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidHVhbnRhbXR1b25nIiwiYSI6ImNsZ3lpd3Y4ODBhMzEzbHBlejh1Zjc3eGYifQ.i6qdKYjYC6bof7_KDOfGQA';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [-74.5, 40], // starting position [lng, lat]
            zoom: 9, // starting zoom
        });
        const marker = new mapboxgl.Marker({
            color: "#FFFFFF",
            draggable: true
        }).setLngLat([-74.5, 40])
            .addTo(map);
    </script>
@endpush