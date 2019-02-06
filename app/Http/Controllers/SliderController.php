<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'shopManagementClearance']);
    }


    public function index(){
        $sliders = Slider::all();
        $data = array(
            'sliders' => $sliders
        );
        return view('adminCrudViews.slider', $data);
    }


    public function show($id){
        return redirect('/slider');
    }

    public function create(){
        return redirect('/slider');
    }



    public function store(Request $request)
    {
        if($request->hasFile('slider_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('slider_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('slider_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('slider_img')->storeAs('public/slider_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Product
        $slider = new Slider;
        $slider->image = $fileNameToStore;
        $slider->save();

        return redirect('/slider')->with('success', 'Image Added');
    }




    public function edit($id){
        $slider = Slider::find($id);
        return json_encode($slider);
    }

    public function update(Request $request, $id){
        // find the product
        $slider = Slider::find($id);

        // Handle Image Upload
        if($request->hasFile('slider_img_edt')){
            $filenameWithExt = $request->file('slider_img_edt')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('slider_img_edt')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload New Image
            $path = $request->file('slider_img_edt')->storeAs('public/slider_images', $fileNameToStore);
            // Delete previous image
            Storage::delete('public/slider_images/'.$slider->image);
        } else {
            $fileNameToStore = $slider->image;
        }

        // update product
        $slider->image = $fileNameToStore;
        $slider->save();

        return redirect('/slider')->with('success', 'Slider Updated');
    }



    public function destroy($id){
        $slider = Slider::find($id);
        // Delete Image file from folder
        Storage::delete('public/slider_images/'.$slider->image);
        $slider->delete();
        return redirect('/slider')->with('success', 'Slider Deleted');
    }
}
