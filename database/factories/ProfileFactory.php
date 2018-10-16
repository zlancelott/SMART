<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Profile::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1, 99999),
        'name' => $faker->word,
        'initials' => $faker->word,
        'description' => $faker->text
    ];
});
