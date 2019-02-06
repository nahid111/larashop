<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'shopManagementClearance']);
    }


    public function index(){
        $cats = Category::orderBy('id', 'desc')->get();
        return view('adminCrudViews.category')->with('cats', $cats);
    }

    
    public function show($id){
        return redirect('/category');
    }

    public function create(){
        return redirect('/category');
    }


    
    public function store(Request $request){
        // Create Category
        $cat = new Category;
        $cat->name = $request->input('cat_name');
        $cat->save();
        return redirect('/category')->with('success', 'Category Added');
    }




    public function edit($id){
        $cat = Category::find($id);
        return json_encode($cat);
    }

    public function update(Request $request, $id){
        $cat = Category::find($id);
        // update product
        $cat->name = $request->input('category_name_edt');
        $cat->save();
        return redirect('/category')->with('success', 'Category Updated');
    }



    public function destroy($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect('/category')->with('success', 'Category Deleted');
    }
    
}
