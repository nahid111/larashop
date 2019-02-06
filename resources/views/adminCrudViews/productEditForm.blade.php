@extends('adminInc.adminBase')

@section('pageStyles')
    <style type="text/css">

    </style>
@endsection


@section('content')

    <div class="container">

        <!-- Add Form modal trigger Button -->
        <div class="row">
            <div class="col-sm-12">
                <span class="pull-right">
                    <a href="{{ url('/product') }}" class="btn btn-danger">
                        <i class="fa fa-arrow-circle-o-left" aria-hidden="true">&nbsp;Cancel</i>
                    </a>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h2>Edit Product</h2>
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <form id="editForm" action="/product/{{$prod->id}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="prod_name_edt">Product Name:</label>
                        <input type="text" class="form-control" id="prod_name_edt" name="prod_name_edt" value="{{$prod->name}}">
                    </div>
                    <div class="form-group">
                        <label for="prod_description_edt">Description:</label>
                        <textarea class="form-control" name="prod_description_edt" id="prod_description_edt">
                                {{$prod->description}}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="" id="prod_img_edt" name="prod_img_edt" value="{{$prod->product_img}}">
                    </div>

                    <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-lg">Edit</button>
                    </div>
                </form>

            </div>
        </div>



        <br><br><br>
    </div>
@endsection




@section('pageScripts')
    <script type="text/javascript">

        CKEDITOR.replace( 'prod_description_edt' );


    </script>
@endsection

