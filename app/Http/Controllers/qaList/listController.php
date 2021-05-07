<?php
namespace App\Http\Controllers\qaList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\CorrectAnswers;

class listController extends Controller
{

    public function showList()
    {
        $questions = Questions::all();
        $correct_answers = CorrectAnswers::all();
        
        return view('list/list', compact('questions', 'correct_answers'));
    }
}
?>