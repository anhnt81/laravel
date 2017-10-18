<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function getLogin () {
        return view('auth.login');
    }
    public function postLogin (LoginRequest $request) {
//        $login = new User;
        $login = [
            'username' => $request -> username,
            'password' => $request -> password,
            'level' => 1
        ];
        if (auth::attempt($login)) {
//            return redirect()->route('home');
            return 'Ban da dang nhap thanh cong';
        }else {
            return redirect()->back();
        }
    }

    public function getRegister(){
        return view('auth.register');
    }
}
