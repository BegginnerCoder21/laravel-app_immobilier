<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\authUser;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){

        return view('dashboard.auth.login');
    }

    public function login(Request $request){
        $isAuth = (new authUser())->authUserAdmin(email: $request->email,password: $request->password);

        if ($isAuth){
            return view('dashboard.admin');
        }
        return view('dashboard.auth.login');
    }
}
