@extends('adminInc.adminBase')

@section('content')

    <div class="container-fluid smaller_text">

        <div class="row">
            <div class="col-sm-12">

                <a href="{{ url('/roles') }}" class="btn btn-primary">Roles</a>

                <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>

                <span class="pull-right">
                    <a href="{{ url('permissions/create') }}" class="btn btn-success">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Permission
                    </a>
                </span>

            </div>
        </div>
        <br>


        {{--Loop through all the permissions--}}
        <div class="card mb-3">
            <div class="card-header bg-dark text-light">
                Permissions
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Permissions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($permissions) > 0 )
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>

                                    <td>
                                        <a class="btn btn-warning btn-sm edtBtn" href="permissions/{{ $permission->id }}/edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form method="POST" action="/permissions/{{ $permission->id }}" accept-charset="UTF-8">
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