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
        if($request->pass == $request->repass){
            $data->password = bcrypt($request->pass);
        }
        $data->level = 2;
        //Cách debug hiển thị ra array data
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
    	$data->save();
        //with('success', 'Thêm thành công!') chính là gửi 1 message ra view listUsers e thêm đoạn code này vào file view để hiển thị thông báo nhé.
        // @if(!empty(session('success')))
        //             <div class='alert alert-success'>{{session('success')}}</div>
        //         @endif
        return redirect()->route('listUsers')->with('success', 'Thêm thành công!');
    }
}
