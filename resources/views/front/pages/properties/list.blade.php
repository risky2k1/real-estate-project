@php use App\Enums\PropertyStatus; @endphp
@extends('front.layouts.master')
@push('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <style>
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background-color: #00B98E;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #00B98E;
            cursor: pointer;
        }

        input[type="range"]::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border: 0;
            border-radius: 50%;
            background-color: #00B98E;
            cursor: pointer;
        }

        #truncateLongTexts {
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis /*This is where the magic happens*/
        }
    </style>
@endpush
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{route('properties.list')}}" class="form-group" method="get">
{{--                            <form action="{{route('properties.list')}}">--}}
                                @csrf
                                <label>
                                    <span>Tìm kiếm</span>
                                    <input type="text" name="keywords" placeholder="Nhập từ khóa">
                                </label>
{{--                            </form>--}}
                        </div>
                        <div class="card-body">
{{--                                @csrf--}}
                                <div class="form-group">
                                    <label class="form-label" for="category">Chọn loại bất động sản</label>
                                    <select class="js-example-basic-single js-states form-control" name="category" id="category" >
                                        <option value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="status">Chọn hình thức bất động sản</label>
                                    <select class="status js-states form-control" name="status" id="status">
                                        <option value=""></option>
                                    @foreach($propertyStatuses as $propertyStatus)
                                            @switch($propertyStatus)
                                                @case('ForRent')
                                                    <option value="{{PropertyStatus::getValue($propertyStatus)}}">Cho thuê</option>
                                                    @break
                                                @case('ForSale')
                                                    <option value="{{PropertyStatus::getValue($propertyStatus)}}">Bán</option>
                                                    @break
                                                @case('ForInvestment')
                                                    <option value="{{PropertyStatus::getValue($propertyStatus)}}">Đầu tư</option>
                                                    @break
                                                @case('Featured')
                                                    <option value="{{PropertyStatus::getValue($propertyStatus)}}">Nổi bật</option>
                                                    @break
                                            @endswitch
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="rooms">Chọn số phòng</label>
                                    <select class="room-numbers js-states form-control" name="rooms" id="rooms">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="areaRange">Lựa chọn diện tích:</label>
                                    <input type="range" class="form-control-range" name="max_area" id="areaRange" min="10" max="1000" value="" oninput="displayArea()">
                                    <p id="rangeValue"></p>
                                </div>
                                <div class="form-group">
                                    <label for="areaRange">Lựa chọn mức tiền:</label>
                                    <input type="range" class="form-control-range" name="max_money" id="moneyRange" min="30" max="30000" value="" step="50" oninput="displayMoney()">
                                    <p id="rangeMoney"></p>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success ">Lọc</button>
                                    <a href="{{route('properties.list')}}" class="btn btn-warning ">Trở về</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    {{--                    <div class="tab-content">--}}
                    {{--                        <div id="tab-1" class="tab-pane fade show p-0 active">--}}
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-lg-4 col-md-6 wow fadeInUp g-3" data-wow-delay="0.5s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{route('properties.show',$property)}}">
                                            <img class="img-fluid" src="{{asset('storage/'.$property->images[0]->path)}}" alt="" style="width: 400px;height: 300px">
                                        </a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{$property->status_name??''}}
                                        </div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{$property->category_name??''}}
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{number_format($property->property_price)}}đ</h5>
                                        <a class="d-block h5 mb-2" href="{{route('properties.show',$property)}}" id="truncateLongTexts">{{$property->name}}</a>
                                        <p>
                                            <i class="fa fa-user-tie text-primary me-2"></i>{{$property->agent_name}}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{$property->area}}m<sup>2</sup></small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-bed text-primary me-2"></i>{{$property->bed_rooms}}</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-bath text-primary me-2"></i>{{$property->bath_rooms}}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$properties->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@push('js')
    <script>
        function displayArea() {
            let range = document.getElementById("areaRange");
            let value = document.getElementById("rangeValue");
            value.textContent = "Diện tích tối đa: " + range.value + "m²";
        }

        function displayMoney() {
            let range2 = document.getElementById("moneyRange");
            let value2 = document.getElementById("rangeMoney");
            let amount = range2.value + '000000';
            let formattedAmount = formatAmount(amount);
            value2.textContent = "Giá tiền tối đa: " + formattedAmount;

        }

        function formatAmount(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2({
                placeholder: "Chọn loại bất động sản",
                allowClear: true,
            });
            $('.room-numbers').select2({
                placeholder: "Chọn số phòng",
                allowClear: true,
                tags: true,
            });
            $('.status').select2({
                placeholder: "Chọn hình thức",
                allowClear: true,
            });
        });
    </script>
@endpush
