<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function listes()
    {
        return $this->belongsToMany('App\ListeCourse', 'assoc_liste_ingredients', 'ingredient_id', 'liste_id');
    }
}
