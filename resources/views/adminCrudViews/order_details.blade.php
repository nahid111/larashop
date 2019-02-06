@extends('adminInc.adminBase')

@section('pageStyles')
    <style type="text/css">
        .smaller_text{
            font-size: 0.8em;
        }
    </style>
@endsection


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-danger">
                <h5>Shipping address for Order {{ $address->order_id }} </h5>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 bg-light smaller_text">
                @if( isset($address) )
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{ $address->shipping_name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $address->shipping_email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>{{ $address->shipping_phone }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>{{ $address->shipping_city }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{ $address->shipping_address }}</td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <br><br>


        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-danger">Ordered Products - </h5>

                <div class="table-responsive smaller_text">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( isset($products) )
                            @if( count($products) > 0 )
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_qty }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <br><br><br>
    </div>




@endsection





@section('pageScripts')
    <script type="text/javascript">
    </script>
@endsection

