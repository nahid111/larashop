<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Shipping;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'shopManagementClearance']);
    }

    public function index(){
        $orders = Order::all();
        return view('adminCrudViews.orders')->with('orders', $orders);
    }

    public function order_details($orderID){
        $address = Shipping::where('order_id', '=', $orderID)->first();
        $products = OrderDetails::where('order_id', '=', $orderID)->get();
        $data = array(
            'address'  => $address,
            'products' => $products
        );
        return view('adminCrudViews.order_details', $data);
    }


}


