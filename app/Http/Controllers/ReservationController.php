<?php

namespace App\Http\Controllers;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function reserv(Request $request)
    {
       $validation=$request->validate([
                
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'date' => 'required',
                'massage' => ''
            ]);
         
         $reservation=new Reservation();
          $reservation->name=$request->name;
          $reservation->email=$request->email;
          $reservation->phone=$request->phone;
          $reservation->date=$request->date;
          $reservation->massage=$request->massage;
          $reservation->statas=false;
          $reservation->save();
          Toastr::success('reservation successsfully we will contect you as soon as posibale','success',["positionClass" => "toast-top-right"]);
          return redirect()->back();
         
    }
}
