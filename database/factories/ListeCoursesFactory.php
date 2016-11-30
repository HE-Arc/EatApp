<?php
$factory->define(App\ListeCourse::class, function (Faker\Generator $faker) {

    return [
        'nom' => $faker->city,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
