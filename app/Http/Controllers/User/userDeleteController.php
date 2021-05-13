<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class userDeleteController extends Controller
{
    public function showDelete(Request $request){
        $user_id = $request->input('user_id');
        $user = DB::table('users')->where('id', $user_id)->get();
        
        return view('user.userDeleteConfirm', compact('user'));
    }
    
    public function userDelete(Request $request){
        $user_id = $request->input('user_id');
        User::where('id', $user_id)->update([
            'deleteflag' => 1,
            'deleted_at' => date("Y/m/d H:i:s")
        ]);
        
        return view('user.userList');
    }
}
