<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create(
            ['name' => '自分', 'email' => 'test@test.com']
        );
        
        factory(App\Models\User::class, 19)->create();
    }
}
