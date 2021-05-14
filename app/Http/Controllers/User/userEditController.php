<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userEditController extends Controller
{
    public function userEdit(Request $request){
    $user_id = $request->input('user_id');
    $user_name = $request->input('user_name');
    $admin = $request->input('admin');
    $pw = $request->input('pw');
   
     return view('user.userEdit', compact('user_id', 'user_name', 'admin', 'pw'));
    }
}
