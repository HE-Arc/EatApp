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
        $assoc = ListesIngredients::all();
        $allIng = Ingredient::all();
        $listTab = [];
        $ingTab = [];

        foreach($allListes as $list){
            $attr = $list->getAttributes();
            $attr["slug"] = str_slug($attr["nom"]);
            $listTab[$attr["id"]] = $attr;
            $listTab[$attr["id"]]["ingredients"] = [];
        }

        foreach($allIng as $ing) {
            $attr = $ing->getAttributes();
            $attr["slug"] = str_slug($attr["IngredientName"]);
            $ingTab[$attr['id']] = $attr;
        }

        foreach($assoc as $list){
            $attr = $list->getAttributes();
            $ing = $ingTab[$attr["ingredient_id"]];
            $ing["Quantity"] = $attr["Quantity"];
            $listTab[$attr["liste_id"]]["ingredients"][$attr["ingredient_id"]] = $ing;
        }

        return view('layouts.index', compact('titre', 'listTab'));
    }
}
