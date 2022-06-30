<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin extends Controller
{
    public function index(){
        
         
            return view('admin.base');
       
    }
    public function layout_login(){
        return view('admin.login');
    }
    // public function layout_res(){
    //     return view('admin.register_acc');
    // }
    public function login_account(Request $request){

        $data = $request->all();
         
        $email = $data['email'];
        $password = $data['password'];
        if ( $email == "" ||  $password == "") {
           return redirect()->back()->with('mess','khong duoc bo trong');
        }
        if(Auth::attempt(['email' => $email,'password' => $password])){
           Session::put('email',$email);
           return redirect('/index_admin');
        }else{
           return redirect()->back()->with('mess','email hoac mat khau khong dung');
        }

         

    }
    
     
}
