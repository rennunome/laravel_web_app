<?php

namespace Database\Seeders;

use App\Models\Histories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('histories')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $histories = [
            ['user_id' => 1,
                'point' => 100,
                'created_at' => time(),
            ],
        ];
        
        // 登録
        foreach ($histories as $history) {
            Histories::create($history);
        }
    }
}
