<?php
$factory->define(App\Ingredient::class, function (Faker\Generator $faker) {

    return [
        'IngredientName' => $faker->firstNameFemale,
        'Metricunit' => $faker->randomElement($array = array ('ml','dl','g','kg')),
        'bigOvenID' => 1, //choix partial
    ];
});
