<?php

namespace App\Http\Controllers\user;

use App\Models\Login;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $login = Login::all();
        return view('user.home', compact('login'));
    }

    public function register()
    {
        return view('user.register');
    }

    public function postRegister(Request $request)
    {
        $register = $request->all();
        $r = new Register($register);
        $r->save();
        return redirect('user/login');
    }
}
