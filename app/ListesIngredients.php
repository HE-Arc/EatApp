<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListesIngredients extends Model
{
    protected $table = 'assoc_liste_ingredients';

    public function store(Request $request)
    {
        self::create([
            $request->only('ingredient_id'),
            $request->only('ingredient_id'),
            $request->only('Quantity'),
            $request->only('Unit')
        ]);
    }

}
