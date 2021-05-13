<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class topController extends Controller
{
        public function showTop()
    {
        return view('top.top');
    }
}
