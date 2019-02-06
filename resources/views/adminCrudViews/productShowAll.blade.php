@extends('adminInc.adminBase')

@section('pageStyles')
    <style type="text/css">

    </style>
@endsection


@section('content')

    <div class="container-fluid">

        <!-- Add Form modal trigger Button -->
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Product
                    </button>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h2>Products</h2>
                <hr>
            </div>
        </div>


        <!-- Loop through all the products -->
        @if( count($prods) > 0 )
            @foreach($prods as $prod)
                <div class="well">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <img class="img-responsive" src="/storage/product_images/{{$prod->product_img}}">
                        </div>

                        <div class="col-sm-7 col-xs-6">
                            <h3>{{$prod->name}}</h3>
                            <p>{!! $prod->description !!}</p>
                        </div>

                        <div class="col-sm-1 col-xs-2">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12" style="padding-top: 20%">
                                    <form method="POST" action="/product/{{$prod->id}}" accept-charset="UTF-8">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"
                                                onclick="return confirmDelete(this, event, 'Sure to delete this product ?');">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12" style="padding-top: 20%">
                                    <a href="/product/{{$prod->id}}/edit" class="btn btn-info">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            @else
            <div class="well">No Product found</div>
        @endif


        <br><br><br>
    </div>








    <!-- ADD NEW Product FORM MODAL -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #138496; color: #fff;">
                    <h4>Add new product</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data"
                          accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="prod_name">Product Name:</label>
                            <input type="text" class="form-control" id="prod_name" name="prod_name">
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



@endsection





@section('pageScripts')
    <script type="text/javascript">

        CKEDITOR.replace( 'prod_description' );

    </script>
@endsection

