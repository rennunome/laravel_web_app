<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\CorrectAnswers;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class editController extends Controller
{
    public function findByQuestionsId(Request $request)
    {
        $questions_id = $request['questions_id'];
        $question = DB::table('questions')->find($questions_id);
        $answers = DB::table('correct_answers')->where('questions_id', $questions_id)->get([
            'id',
            'answer'
        ]);
        return view('edit.edit')->with([
            'question' => $question,
            'answers' => $answers
        ]);
    }
    
    public function showEditConfirm(Request $request)
    {
        $questions_id = $request['questions_id'];
        $question = $request['question'];
        $answer_ids = $request['answer_ids'];
        $answers = $request['answers'];
        return view('edit.editConfirm')->with([
            'question' => $question,
            'answer' => $answers,
            'answer_ids' => $answer_ids,
            'questions_id' => $questions_id
        ]);
    }
    
    public function qaEditDb(Request $request)
    {
        $questions_id = $request['questions_id'];
        
        $q = Questions::where('id', $questions_id)->first();
        $q->question = $request->input('question'); // echo gettype($q->question); string
        $q->save(); //echo gettype($q); object
        
        $answers = DB::table('correct_answers')->where('questions_id', $questions_id)->get();
        foreach($answers as $a){
           $a->answer = $request->input('answers'); // echo gettype($a->answer); string
           $a->save(); //echo gettype($a); object
        }
        $questions = Questions::all();
        $correct_answers = CorrectAnswers::all();
        return view('list.list', compact('questions', 'correct_answers'));
    }
}