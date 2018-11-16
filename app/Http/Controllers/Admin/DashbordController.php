<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Item;
use App\Reservation;
use App\Slider;
use App\Contect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
   public function index()
   {
   	$categorycount=Category::count();
   	$itemcount=Item::count();
   	$slidercount=Slider::count();
   	$reservatistatas=Reservation::where('statas',false)->get();
   	$reservationcount=Reservation::count();
   	$contectcount=Contect::count();
   	return view('admin.dashbord',compact('categorycount','itemcount','slidercount','reservationcount','reservatistatas','contectcount'));
   }
}
