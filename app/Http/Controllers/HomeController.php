<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\ListeCourse;
use App\ListesIngredients;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $titre = 'Mes listes';
        $allListes = ListeCourse::all();
        $listTab = [];

        foreach($allListes as $list) {
            $l = [
                'ingredients' => [],
                'slug' => str_slug($list->nom),
                'name' => $list->nom
            ];
            foreach($list->ingredients as $ing) {
                $attr = $ing->pivot;
                $ingredient = Ingredient::find($attr->ingredient_id)['attributes'];
                $ingredient['slug'] = str_slug($ingredient['IngredientName']);
                $ingredient['Quantity'] = $attr->Quantity;

                $l['ingredients'][$attr->ingredient_id] = $ingredient;
            }
            $listTab[$list->id] = $l;
        }

        return view('layouts.index', compact('titre', 'listTab'));
    }
}
