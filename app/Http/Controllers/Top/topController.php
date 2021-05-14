<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class topController extends Controller
{
        public function showTop()
    {
       $user_id = Auth::id();
        return view('top.top');
    }
}
