<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Admin;

$factory->define(Admin::class, function (Faker $faker) {
        static $seed = 0;

        $faker->seed($seed++);

        return [
            'username' => \Str::random(6),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
});
