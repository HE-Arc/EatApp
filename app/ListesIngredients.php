<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListesIngredients extends Model
{
    protected $table = 'assoc_liste_ingredients';
    protected $fillable = ['liste_id', 'ingredient_id', 'Quantity', 'Unit'];

    public function store(array $data)
    {
        self::create($data);
    }

}
