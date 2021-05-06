<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;
use App\Models\CorrectAnswers;

class regController extends Controller
{
    public function showForm()
    {
        return view('list.reg');
    }
    
    public function validateForm(Request $request)
    {
        $question = $request['question'];
        $answers = $request['answers'];
        $status = true;
        $error = $this->validation($question, $answers);
        if ($error == null) {
            return view('list.regConfirm', compact('question', 'answers', 'status'));
        } else {
            return view('list.reg', ['error' => $error]);
        }
    }
    private function validation($question, $answers)
    {
        if($question == null || $answers == null){
           return "未入力項目があります。"; 
        }
        if(mb_strlen($question) > 500){
            return "問題は500文字以内で入力してください。";
        }
        for($i = 0; $i < count($answers); $i++){
            if(mb_strlen($answers[$i]) > 200){
                return "答えは200文字以内で入力してください。";
            }
        }
        return null;
    }
    public function qaDb(Request $request)
    {
        $question = $request->input('question');
        $date = date('Y-m-d H:i:s');
        $q = Questions::create(compact('question', 'date', 'date'));
        $questions_id = $q->id;
        $answers = $request->input('answers');
        $data = [];
        foreach($answers as $answer) {
            echo "a";
            $data[] = compact('answer', 'questions_id');
        }
            DB::table('correct_answers')->insert($data);
        return view ('list.list');
    }
}
