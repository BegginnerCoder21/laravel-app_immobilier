<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Services\authUser;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {

        return view('dashboard.auth.login');
    }

    // public function save()
    // {
    //     $admin = new App\Models\Admin();$admin->name = 'Teguera';$admin->email = 'aboubacar@gmail.com';$admin->password = bcrypt('t&guer@P@$$word');$admin->save();
    // }

    public function login(AdminLoginRequest $request)
    {
        $isAuth = (new authUser())->authUserAdmin(email: $request->email, password: $request->password);


        if ($isAuth) {
            return redirect()->route('admin.dashboard')->with(["success" => "authentifier avec succès."]);
        }
        return redirect()->route("get.admin.login")->with(["error" => "email ou mot de passe incorect."]);
    }
}
