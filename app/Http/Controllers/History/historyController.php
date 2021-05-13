<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\Histories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class historyController extends Controller
{
    public function showHistory(){
        $user_id= Auth::id();
        $histories = Histories::where('id', $user_id)->get();
        return view('history.history', compact('histories'));
    }
}
