@extends('adminInc.adminBase')

@section('pageStyles')
    <style type="text/css">
        .smaller_text{
            font-size: 0.8em;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid smaller_text">

        {{--Add Form modal trigger Button--}}
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Brand
                    </button>
                </span>
            </div>
        </div>
        <br>


        {{--Loop through all the Brands--}}
        <div class="card mb-3">
            <div class="card-header">
                Brands
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Brand Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($brands) > 0 )
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edtBtn" value="{{ $brand->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form method="POST" action="/brand/{{$brand->id}}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirmDelete(this, event, 'Sure to delete this Brand ?');">
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








    {{-- ADD NEW Brand FORM MODAL --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- Modal content --}}
            <div class="modal-content">
                <div class="modal-header" style="background-color: #007BFF; color: #fff;">
                    <h4>Add new Brand</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/brand') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="brand_name">Brand Name:</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name">
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
                    <h4>Edit Brand</h4>
                </div>
                <div class="modal-body">

                    <form id="edtForm" action="" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label for="brand_name_edt">Brand Name:</label>
                            <input type="text" class="form-control" id="brand_name_edt" name="brand_name_edt">
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
        $BrandNameEdit = $('#brand_name_edt');
        $editModal = $('#edtModal');

        $editButton.click(function () {

            var BrandID = $(this).attr('value');

            $.ajax({
                url : '/brand/'+BrandID+'/edit',
                method : "GET",
                success : function(response){
                    var obj = JSON.parse(response);
                    $editForm.attr('action', '/brand/'+obj.id);
                    $BrandNameEdit.val(obj.name);
                    $editModal.modal('show');
                }
            });

        });

    </script>
@endsection

