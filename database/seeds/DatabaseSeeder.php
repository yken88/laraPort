<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(PostsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ResidentsTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        //$this->call(AdlsTableSeeder::class);

        factory(App\Models\Admin::class)->create(
            ['username' => 'kentaro', 'password' => bcrypt('password')]
        );
    }
}
