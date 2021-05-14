<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userEditController extends Controller
{
    public function userEdit(Request $request){
    $user_id = $request->input('user_id');
    $user_name = $request->input('user_name');
    $admin = $request->input('admin');
    $pw = $request->input('pw');
   
     return view('user.userEdit', compact('user_id', 'user_name', 'admin', 'pw'));
    }
    
    public function userEditDb(Request $request){
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $admin = $request->input('admin');
        $password = $request->input('password');
        
        if($admin == "管理者"){
            $admin = 1;
        }else{
            $admin = 0;
        }
        
        DB::table('users')->where('id', $user_id)->update(['password' => Hash::make($password), 'name' => $user_name, 'admin_flag' => $admin]);
        
       $user = DB::table('users')->where('deleteflag', 0)->get();
        return view('user.userList', compact('user'));
    }
}
