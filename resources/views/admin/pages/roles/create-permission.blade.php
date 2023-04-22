@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2 justify-items-center">
                        <div class="col-md-11 justify-items-center">
                            <form action="{{route('admin.roles.store.permissions')}}" method="post">
                                @csrf
                                <label for="role">Add a new permission</label>
                                <input type="text" name="permission" id="role" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-success mt-2">Add permission</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection