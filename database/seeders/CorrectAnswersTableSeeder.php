<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CorrectAnswers;
use App\Models\Questions;

class CorrectAnswersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('correct_answers')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $correct_answers = [
            ['answer' => 'Sunny',
                'questions_id' => $questions['id'],
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ];

        // 登録
        foreach ($correct_answers as $correct_answer) {
            CorrectAnswers::create($correct_answer);
        }
    }
}
