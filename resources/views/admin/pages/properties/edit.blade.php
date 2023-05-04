@extends('admin.layouts.index')
@push('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet'/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.properties.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter project name" value="'{{$property->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter project name" value="{{\Illuminate\Support\Str::slug($property->name)}}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{$property->property_price}}">
                                </div>

                                <div class="form-group">
                                    <label for="price_per_meter">Price per meter</label>
                                    <input type="text" class="form-control" id="price_per_meter" name="price_per_meter" value="{{$property->property_price_per_meter}}">
                                </div>

                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <input type="text" class="form-control" id="area" name="area" value="{{$property->area}}">
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-6">

                                <!-- Date View -->
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="rooms">Rooms</label>
                                        <input type="number" class="form-control" id="rooms" name="rooms" value="{{$property->rooms}}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="bath_rooms">Bath rooms</label>
                                        <input type="number" class="form-control" id="bath_rooms" name="bath_rooms" value="{{$property->bath_rooms}}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="bed_rooms">Bed rooms</label>
                                        <input type="number" class="form-control" id="bed_rooms" name="bed_rooms" value="{{$property->bed_rooms}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mt-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="checkbox" id="furnish" name="furnish" class="custom-control-input" value="1" {{$property->furnished===1?'checked':''}}>
                                            <label class="custom-control-label" for="furnish">Furnished</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="checkbox" id="active" name="active" class="custom-control-input" value="1" {{$property->is_active===1?'checked':''}}>
                                            <label class="custom-control-label" for="active">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="property_type">Property Type</label>
                                    <select class="select2 form-control select2-multiple" id="property_type" name="category" data-toggle="select2" multiple="multiple"
                                            data-placeholder="Choose ...">
                                        <optgroup label="Property Types">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$property->categories->pluck('name')->implode(',')==$category->name?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="property_status">Property Status</label>
                                    <select class="form-control" id="property_status" name="property_status">
                                        @foreach($statuses as $status)
                                            <option value="{{\App\Enums\PropertyStatus::getValue($status)}}" {{$property->property_status==\App\Enums\PropertyStatus::getValue($status)?'selected':''}}>{{ucfirst(Str::snake($status, ' '))}}</option>                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Images</label>
                                    <input type="file" id="image" name="image[]" multiple>
                                </div>

                                <div id="preview"></div>
                                <div>
                                    @foreach($property->images as $image)
{{--                                        <img src="{{asset('storage'.'/'.$image->path)}}" alt="" style="height: 64px">--}}
                                        <div style="position: relative; display: inline-block;">
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="" style="height: 64px">
                                            <form action="{{ route('admin.properties.image.destroy', $image) }}" method="POST" style="position: absolute; top: 0; right: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>

                            </div> <!-- end col-->

                            <div class="col-xl-12 form-group">
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea class="form-control" id="summernote" name="description">{{$property->desription}}</textarea>
                                </div>
                            </div>

                            <div class="col-xl-12 form-group">
                                <label for="">Position</label>
                                <div class="form-control">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" id="longitude" name="longitude" value="{{$property->longitude}}">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" id="latitude" name="latitude" value="{{$property->latitude}}">
                                </div>
                                <div id='map' style='width: 1400px; height: 300px;'></div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">SUBMIT</button>
                    </form>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Description....',
                tabsize: 2,
                height: 200
            });
        });
    </script>
    <script>
        const longitudeInput = document.getElementById('longitude');
        const latitudeInput = document.getElementById('latitude');
        console.log(longitudeInput.value)
        const accessToken = "<?php echo env('MAPBOX_ACCESS_TOKEN'); ?>"

        mapboxgl.accessToken = accessToken;
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [longitudeInput.value, latitudeInput.value], // starting position [lng, lat]20.97631900240898, 105.78938247915548
            zoom: 16, // starting zoom
        });
        const marker = new mapboxgl.Marker({
            color: "#FFFFFF",
            draggable: true
        }).setLngLat([longitudeInput.value, latitudeInput.value])
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
    <script>
        $(document).ready(function () {
            $('#image').on('change', function () {
                $('#preview').empty(); // Clear previous preview

                const files = this.files;
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = $('<img>').attr('src', e.target.result);
                        img.css({
                            'width': '128px',
                            'height': '128px'
                        });
                        $('#preview').append(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#name').on('keyup', function () {
                const name = $(this).val();
                const slug = slugify(name);
                $('#slug').val(slug);
            });
        });

        function slugify(text) {
            const slug = text.toString().toLowerCase()
                .replace(/[àáạảãâầấậẩẫăằắặẳẵ]/g, 'a')
                .replace(/[èéẹẻẽêềếệểễ]/g, 'e')
                .replace(/[ìíịỉĩ]/g, 'i')
                .replace(/[òóọỏõôồốộổỗơờớợởỡ]/g, 'o')
                .replace(/[ùúụủũưừứựửữ]/g, 'u')
                .replace(/[ỳýỵỷỹ]/g, 'y')
                .replace(/đ/g, 'd')
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
            return slug;
        }
    </script>
@endpush