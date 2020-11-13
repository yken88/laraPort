<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
        [
            'unit_name' => 'ひまわり',
            'user_id' => 1,
            'floor' => 5,
        ],[
            'unit_name' => 'つつじ',
            'user_id' => 2,
            'floor' => 5,
        ],[
            'unit_name' => 'あじさい',
            'user_id' => 3,
            'floor' => 4,
        ],[
            'unit_name' => 'たんぽぽ',
            'user_id' => 4,
            'floor' => 4,
        ],[
            'unit_name' => 'ばら',
            'user_id' => 5,
            'floor' => 3,
        ],[
            'unit_name' => 'つばき',
            'user_id' => 6,
            'floor' => 3,
        ],[
            'unit_name' => 'ふじ',
            'user_id' => 7,
            'floor' => 2,
        ],[
            'unit_name' => 'るり',
            'user_id' => 8,
            'floor' => 2,
        ],[
            'unit_name' => 'たけ',
            'user_id' => 9,
            'floor' => 1,
        ],[
            'unit_name' => 'うめ',
            'user_id' => 10,
            'floor' => 1,
            ]
        ]);
    }
}
