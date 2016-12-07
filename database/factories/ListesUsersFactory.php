<?php
$factory->define(App\ListesUsers::class, function (Faker\Generator $faker) {

    return [
        'liste_id' => $faker->randomElement(\App\ListeCourse::all()->pluck('id')->toArray()),
        'user_id' => $faker->randomElement(\App\User::all()->pluck('id')->toArray()),
    ];
});
