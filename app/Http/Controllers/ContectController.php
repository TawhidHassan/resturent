<?php

namespace App\Http\Controllers;
use App\Contect;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class ContectController extends Controller
{
    public function sentmassage(Request $request)
    {
      $validation=$request->validate([
                
                'name' => 'required',
                'email' => 'required|email',
                'massage' => 'required'
            ]);

         $contect=new Contect();
         $contect->name=$request->name;
         $contect->email=$request->email;
         $contect->massage=$request->massage;
         $contect->subject=$request->subject;
         $contect->save();

         Toastr::success('your sms successfully sent','success',["positionClass" => "toast-top-right"]);
         return redirect()->back();
    }
}
