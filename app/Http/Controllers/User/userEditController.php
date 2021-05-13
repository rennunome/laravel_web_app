<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userEditController extends Controller
{
    public function userEdit(Request $request){
    $user_id = $request->input('user_id');
    $user = User::where('id', $user_id)->get();
    
    view('user.userEdit', compact('user'));
    }
}
