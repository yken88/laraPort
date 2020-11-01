<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; 

class ResidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residents')->insert([
            [
                'resident_name' => '入江 ひろえ',
                'birthday' => Carbon::today(),
                'gender' => 1,
                'assistance' => '日常生活動作は自立です。',
                'info' => '転倒の恐れあり。本氏が立ち上がった際は要付き添い。',
                'unit_id' => 1,
            ],[
                'resident_name' => '福田 静江',
                'birthday' => Carbon::today(),
                'gender' => 1,
                'assistance' => '日常生活動作は主に自立。',
                'info' => '転倒の恐れあり。本氏が立ち上がった際は要付き添い。
                            食事は本人の気分次第なので、時折声かけをお願いします。',
                'unit_id' => 2,
            ],[
                'resident_name' => '矢野 健太郎',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'assistance' => '日常生活動作は全介助です。',
                'info' => '車椅子誘導にて移動されます。食事は全介助です。',
                'unit_id' => 3,
            ],
            
            ]);
    }
}
