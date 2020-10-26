<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    static $seed = 0;

    $faker->seed($seed++);
    return [
        'title' => $faker->realtext(10),
        'content' => $faker->realText(100),
        'user_id' => $faker->numberBetween(1,10),
        'unit_id' => $faker->numberBetween(1,10),
        'resident_id' => $faker->numberBetween(1,10),
        'created_at' => now(),
    ];
});
