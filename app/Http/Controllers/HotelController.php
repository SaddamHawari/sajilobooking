<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
   public function addHotel(){
       return view('Frontend.layouts.hotel.add-hotel');
   }

   public  function  store(Request  $request){

       $request->validate([
           'name' =>'required',
           'email' =>'required',
       ]);
       DB::beginTransaction();
       $user_info = [
           'name' => $request->name,
           'email' => $request->email,
           'role' => $request->role,
           'phone' => $request->phone,
           'fax' => $request->fax,
           'website' => $request->website,
           'facebook' => $request->facebook,
           'instagram' => $request->instagram,
           'twitter' => $request->twitter,
           'linkedin' => $request->linkedin,
       ];
       dd($user_info);
       User::updateOrCreate(['name' => $request->name,'email' => $request->email,'phone' => $request->phone],$user_info);

       $image_url = '';

       if($request->hasFile('image')){

           $file = $request->file('image');
           $fname = str_random(5).time().$file->getClientOriginalName();
           $path = public_path('hotels/');
           $file->move($path, $fname);
       }

       $acoomodation_info = [
           'bussiness_name' => $request->bussiness_name,
           'country' => $request->country,
           'region' => $request->region,
           'region_code' => $request->country_region,
           'street_address' => $request->street,
           'additional_information' => $request->additonal_information ?? null,
           'total_room' => $request->room ?? null,
           'price_min' => $request->min_price ?? null,
           'currency' => $request->currency_tweo ?? null,
           'description' => $request->message ?? null,
           'additional_description' => $request->message_two,
           'min_stay' => $request->radio ??null,
           'security' => $request->security ?? null,
           'staff' => $request->staff ?? null,
           'housekeeping' => $request->housekeeping ?? null,
           'frontdesk' => $request->frontdesk,
           'bathroom' => $request->bathroom ??  null,
           'image' => $image_url,
       ];
       Accomodation::create($acoomodation_info);

       DB::commit();

       return redirect()->back();

   }

}
