@extends('front.layouts.master')
@push('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet'/>
@endpush
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!-- Product image -->
                                    @if (!$property->images->count() > 0 && !file_exists(public_path('storage/' . $property->images[0]->path)))
                                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                                            <img src="{{asset('storage/meme.jpg')}}" alt="no-found" class="img-fluid" style="max-width: 280px;">
                                        </a>
                                    @else
                                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                                            <img src="{{asset('storage').'/'.$property->images[0]->path}}" alt="contact-img" class="img-fluid" style="max-width: 280px;"/>
                                        </a>
                                        <div class="d-lg-flex d-none justify-content-center">
                                            @foreach($property->images as $image)
                                                <a href="javascript: void(0);">
                                                    <img src="{{asset('storage'.'/'.$image->path)}}" class="img-fluid img-thumbnail p-2" style="max-width: 100px;" alt="Product-img"/>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                    <form class="pl-lg-4">
                                        <!-- Product title -->
                                        <h3 class="mt-0">{{$property->name}}</h3>
                                        <p class="mb-1">Ngày đăng: {{$property->created_at}}</p>
                                        <p class="mb-1">Người đăng: {{$property->agent_name}}
                                            <span>
                                                - nhắn tin ngay
                                            </span>
                                            <a href="{{url('/chatify/'.$property->user_id)}}">
                                                <i class="fa fa-envelope text-primary me-2"></i>
                                            </a>
                                        </p>
                                        <p>
                                            Liên hệ ngay:
                                            @guest()
                                                <a href="tel:{{$property->agent_phone}}" id="phone-number">{{$property->agent_phone}}</a>
                                            @endguest
                                            @auth()
                                                <a class="agent_phone">{{$property->agent_phone}}</a>
                                            @endauth
                                        </p>
                                        <!-- Product stock -->
                                        <div class="mt-3">
                                            <h4><span class="badge badge-success-lighten">{{$property->status_name}}</span></h4>
                                        </div>

                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Giá</h6>
                                            @if($property->status_name!=='For rent')
                                                <h3> {{number_format($property->property_price).' đ'}}</h3>
                                                <h6 class="font-14">Giá/m<sup>2</sup></h6>
                                                <h4>{{number_format($property->property_price/$property->area).' đ / m'}}<sup>2</sup></h4>
                                            @else
                                                <h3> {{number_format($property->property_price).' đ/month'}}</h3>
                                            @endif
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="font-14">Diện tích</h6>
                                            <h3>{{$property->area.'m'}}<sup>2</sup></h3>
                                        </div>
                                        <div class="mt-4">
                                            <h6 class="font-14">Loại</h6>
                                            <h3>{{$property->category_name}}</h3>
                                        </div>


                                        <!-- Product description -->
                                        <div class="mt-4">
                                            <h6 class="font-14">Mô tả:</h6>
                                            {{strip_tags($property->description)}}
                                        </div>

                                        <!-- Product information -->
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h6 class="font-14">Trang thiết bị:</h6>
                                                    <p class="text-sm lh-150">{{$property->furnish_status==='Furnished'?'Đầy đủ tiện nghi':'Chưa được trang bị'}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="font-14">Tổng số phòng:</h6>
                                                    <p class="text-sm lh-150">{{$property->rooms}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="font-14">Phòng ngủ:</h6>
                                                    <p class="text-sm lh-150">{{$property->bed_rooms}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="font-14">Phòng tắm:</h6>
                                                    <p class="text-sm lh-150">{{$property->bath_rooms}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                            <input type="text" hidden value="{{$property->longitude}}" id="longitude">
                            <input type="text" hidden value="{{$property->latitude}}" id="latitude">
                            <div>
                                <h6 class="font-14">Vị trí</h6>
                                <div id='map' style='width: 1250px; height: 300px;'></div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Outlets</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Revenue</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>ASOS Ridley Outlet - NYC</td>
                                        <td>$139.58</td>
                                        <td>
                                            <div class="progress-w-percent mb-0">
                                                <span class="progress-value">478 </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$1,89,547</td>
                                    </tr>
                                    <tr>
                                        <td>Marco Outlet - SRT</td>
                                        <td>$149.99</td>
                                        <td>
                                            <div class="progress-w-percent mb-0">
                                                <span class="progress-value">73 </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$87,245</td>
                                    </tr>
                                    <tr>
                                        <td>Chairtest Outlet - HY</td>
                                        <td>$135.87</td>
                                        <td>
                                            <div class="progress-w-percent mb-0">
                                                <span class="progress-value">781 </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$5,87,478</td>
                                    </tr>
                                    <tr>
                                        <td>Nworld Group - India</td>
                                        <td>$159.89</td>
                                        <td>
                                            <div class="progress-w-percent mb-0">
                                                <span class="progress-value">815 </span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$55,781</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        const longitudeInput = document.getElementById('longitude');
        const latitudeInput = document.getElementById('latitude');
        const accessToken = "<?php echo env('MAPBOX_ACCESS_TOKEN'); ?>";

        mapboxgl.accessToken = accessToken;
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [longitudeInput.value, latitudeInput.value], // starting position [lng, lat]20.97631900240898, 105.78938247915548
            zoom: 16, // starting zoom
        });
        const marker = new mapboxgl.Marker({
            // color: "#FFFFFF",
            draggable: true
        }).setLngLat([longitudeInput.value, latitudeInput.value])
            .addTo(map);
        marker.on('drag', () => {
            console.log('A drag event occurred.');
        });
        marker.on('dragend', () => {
            console.log('A dragend event occurred.');
            console.log(marker.getLngLat());
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
            const phoneElement = document.querySelector('#phone-number');
            const phoneNumber = phoneElement.textContent.trim(); // get the phone number string from the <a> element's text content
            const digits = phoneNumber.replace(/\D/g, ""); // remove non-digits from the phone number string
            const maskedDigits = "****";
            const startIndex = 4;
            const endIndex = 7;
            const maskedString = phoneNumber.slice(0, startIndex) + maskedDigits + phoneNumber.slice(endIndex);
            const result = phoneElement.textContent = maskedString; // update the <a> element's text content with the masked phone number
            console.log(result);
        });
    </script>
    <script omi-sdk type="text/javascript" src="https://cdn.omicrm.com/sdk/2.0.0/sdk.min.js"></script>

    <script>
        $('.agent_phone').on('click', function () {
            var phone = $(this).text();
            omiSDK.makeCall(phone);
        });
        document.addEventListener('DOMContentLoaded', () => {
            // Ví dụ về một số config có thể dùng khi init SDK
            let config = {
                theme: 'default',
                callbacks: {
                    register: (data) => {
                        // Sự kiện xảy ra khi trạng thái kết nối tổng đài thay đổi
                        console.log('register:', data);
                    },
                    connecting: (data) => {
                        // Sự kiện xảy ra khi bắt đầu thực hiện cuộc gọi ra
                        console.log('connecting:', data);
                    },
                    invite: (data) => {
                        // Sự kiện xảy ra khi có cuộc gọi tới
                        console.log('invite:', data);
                    },
                    inviteRejected: (data) => {
                        // Sự kiện xảy ra khi có cuộc gọi tới, nhưng bị tự động từ chối
                        // trong khi đang diễn ra một cuộc gọi khác
                        console.log('inviteRejected:', data);
                    },
                    ringing: (data) => {
                        // Sự kiện xảy ra khi cuộc gọi ra bắt đầu đổ chuông
                        console.log('ringing:', data);
                    },
                    accepted: (data) => {
                        // Sự kiện xảy ra khi cuộc gọi vừa được chấp nhận
                        console.log('accepted:', data);
                    },
                    incall: (data) => {
                        // Sự kiện xảy ra mỗi 1 giây sau khi cuộc gọi đã được chấp nhận
                        console.log('incall:', data);
                    },
                    acceptedByOther: (data) => {
                        // Sự kiện dùng để kiểm tra xem cuộc gọi bị kết thúc
                        // đã được chấp nhận ở thiết bị khác hay không
                        console.log('acceptedByOther:', data);
                    },
                    ended: (data) => {
                        // Sự kiện xảy ra khi cuộc gọi kết thúc
                        console.log('ended:', data);
                    },
                    holdChanged: (status) => {
                        // Sự kiện xảy ra khi trạng thái giữ cuộc gọi thay đổi
                        console.log('on hold:', status);
                    },
                    saveCallInfo: (data) => {
                        // let { callId, note, ...formData } = data;
                        // Sự kiện xảy ra khi cuộc gọi đã có đổ chuông hoặc cuộc gọi tới, khi user có nhập note input mặc định hoặc form input custom
                        console.log('on save call info:', data);
                    },
                    infoLastCall: (data) => {
                        // Sự kiện xảy ra khi có bật options.showInfoLastCall và SDK có get được data cho số điện thoại đang gọi
                        console.log('on found info last call:', data);
                    },
                }
            };
            omiSDK.init(config, () => {
                // nếu url login của bạn là: https://abc.omicall.com
                // và số nội bộ của bạn là 100 với password là 123456
                // thì param khi register sẽ là:
                //omiSDK.register({
                //    domain: 'anhtranmigroup',
                //    username: 'anhtran.migroup@gmail.com',
                //    password: 'Omi123456'
                //});
                // CẦN 3 THÔNG TIN DƯỚI ĐỂ KẾT NỐI ĐẾN MÁY CHỦ. KHÔNG CẦN APIKEY KHI LƯU CẤU HÌNH.
                // 3 THÔNG TIN DƯỚI XEM Ở PHẦN: CẤU HÌNH => TỔNG ĐÀI => SỐ NỘI BỘ.
                // NHẤN VÀO THÔNG TIN SỐ NỘI BỘ THÌ HIỆN POP-UP CHỨA 3 THÔNG TIN DƯỚI:
                // domain: DOMAIN TỔNG ĐÀI
                // username: SỐ NỘI BỘ, password: MẬT KHẨU.
                // Với mỗi thông tin nhân viên khi thêm mới, cập nhật sẽ điền THÊM 2 thông tin(Số nội bộ, mật khẩu) trên Crm-TourKit

                omiSDK.register({
                    domain: 'anhtranmigroup',
                    username: '101', // tương đương trường "sip_user" trong thông tin số nội bộ
                    password: '3O555555Ghh', // Mật khẩu ứng dụng
                });
            });
            // Cách khác để khai báo các SDK events:
            //omiSDK.on('register', (data) => {
            //    // Sự kiện xảy ra khi trạng thái kết nối tổng đài thay đổi
            //    console.log('register:', data);
            //});
            //Cách khác để huỷ khai báo các SDK events:
            //omiSDK.off('register');
        });
    </script>
@endpush
