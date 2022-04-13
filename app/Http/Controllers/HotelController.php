<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
   public function addHotel(){
       return view('Frontend.layouts.hotel.add-hotel');
   }

}
