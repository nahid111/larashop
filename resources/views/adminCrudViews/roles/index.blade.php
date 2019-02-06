@extends('adminInc.adminBase')

@section('content')

    <div class="container-fluid smaller_text">

        <div class="row">
            <div class="col-sm-12">

                <a href="{{ url('/permissions') }}" class="btn btn-primary">Permissions</a>

                <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>

                <span class="pull-right">
                    <a href="{{ url('roles/create') }}" class="btn btn-success">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Role
                    </a>
                </span>

            </div>
        </div>
        <br>


        {{--Loop through all the roles--}}
        <div class="card mb-3">
            <div class="card-header bg-dark text-light">
                Roles
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($roles) > 0 )
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}

                                    <td>
                                        <a class="btn btn-warning btn-sm edtBtn" href="roles/{{ $role->id }}/edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form method="POST" action="/roles/{{ $role->id }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirmDelete(this, event, 'Sure to delete this Role ?');">
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