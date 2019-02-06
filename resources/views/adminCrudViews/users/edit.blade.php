@extends('adminInc.adminBase')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <a href="{{ url('/users') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancel
                    </a>
                </span>
                <h1><i class='fa fa-key'></i> Edit {{$user->name}}</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">

                        <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                            <br>
                            {{-- If roles exist --}}
                            @if(!$roles->isEmpty())
                                <h5>Assign Roles to this User</h5>
                                <hr>

                                @foreach ($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->hasRole($role->name) ? "checked" : '' }}> {{ $role->name }}
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