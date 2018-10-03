<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'initials' => $faker->word,
        'description' => $faker->text
    ];
});
