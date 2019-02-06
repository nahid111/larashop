@extends('adminInc.adminBase')

@section('content')


    <div class="container-fluid smaller_text">

        <div class="row">
            <div class="col-sm-12">

                <a href="{{ url('/roles') }}" class="btn btn-primary">Roles</a>

                <a href="{{ url('/permissions') }}" class="btn btn-primary">Permissions</a>

                <span class="pull-right">
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add User
                    </a>
                </span>

            </div>
        </div>
        <br>


        {{--Loop through all the Users--}}
        <div class="card mb-3">
            <div class="card-header bg-dark text-light">
                All Users
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date/Time Added</th>
                            <th>User Roles</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date/Time Added</th>
                            <th>User Roles</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($users) > 0 )
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                    <td>
                                        <a class="btn btn-warning btn-sm edtBtn" href="/users/{{ $user->id }}/edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/users/{{$user->id}}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirmDelete(this, event, 'Sure to delete this User ?');">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">
                {{--Updated yesterday at 11:59 PM--}}
            </div>
        </div>


        <br><br><br>
    </div>


@endsection