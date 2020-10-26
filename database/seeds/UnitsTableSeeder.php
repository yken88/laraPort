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
        ]
        ]);
    }
}
