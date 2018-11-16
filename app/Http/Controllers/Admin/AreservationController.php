<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\ReservationConmfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
/*notification*/
use Illuminate\Support\Facades\Notification;
class AreservationController extends Controller
{
     public function index()
    {
    	$reservation=Reservation::all();
    	return view('admin.reservation.reservation',compact('reservation'));
    }

     public function statas($id)
    {
    	$reservation= Reservation::find($id);
    	$reservation->statas =true;
    	$reservation->save();
      /*email system*/
      Notification::route('mail',$reservation->email )
            ->notify(new ReservationConmfirmed());
          return redirect()->back()->with('massage','reserve confirem susecssfully');
    }
    public function destroy($id)
    {
    	$reservation= Reservation::find($id);
    	$reservation->delete();
          return redirect()->back()->with('massage','delete conforme confirem susecssfully');
    }

}
