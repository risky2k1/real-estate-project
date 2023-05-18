@extends('front.layouts.master')
@push('css')
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet'/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
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
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('properties.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Tên bất động sản</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control" placeholder="Nhập tên" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Giá</label>
                                            <input type="text" class="form-control" id="price" name="price">
                                        </div>

                                        <div class="form-group">
                                            <label for="area">Diện tích</label>
                                            <input type="text" class="form-control" id="area" name="area">
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-xl-6">

                                        <!-- Date View -->
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="rooms">Số phòng</label>
                                                <input type="number" class="form-control" id="rooms" name="rooms">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="bath_rooms">Số phòng vệ sinh</label>
                                                <input type="number" class="form-control" id="bath_rooms" name="bath_rooms">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="bed_rooms">Số phòng ngủ</label>
                                                <input type="number" class="form-control" id="bed_rooms" name="bed_rooms">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="mt-2">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" id="furnish" name="furnish" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="furnish">Đã có đồ</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="property_type">Loại</label>
                                            <select class="select2 form-control select2-multiple" id="property_type" name="category" data-toggle="select2" multiple="multiple"
                                                    data-placeholder="Choose ...">
                                                <optgroup label="Property Types">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="property_status">Trạng thái</label>
                                            <select class="form-control" id="property_status" name="property_status">
                                                @foreach($statuses as $status)
                                                    <option value="{{\App\Enums\PropertyStatus::getValue($status)}}">{{ucfirst(Str::snake($status, ' '))}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Ảnh mô tả</label>
                                            <input type="file" id="image" name="image[]" multiple>
                                        </div>

                                        <div id="preview"></div>


                                    </div> <!-- end col-->

                                    <div class="col-xl-12 form-group">
                                        <div class="form-group">
                                            <label for="summernote">Mô tả</label>
                                            <textarea class="form-control" id="summernote" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 form-group">
                                        <label for="">Vị trí</label>
                                        <div class="form-control">
                                            <label for="longitude">Kinh độ </label>
                                            <input type="text" id="longitude" name="longitude">
                                            <label for="latitude">Tọa độ</label>
                                            <input type="text" id="latitude" name="latitude">
                                        </div>
                                        <div id='map' style='width: 1250px; height: 400px;'></div>
                                    </div>

                                </div>
                                <button class="btn btn-primary" type="submit">Xác nhận</button>
                            </form>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
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
        const accessToken = "<?php echo env('MAPBOX_ACCESS_TOKEN'); ?>"

        mapboxgl.accessToken = accessToken;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [105.78938247915548, 20.97631900240898],
            zoom: 16,
        });
        map.addControl(
            new MapboxGeocoder({
                accessToken: accessToken,
                mapboxgl: mapboxgl,
                countries: 'vn',
            })
        );
        map.on('dblclick', (e) => {
            var marker = new mapboxgl.Marker()
                .setLngLat(e.lngLat)
                .addTo(map);
            const lngLat = marker.getLngLat();
            longitudeInput.value = lngLat.lng;
            latitudeInput.value = lngLat.lat;
            console.log(`A dblclick event has occurred at Longitude: ${lngLat.lng}, Latitude: ${lngLat.lat}`);
        });
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
