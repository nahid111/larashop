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
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Product
                    </button>
                </span>
            </div>
        </div>
        <br>


        {{--Loop through all the Products--}}
        <div class="card mb-3">
            <div class="card-header">
                Products
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($products) > 0 )
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img style="max-height:50px;max-width:50px;" src="/storage/product_images/{{$product->image}}">
                                    </td>
                                    <td>{{ $product->brand['name'] }}</td>
                                    <td>{{ $product->category['name'] }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edtBtn" value="{{ $product->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form method="POST" action="/product/{{$product->id}}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirmDelete(this, event, 'Sure to delete this Product ?');">
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








    {{-- ADD NEW Product FORM MODAL --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- Modal content --}}
            <div class="modal-content">
                <div class="modal-header" style="background-color: #007BFF; color: #fff;">
                    <h4>Add new Product</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" class="form-control" id="prod_name" name="prod_name">
                        </div>

                        <div class="form-group">
                            <label for="prod_brand">Brand:</label>
                            <select class="form-control" id="prod_brand" name="prod_brand">
                                <option>Select a Brand</option>
                                @if( count($brands) > 0 )
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prod_cat">Category:</label>
                            <select class="form-control" id="prod_cat" name="prod_cat">
                                <option>Select a Category</option>
                                @if( count($cats) > 0 )
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prod_price">Price:</label>
                            <input type="text" class="form-control" id="prod_price" name="prod_price">
                        </div>

                        <div class="form-group">
                            <label for="prod_size">Size:</label>
                            <input type="text" class="form-control" id="prod_size" name="prod_size">
                        </div>

                        <div class="form-group">
                            <label for="prod_clr">Color:</label>
                            <input type="text" class="form-control" id="prod_clr" name="prod_clr">
                        </div>

                        <div class="form-group">
                            <label for="prod_description">Description:</label>
                            <textarea class="form-control" name="prod_description" id="prod_description"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="" id="prod_img" name="prod_img">
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
                    <h4>Edit Product</h4>
                </div>
                <div class="modal-body">

                    <form id="edtForm" action="" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label for="prod_name_edit">Product Name:</label>
                            <input type="text" class="form-control" id="prod_name_edit" name="prod_name_edit">
                        </div>

                        <div class="form-group">
                            <label for="prod_brand_edit">Brand:</label>
                            <select class="form-control" id="prod_brand_edit" name="prod_brand_edit">
                                <option>Select a Brand</option>
                                @if( count($brands) > 0 )
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prod_cat_edit">Category:</label>
                            <select class="form-control" id="prod_cat_edit" name="prod_cat_edit">
                                <option>Select a Category</option>
                                @if( count($cats) > 0 )
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prod_price_edit">Price:</label>
                            <input type="text" class="form-control" id="prod_price_edit" name="prod_price_edit">
                        </div>

                        <div class="form-group">
                            <label for="prod_size_edit">Size:</label>
                            <input type="text" class="form-control" id="prod_size_edit" name="prod_size_edit">
                        </div>

                        <div class="form-group">
                            <label for="prod_clr_edit">Color:</label>
                            <input type="text" class="form-control" id="prod_clr_edit" name="prod_clr_edit">
                        </div>

                        <div class="form-group">
                            <label for="prod_description_edit">Description:</label>
                            <textarea class="form-control" name="prod_description_edit" id="prod_description_edit"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="" id="prod_img_edit" name="prod_img_edit">
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
        $editModal = $('#edtModal');
        $editForm = $('#edtForm');
        $prodNameEdit = $('#prod_name_edit');
        $prodBrandEdit = $('#prod_brand_edit');
        $prodCatEdit = $('#prod_cat_edit');
        $prodPriceEdit = $('#prod_price_edit');
        $prodSizeEdit = $('#prod_size_edit');
        $prodClrEdit = $('#prod_clr_edit');
        $prodDescriptionEdit = $('#prod_description_edit');
        $prodImgEdit = $('#prod_img_edit');

        $editButton.click(function () {

            var ProductID = $(this).attr('value');

            $.ajax({
                url : '/product/'+ProductID+'/edit',
                method : "GET",
                success : function(response){
                    var obj = JSON.parse(response);
                    $editForm.attr('action', '/product/'+obj.id);
                    $prodNameEdit.val(obj.name);
                    $prodBrandEdit.val(obj.brand_id);
                    $prodCatEdit.val(obj.category_id);
                    $prodPriceEdit.val(obj.price);
                    $prodSizeEdit.val(obj.size);
                    $prodClrEdit.val(obj.color);
                    $prodDescriptionEdit.val(obj.description);
                    $editModal.modal('show');
                    console.log('Ajax completed');
                },
                error: function () {
                    console.log('Ajax failed');
                }
            });

        });

    </script>
@endsection

