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
                <h1><i class='fa fa-key'></i> Add Role</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">

                        <form action="{{ url('/roles') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <br>
                            {{-- If no roles exist --}}
                            @if(!$permissions->isEmpty())
                                <h5>Assign Permissions to this Role</h5>
                                <hr>

                                @foreach ($permissions as $permission)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>

                                @endforeach
                            @endif
                            <br>

                            <button type="submit" class="btn btn-success pull-right">ADD</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection