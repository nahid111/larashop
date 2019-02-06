@extends('adminInc.adminBase')

@section('content')

    <div class="container-fluid smaller_text">

        {{--Add Form modal trigger Button--}}
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Category
                    </button>
                </span>
            </div>
        </div>
        <br>


        {{--Loop through all the Categories--}}
        <div class="card mb-3">
            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($cats) > 0 )
                            @foreach($cats as $cat)
                                <tr>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edtBtn" value="{{ $cat->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form method="POST" action="/category/{{$cat->id}}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirmDelete(this, event, 'Sure to delete this Category ?');">
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








    {{-- ADD NEW Category FORM MODAL --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- Modal content --}}
            <div class="modal-content">
                <div class="modal-header" style="background-color: #007BFF; color: #fff;">
                    <h4>Add new Category</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/category') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cat_name">Category Name:</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name">
                        </div>

                        <button type="submit" class="btn btn-success">ADD</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>



    {{-- Edit FORM MODAL --}}
    <div id="edtModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- Modal content --}}
            <div class="modal-content">
                <div class="modal-header" style="background-color: #138496; color: #fff;">
                    <h4>Edit Category</h4>
                </div>
                <div class="modal-body">

                    <form id="edtForm" action="" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label for="category_name_edt">Category Name:</label>
                            <input type="text" class="form-control" id="category_name_edt" name="category_name_edt">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>



@endsection





@section('pageScripts')
    <script type="text/javascript">

        $editButton = $(".edtBtn");
        $editForm = $('#edtForm');
        $categoryNameEdit = $('#category_name_edt');
        $editModal = $('#edtModal');
        
        $editButton.click(function () {

            var categoryID = $(this).attr('value');

            $.ajax({
                url : '/category/'+categoryID+'/edit',
                method : "GET",
                success : function(response){
                    var obj = JSON.parse(response);
                    $editForm.attr('action', '/category/'+obj.id);
                    $categoryNameEdit.val(obj.name);
                    $editModal.modal('show');
                }
            });

        });

    </script>
@endsection

