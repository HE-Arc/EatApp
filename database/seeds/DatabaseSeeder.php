<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ListeCourse::class,15)->create();
        factory(\App\Ingredient::class,15)->create();
        factory(\App\ListesIngredients::class,15)->create();
        factory(\App\User::class,5)->create();
        factory(\App\ListesUsers::class,15)->create();
    }
}
