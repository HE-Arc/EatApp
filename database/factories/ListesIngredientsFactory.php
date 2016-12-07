<?php
$factory->define(App\ListesIngredients::class, function (Faker\Generator $faker) {

    return [
        'Quantity' => $faker->numberBetween($min = 1, $max = 100),
        'Unit' => $faker->randomElement($array = array ('ml','dl','g','kg')),
        'liste_id' => $faker->randomElement(\App\ListeCourse::all()->pluck('id')->toArray()),
        'ingredient_id' => $faker->randomElement(\App\Ingredient::all()->pluck('id')->toArray()),
    ];
});
