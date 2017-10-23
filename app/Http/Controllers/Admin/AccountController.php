<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\Http\Requests\Admin\AddUserRequest;

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
    public function getaddUsers() {
    	return view('back-end.users.add');
    }
    public function postaddUsers(AddUserRequest $request) {
    	$data = new User;
    	$data->username = $request->username;
    	$data->email = $request->email;
    	$data->phone = $request->phone;
    	$data->password = $request->pass;
    	$data->password = $request->repass;
    	$data->save();
    }
}
