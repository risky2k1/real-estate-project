<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
            <form action="{{route('home')}}" class="row g-2" method="get">
                @csrf
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col">
                            <input type="text" name="keyword" class="form-control border-0 py-3" placeholder="Search Keyword">
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </form>
    </div>
</div>
