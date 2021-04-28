<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Questions;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('questions')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $questions = [
            ['question' => 'How is the weather today?',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ];
        
        // 登録
        foreach($questions as $question) {
            Questions::create($question);
        }
    }
}
