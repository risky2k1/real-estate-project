@extends('admin.layouts.index')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
@csrf
                    <input type="file" name="slider[]" multiple>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
