<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;
use App\Models\CorrectAnswers;

class testController extends Controller
{
    public function showTest(){
    //DBのquestionsテーブルからrandomにquestionsを取得
    $questions = Questions::inRandomOrder()->get();
    return view('test.test', compact('questions'));
    }
    
    public function markTest(Request $request){
        $questions_id = $request->input('questions_id');
        $test_answers = $request->input('test_answers');
        
        //ログインしているユーザー情報を取得
        $user = Auth::user()->get();
        
        $score = 0.0;
        
        //採点処理
        for ($i = 0; $i < count($test_answers); $i++) {
            for ($j = 0; $j < count($questions_id); $j++) {
               $q_id = DB::table('correct_answers')->where('questions_id', $questions_id)->get(['questions_id', 'answer']);
                for ($k = 0; $k < count($q_id); $k++) {
                    if($q_id[$k]->questions_id == $questions_id[$j]){
                        if($q_id[$k]->answer == $test_answers[$i]){
                            $score++;
                        }
                    }
                }
            }
        }
        //問題数
        $total_qs = count($questions_id);
        //得点
        $total = $score++;
        //得点/100点
        $total_score = round(100 * $total /$total_qs);
        //採点日時
        date_default_timezone_set('Asia/Tokyo');
        $date = date("Y/m/d H:i");
        view('test.result', compact('total_qs', 'total', 'total_score', 'date', 'user') );
    }
}
