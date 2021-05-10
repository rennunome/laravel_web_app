<?php

namespace App\Http\Controllers\Delete;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;
use App\Models\CorrectAnswers;


class deleteController extends Controller
{
    public function findByQuestionsId(Request $request){
        $questions_id = $request['questions_id'];
        $question = Questions::where('id', $questions_id)->value('id', 'question');
        $answer = CorrectAnswers::where('questions_id', $questions_id)->value('id', 'questions_id', 'answer');
        
        return view('delete.deleteConfirm', compact('question', 'answer'));
    }
}
