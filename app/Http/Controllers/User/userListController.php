<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userListController extends Controller
{
    public function showUserList()
    {
        $user_list =  DB::table('users')->get();
        return view('user.userList', compact('user_list'));
    }
    
    public function registerUser()
    {
        return view('auth.register');
    }
}
