<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'shopManagementClearance']);
    }


    public function index(){
        $products = Product::all();
        $brands = Brand::all();
        $cats = Category::all();
        
        $data = array(
            'products' => $products,
            'brands' => $brands,
            'cats' => $cats,
        );
        
        return view('adminCrudViews.products', $data);
    }


    public function show($id){
        return redirect('/product');
    }

    public function create(){
        return redirect('/product');
    }



    public function store(Request $request)
    {
        // perform Product
        /*
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ]);
        */

        // Handle Image Upload
        if($request->hasFile('prod_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('prod_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('prod_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('prod_img')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Product
        $pro = new Product;
        $pro->name = $request->input('prod_name');
        $pro->category_id = $request->input('prod_cat');
        $pro->brand_id = $request->input('prod_brand');
        $pro->size = $request->input('prod_size');
        $pro->color = $request->input('prod_clr');
        $pro->description = $request->input('prod_description');
        $pro->price = $request->input('prod_price');
        $pro->image = $fileNameToStore;
        $pro->save();

        return redirect('/product')->with('success', 'Product Added');
    }




    public function edit($id){
        $product = Product::find($id);
        return json_encode($product);
    }

    public function update(Request $request, $id){
        // find the product
        $pro = Product::find($id);

        // Handle Image Upload
        if($request->hasFile('prod_img_edit')){
            $filenameWithExt = $request->file('prod_img_edit')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('prod_img_edit')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload New Image
            $path = $request->file('prod_img_edit')->storeAs('public/product_images', $fileNameToStore);
            // Delete previous image
            Storage::delete('public/product_images/'.$pro->image);
        } else {
            $fileNameToStore = $pro->image;
        }

        // update product
        $pro->name = $request->input('prod_name_edit');
        $pro->brand_id = $request->input('prod_brand_edit');
        $pro->category_id = $request->input('prod_cat_edit');
        $pro->price = $request->input('prod_price_edit');
        $pro->size = $request->input('prod_size_edit');
        $pro->color = $request->input('prod_clr_edit');
        $pro->description = $request->input('prod_description_edit');
        $pro->image = $fileNameToStore;
        $pro->save();

        return redirect('/product')->with('success', 'Product Updated');
    }



    public function destroy($id){
        $prod = Product::find($id);
        // Delete Image file from folder
        Storage::delete('public/product_images/'.$prod->image);
        $prod->delete();
        return redirect('/product')->with('success', 'Product Deleted');
    }
    
    
    
    
}
