<?php

namespace App\Http\Controllers\Delete;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CorrectAnswers;


class deleteController extends Controller
{
    public function findByQuestionsId(Request $request){
        $questions_id = $request['questions_id'];
        $question = DB::table('questions')->find($questions_id);
        $answer = DB::table('correct_answers')->where('questions_id', $questions_id)->get(['id','answer']);
        return view('delete.deleteConfirm')->with(['question' => $question, 'answer' => $answer]);
    }
    
    public function deleteQAndA(Request $request){
        $questions_id = $request['questions_id'];
        DB::table('questions')->delete($questions_id);
        DB::table('correct_answers')->delete('questions_id', $questions_id);
        $questions = Questions::all();
        $correct_answers = CorrectAnswers::all();
        
        return view('list/list', compact('questions', 'correct_answers'));
    }
}