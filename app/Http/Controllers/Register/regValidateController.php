<?php
namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;
use App\Models\CorrectAnswers;

class regValidateController extends Controller
{
    public function validateForm(Request $request)
    {
        $question = $request['question'];
        $answers = $request['answers'];
        $status = true;
        $error = $this->validation($question, $answers);
        if ($error == null) {
            return view('list.regConfirm', compact('question', 'answers', 'status'));
        } else {
            return view('list.reg')->with(['error' => $error]);
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
        foreach ($answers as $answer){
            if(mb_strlen($answer) > 200){
                return "答えは200文字以内で入力してください。";
            }
        }
        return null;
    }
}