<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        return view('cart');
    }

    public function add_to_cart(Request $request){
        $product_qty = $request->input('qty');
        $product = Product::where('id', $request->input('product_id'))->first();

        $item = array(
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $product_qty,
            'price' => $product->price,
            'options' => [
                'size' => $product->size,
                'image'=> $product->image,
                'desc' => $product->description
            ]
        );

        Cart::add($item);
        return Redirect::to('/cart');
    }

    public function update_cart(Request $request, $rowID){
        $qty = $request->input('cart_item_quantity');
        Cart::update($rowID, $qty);
        return Redirect::to('/cart');
    }

    public function remove_from_cart($rowID){
        Cart::remove($rowID);
        return Redirect::to('/cart');
    }

}




