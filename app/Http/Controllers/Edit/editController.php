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
        $q->question = $request->input('question'); 
        $q->save(); 
        
        $answers = DB::table('correct_answers')->where('questions_id', $questions_id)->get(); 
       
       //answer_idsを指定してupdateメソッドでDB登録
        $answer_ids = $request->input('answer_ids');
        $answers = $request->input('answers');
        
        for ($i = 0; $i < count($answers); $i++) {
            DB::table('correct_answers')->where('id', $answer_ids[$i])->update(['answer'=> $answers[$i]]);
        }
        
        //listに遷移
        $questions = Questions::all();
        $correct_answers = CorrectAnswers::all();
        return view('list.list', compact('questions', 'correct_answers'));
    }
}