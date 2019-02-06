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

        {{--Loop through all the Orders--}}
        <div class="card mb-3">
            <div class="card-header">
                Orders
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total Price</th>
                            <th>Ordered At</th>
                            <th>View Details</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total Price</th>
                            <th>Ordered At</th>
                            <th>View Details</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @if( count($orders) > 0 )
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user['name'] }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="/orders/{{$order->id}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
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


