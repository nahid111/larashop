<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Stripe;

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



    public function checkoutPost(Request $request){
        // Stripe\Stripe::setApiKey( env('STRIPE_SECRET') );
        Stripe\Stripe::setApiKey('sk_test_5n658ZzyAnMXH4gMln29yWrn');

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
                'receipt_email' => $request->input('email'),
            ]);

            // clear cart
            Cart::destroy();

            return redirect('/home')->with('success', 'Payment Successful');
        }
        catch (\Exception $e){
            //return redirect('/checkout')->with('error', $e->getMessage().'<br><pre>'.print_r($request).'</pre>');
            return redirect('/checkout')->with('error', $e->getMessage());

        }
    }








}




