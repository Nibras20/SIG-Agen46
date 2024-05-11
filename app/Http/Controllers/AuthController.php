<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function prosesloginadmin(Request $request)
    {
       if(Auth::guard('user')->attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('dashboardadmin');
       } else{
        return redirect('admin')->with(['warning'=>'Username atau Password Salah']);
       }
    }

    public function proseslogoutadmin(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('admin');
        }
    }
}
