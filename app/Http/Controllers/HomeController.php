<?php

namespace App\Http\Controllers;

//use App\Category;
//use App\Product;
use App\Models\Car;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['hotels'] = Hotel::latest()->get();
        $data['cars'] = Car::latest()->get();
        return view('Frontend.layouts.master',$data);
//        return  back();
    }
}
