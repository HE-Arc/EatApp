<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListesIngredients extends Model
{
    protected $table = 'assoc_liste_ingredients';

    public function store(Request $request)
    {
        dd($request);
        self::create();
    }

}
