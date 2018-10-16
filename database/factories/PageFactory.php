<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Page::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1, 99999),
        'name' => $faker->word,
        'route' => $faker->word
    ];
});
