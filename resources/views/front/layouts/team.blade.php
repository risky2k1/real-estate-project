<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Danh sách môi giới</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @foreach($agents as $agent)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{$agent->avatar}}" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href="{{url('chatify/'.$agent->id)}}"><i class="fa fa-envelope"></i></a>
                            <a class="btn btn-square mx-1" href="tel:{{$agent->phone}}"><i class="fa fa-phone"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">{{$agent->name}}</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
