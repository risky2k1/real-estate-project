<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Tìm <span class="text-primary">Căn nhà lý tưởng</span> để sống với gia đình bạn</h1>
            <p class="animated fadeIn mb-4 pb-2">Nhiều lựa chọn, nhiều mức giá, tất cả đều đã được qua kiểm duyệt và xác thực.</p>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                @foreach($sliders as $slider)
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{asset('storage/').'/'.$slider->path}}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
