@extends('admin.layouts.index')
@push('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet'/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter project name">
                            </div>

                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <textarea class="form-control" id="summernote" name="description"></textarea>
                            </div>

                            <!-- Date View -->
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>

                            <div class="form-group">
                                <label for="pricepm">Price per meter</label>
                                <input type="text" class="form-control" id="pricepm" name="price_per_meter">
                            </div>

                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" id="area" name="area">
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xl-6">
                            <div class="form-group mt-3 mt-xl-0">
                                <label for="projectname" class="mb-0">Images</label>
                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                      data-upload-preview-template="#uploadPreviewTemplate">
                                    <div class="fallback">
                                        <input name="file" type="file"/>
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
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="rooms">Rooms</label>
                                    <input type="number" class="form-control" id="rooms" name="rooms">
                                </div>
                                <div class="form-group col-4">
                                    <label for="bath_rooms">Bath rooms</label>
                                    <input type="number" class="form-control" id="bath_rooms" name="bath_rooms">
                                </div>
                                <div class="form-group col-4">
                                    <label for="bed_rooms">Bed rooms</label>
                                    <input type="number" class="form-control" id="bed_rooms" name="bed_rooms">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mt-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="furnish" name="furnish" class="custom-control-input">
                                        <label class="custom-control-label" for="furnish">Furnished</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="active" name="active" class="custom-control-input">
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="property_type">Property Type</label>
                                <select class="select2 form-control select2-multiple" id="property_type" name="property_type" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                    <optgroup label="Property Types">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example-select">Input Select</label>
                                <select class="form-control" id="example-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                        </div> <!-- end col-->

                        <div class="col-xl-12 form-group">
                            <div class="form-control">
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude">
                            </div>
                            <div id='map' style='width: 1400px; height: 300px;'></div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
    <!-- init js -->
    <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
    <script>
        const longitudeInput = document.getElementById('longitude');
        const latitudeInput = document.getElementById('latitude');

        mapboxgl.accessToken = 'pk.eyJ1IjoidHVhbnRhbXR1b25nIiwiYSI6ImNsZ3lpd3Y4ODBhMzEzbHBlejh1Zjc3eGYifQ.i6qdKYjYC6bof7_KDOfGQA';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [105.78938247915548,20.97631900240898], // starting position [lng, lat]20.97631900240898, 105.78938247915548
            zoom: 16, // starting zoom
        });
        const marker = new mapboxgl.Marker({
            color: "#FFFFFF",
            draggable: true
        }).setLngLat([105.78938247915548,20.97631900240898])
            .addTo(map);

        let timerId = null;

        longitudeInput.addEventListener('input', updateMapCenterWithDelay);
        latitudeInput.addEventListener('input', updateMapCenterWithDelay);

        function updateMapCenterWithDelay() {
            // Clear any previous timer
            if (timerId) {
                clearTimeout(timerId);
            }

            // Set up a new timer to update the map after a 500ms delay
            timerId = setTimeout(updateMapCenter, 1000);
        }

        function updateMapCenter() {
            const longitude = parseFloat(longitudeInput.value);
            const latitude = parseFloat(latitudeInput.value);

            // Update the map center and marker location
            map.setCenter([longitude, latitude]);
            marker.setLngLat([longitude, latitude]);
        }
    </script>
@endpush