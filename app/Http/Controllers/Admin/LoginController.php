<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){

        return view('dashboard.auth.login');
    }

    public function login(Request $request){

        if (auth()->guard('admin')->attempt(['email' => $request->email,'password' => $request->password])){
            return view('dashboard.admin');
        }
    }
}
