<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'shopManagementClearance']);
    }


    public function index(){
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('adminCrudViews.brands')->with('brands', $brands);
    }

    public function show($id){
        return redirect('/brand');
    }

    public function create(){
        return redirect('/brand');
    }



    public function store(Request $request){
        // Create Brand
        $brand = new Brand;
        $brand->name = $request->input('brand_name');
        $brand->save();
        return redirect('/brand')->with('success', 'Brand Added');
    }




    public function edit($id){
        $brand = Brand::find($id);
        return json_encode($brand);
    }

    public function update(Request $request, $id){
        $brand = Brand::find($id);
        // update Brand
        $brand->name = $request->input('brand_name_edt');
        $brand->save();
        return redirect('/brand')->with('success', 'Brand Updated');
    }



    public function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brand')->with('success', 'Brand Deleted');
    }
}
