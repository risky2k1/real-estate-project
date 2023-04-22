@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2 justify-items-center">
                        <div class="col-md-11 justify-items-center">
                            <form action="{{route('admin.roles.store')}}" method="post">
                                @csrf
                                <label for="role">Add a new role</label>
                                <input type="text" name="role_name" id="role" class="form-control">
                                <label for="permission" class="mt-2">Select permission for this role:</label>
                                <select class="select2 form-control select2-multiple" id="permission" name="permission[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose permissions...">
                                    @foreach($permissions->pluck('name')->toArray() as $permission)
                                        <option value="{{$permission}}">{{$permission}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success mt-2">Add role</button>
                            </form>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection