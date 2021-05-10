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

    public function qaDb(Request $request)
    {
        $question = $request->input('question');
        $date = date('Y-m-d H:i:s');
        $q = Questions::create(compact('question', 'date', 'date'));
        $questions_id = $q->id;
        $answers = $request->input('answers');
        $data = [];
        foreach ($answers as $answer) {
            $data[] = compact('answer', 'questions_id');
        }
        DB::table('correct_answers')->insert($data);
        $questions = Questions::all();
        $correct_answers = CorrectAnswers::all();
        return view('list.list', compact('questions', 'correct_answers'));
    }
}