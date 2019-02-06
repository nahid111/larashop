<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class FrontendPagesController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id', 'asc')->get();
        $cats = Category::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $products = Product::all();
        $data = array(
            'cats' => $cats,
            'brands' => $brands,
            'products' => $products,
            'sliders' => $sliders
        );
        return view('index', $data);
    }

    public function category_wise_product($catID){
        $cats = Category::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $products = Product::where('category_id', $catID)->get();
        $data = array(
            'cats' => $cats,
            'brands' => $brands,
            'products' => $products,
        );
        return view('category_wise_product', $data);
    }

    public function brand_wise_product($brandID){
        $cats = Category::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $products = Product::where('brand_id', $brandID)->get();
        $data = array(
            'cats' => $cats,
            'brands' => $brands,
            'products' => $products,
        );
        return view('category_wise_product', $data);
    }

    public function product_details($productID){
        $cats = Category::orderBy('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $product = Product::find($productID);
        $data = array(
            'cats' => $cats,
            'brands' => $brands,
            'product' => $product,
        );
        return view('product_details', $data);
    }


}
