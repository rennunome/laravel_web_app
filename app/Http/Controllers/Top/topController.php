<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class topController extends Controller
{
        public function showTop()
    {
       $user_id = Auth::id();
       
       //admin_flagをEloquent Modelの中から取得し、渡す
       $users = User::where('id', $user_id)->get();
       foreach($users as $user){
            $admin = $user->admin_flag;
       }
        return view('top.top', compact('admin'));
    }
}
