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
                'unit_id' => 1,
            ],[
                'resident_name' => '福田 静江',
                'birthday' => Carbon::today(),
                'gender' => 1,
                'unit_id' => 2,
            ],[
                'resident_name' => '矢野 健太郎',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            ],[
                'resident_name' => '石原 和夫',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            ],[
                'resident_name' => '中村 すみ',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            
            ],[
                'resident_name' => '坂田 理子',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            
            ],[
                'resident_name' => '山中 かえ',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            
            ],[
                'resident_name' => '竹島 かなえ',
                'birthday' => Carbon::today(),
                'gender' => 2,
                'unit_id' => 3,
            ]
            
            ]);
    }
}
