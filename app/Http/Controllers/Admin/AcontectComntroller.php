<?php

namespace App\Http\Controllers\Admin;
use App\Contect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AcontectComntroller extends Controller
{
    public function index()
    {
       $contect=Contect::all();
    	return view('admin.contect.contect',compact('contect'));
    }

     public function details($id)
    {
       $contect=Contect::find($id);
      return view('admin.contect.details',compact('contect'));
    }
     public function delete($id)
    {
       $contect=Contect::find($id);
       $contect->delete();
      Toastr::success('delete successsfully ','success',["positionClass" => "toast-top-right"]);
          return redirect()->back();
    }

}
