<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Stripe;

use App\Order;
use App\OrderDetails;
use App\Shipping;

class CheckoutController extends Controller
{
    public function index(Request $request){
        // if not logged in, go to login page with the intended url
        if( Auth::guest() ){
            Session::put( 'url.intended', $request->url() );
            return redirect('/customer/login');
        }

        // if logged in show the checkout form
        return view('checkout');
    }





    public function checkout(Request $request){

        Stripe\Stripe::setApiKey( env('STRIPE_SECRET') );
        //Stripe\Stripe::setApiKey( 'sk_test_5n658ZzyAnMXH4gMln29yWrn' );

        $token = $request->input('stripeToken');
        // stripe takes amount in cents
        //$amount = round( Cart::total(), 2) * 100 ;
        $amount = Cart::total() * 100 ;

        try{
            $charge = Stripe\Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Test Payment from Lara-Shop',
                // 'receipt_email' => $request->input('email'),
            ]);

            // place order
            $this->place_order($request);

            return redirect('/home')->with('success', 'Payment Successful');
        }
        catch (\Exception $e){
            return redirect('/checkout')->with('error', $e->getMessage());

        }
    }





    public function place_order(Request $request){

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->total = Cart::total();
        $order->save();


        $items = Cart::content();
        foreach ($items as $item){
            $order_details = new OrderDetails;
            $order_details->order_id = $order->id;
            $order_details->product_id = $item->id;
            $order_details->product_name = $item->name;
            $order_details->product_price = $item->price;
            $order_details->product_qty = $item->qty;
            $order_details->save();
        }


        $shipping = new Shipping;
        $shipping->order_id = $order->id;
        $shipping->shipping_name = $request->input('shipping_name');
        $shipping->shipping_email = $request->input('shipping_email');
        $shipping->shipping_phone = $request->input('shipping_phone');
        $shipping->shipping_city = $request->input('shipping_city');
        $shipping->shipping_address = $request->input('shipping_address');
        $shipping->name_on_card = $request->input('name_on_card');
        $shipping->save();

        // clear cart
        Cart::destroy();
    }




}




