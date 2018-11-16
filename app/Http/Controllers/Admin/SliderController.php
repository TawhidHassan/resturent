<?php

namespace App\Http\Controllers\Admin;
use App\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::all();
        return view('admin.slider',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.slider_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
                
                'slider_title' => 'required',
                'slider_sub_title' => 'required',
                'image' => 'required|image'
            ]);
       $slider=new Slider();
       if($request->hasFile('image'))
       {
          $image=Storage::putFile('public/',$request->image);
       }
       $slider->slider_title=$request->slider_title;
       $slider->slider_sub_title=$request->slider_sub_title;
       $slider->image=$image;
       $slider->save();

       return redirect()->route('slider.index')->with('massage','slider added susecssfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider_edite',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validation=$request->validate([
                
                'slider_title' => 'required',
                'slider_sub_title' => 'required',
                'image' => 'image'
            ]);
         $slider=Slider::find($id);
       $slider->slider_title=$request->slider_title;
       $slider->slider_sub_title=$request->slider_sub_title;

        if($request->hasFile('image'))
       {
          Storage::delete($slider->image);
          $image=Storage::putFile('public/',$request->image);
       }
       $slider->image=$image;
       $slider->update();

       return redirect()->route('slider.index')->with('massage','slider added susecssfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        if($slider->image)
        {
            Storage::delete($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('massage','slider delete susecssfully');
    }
}
