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
                <h1><i class='fa fa-key'></i> Edit Permission</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">

                        <form action="/permissions/{{ $permission->id }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}">
                            </div>

                            <button type="submit" class="btn btn-success pull-right">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

@endsection