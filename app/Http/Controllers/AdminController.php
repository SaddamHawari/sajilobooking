<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.admin.login');

    }


    public function submit(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                Auth::login($admin);
                return  redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('error_message', 'Password mismatch');

            }
        }else{
            return redirect()->back()->with('error_message', 'Admin Doesn Exist');
        }
    }





    public function AdminDashboard()
    {
        return view('backend.layouts.dashboard');
    }
}
