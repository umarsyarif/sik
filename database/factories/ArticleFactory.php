<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, true),
        'user_id' => 1,
        'category_id' => $faker->numberBetween(1,5),
        // 'slug' => \Str::slug($faker->sentence(6, true)),
        'content' => $faker->paragraph(10)
    ];
});
