@extends('adminInc.adminBase')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <a href="{{ url('/permissions') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancel
                    </a>
                </span>
                <h1><i class='fa fa-key'></i> Add Permission</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">

                        <form action="{{ url('/permissions') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="permission_name">Permission Name:</label>
                                <input type="text" class="form-control" id="permission_name" name="permission_name">
                            </div>
                            <br>
                            {{-- If roles exist --}}
                            @if(!$roles->isEmpty())
                                <h5>Assign this Permission to Roles</h5>
                                <hr>

                                @foreach ($roles as $role)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->name }}</label>
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