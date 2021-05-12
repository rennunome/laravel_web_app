<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class editValidateController extends Controller
{  
    public function validateForm(Request $request)
    {
        $question = $request['question'];
        $answers = $request['answers'];
        $questions_id = $request['questions_id'];
        $answer_ids = $request['answer_ids'];
        $status = true;
        $error = $this->validation($question, $answers);
       
        $q = DB::table('questions')->find($questions_id);
        $a = DB::table('correct_answers')->where('questions_id', $questions_id)->get([
            'id',
            'answer'
        ]);
        
        if ($error == null) {
            return view('edit.editConfirm', compact('question', 'answers',  'questions_id', 'answer_ids' , 'status'));
        } else {
            return view('edit.edit')->with(['error' => $error,  'question' => $q, 'answers' => $a]);
        }
    }
    private function validation($question, $answers)
    {
        if ($question == null || $answers == null) {
            return "未入力項目があります。";
        }
        if (!isset($question) || !isset($answers)) {
            return "未入力項目があります。";
        }
        if (mb_strlen($question) > 500) {
            return "問題は500文字以内で入力してください。";
        }
        foreach ($answers as $answer) {
            if (mb_strlen($answer) > 200) {
                return "答えは200文字以内で入力してください。";
            }
        }
        return null;
    }
    
    public function findByQuestionsId(Request $request)
    {
        $questions_id = $request['questions_id'];
        $q = DB::table('questions')->find($questions_id);
        $a = DB::table('correct_answers')->where('questions_id', $questions_id)->get([
            'id',
            'answer'
        ]);
    }
}
