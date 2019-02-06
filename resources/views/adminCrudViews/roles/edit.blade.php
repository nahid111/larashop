@extends('adminInc.adminBase')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <a href="{{ url('/roles') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancel
                    </a>
                </span>
                <h1><i class='fa fa-key'></i> Edit Role</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">

                        <form action="/roles/{{ $role->id }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                            </div>
                            <br>
                            {{-- If Permissions exist --}}
                            @if(!$permissions->isEmpty())
                                <h5>Assign Permissions to this Role</h5>
                                <hr>

                                @foreach ($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? "checked" : '' }}> {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                            <br>

                            <button type="submit" class="btn btn-success pull-right">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

@endsection