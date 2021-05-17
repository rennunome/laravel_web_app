<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userRegisterController extends Controller
{
    public function showUser(){
        return view('user.userRegister');
    }
    
    public function userDb(Request $request){
        
        //値取得
        $user_name = $request->input('user_name');
        $password = $request->input('password');
        $admin = $request->input('admin');
       
        //if文を三項演算子で1行にまとめる
        $admin = $admin == null  ?  0:1;
        
        $email = $request->input('email');
        
        $data = [];
        $data[] = ['name' => $user_name, 'password' => Hash::make($password), 'admin_flag' => $admin, 'email' => $email];
        DB::table('users')->insert($data);
        
        $user = DB::table('users')->where('deleteflag' , 0)->get();
        return view('user.userList', compact('user'));
    }
}
