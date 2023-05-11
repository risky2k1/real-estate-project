<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
            <form action="{{route('home')}}" class="row g-2" method="get">
                @csrf
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-5">
                            <input type="text" name="keyword" class="form-control border-0 py-3" placeholder="Từ khóa">
                        </div>
                        <div class="col-md-5">
                            <select class="form-select border-0 py-3">
                                <option selected>Loại</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100 border-0 py-3">Search</button>
                </div>
            </form>
    </div>
</div>
