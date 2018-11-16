<?php

namespace App\Http\Controllers\Admin;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Category;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $item=Item::all();
        return view('admin.item.item',compact('item'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.item.item_form',compact('category'));
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
                
                'name' => 'required',
                'discription' => 'required',
                'price' => 'required',
                'category' => 'required',
                'image' => 'required|image'
            ]);

         $item=new Item();
       if($request->hasFile('image'))
       {
          $image=Storage::putFile('public/item_image/',$request->image);
       }
       $item->name=$request->name;
       $item->discription=$request->discription;
       $item->price=$request->price;
       $item->category_id=$request->category;
       $item->image=$image;
       $item->save();

       return redirect()->route('item.index')->with('massage','item added susecssfully');
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
        $category=Category::all();
        $item=Item::find($id);
        return view('admin.item.item_edite',compact('item'),compact('category'));
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
                
                'name' => '',
                'discription' => '',
                'price' => '',
                'category' => '',
                'image' => ''
            ]);

         $item=Item::find($id);
       if($request->hasFile('image'))
       {
        Storage::delete($item->image);
          $image=Storage::putFile('public/item_image/',$request->image);
       }
       $item->name=$request->name;
       $item->discription=$request->discription;
       $item->price=$request->price;
       $item->category_id=$request->category;
       $item->image=$image;
       $item->update();

       return redirect()->route('item.index')->with('massage','item Edite susecssfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=Item::find($id);
        if($item->image)
        {
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect()->back()->with('massage','iteme delete susecssfully');
    }
}
