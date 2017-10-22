<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class AccountController extends Controller
{
    //hiển thị danh sách tài khoản admin
    public function listUsers(){
        $list = User::select('id', 'username', 'created_at', 'level', 'sotk')->orderBy('id', 'DESC')->get();
        return view('back-end.users.list', compact('list'));

    }
    //hiển thị danh sách người chơi
    public function  accCustomer(){

    }
    public function addUsers() {
    	
    }
}
