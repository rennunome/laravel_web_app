<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class editController extends Controller
{
    public function findByQuestionsId(Request $request)
    {
        $questions_id = $request['questions_id'];
        $question = DB::table('questions')->find($questions_id);
        $answer = DB::table('correct_answers')->where('questions_id', $questions_id)->get([
            'id',
            'answer'
        ]);
        return view('edit.edit')->with([
            'question' => $question,
            'answer' => $answer
        ]);
    }
    
    public function showEditConfirm(Request $request)
    {
        $questions_id = $request['questions_id'];
        $question = $request['question'];
        $answer_ids = $request['answer_ids'];
        $answer = $request['answer'];
        return view('edit.editConfirm')->with([
            'question' => $question,
            'answer' => $answer,
            'answer_ids' => $answer_ids,
            'questions_id' => $questions_id
        ]);
    }
}