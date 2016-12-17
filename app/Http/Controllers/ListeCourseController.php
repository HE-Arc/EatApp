<?php

namespace App\Http\Controllers;

use Session;
use App\Ingredient;
use App\ListeCourse;
use App\ListesIngredients;
use Illuminate\Http\Request;

class ListeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes = ListeCourse::all();
       // dd($listes);

        $titre = "Edition de liste";
        return view('listeCourse.edit',compact('titre'));
    }

    public function user()
    {
        $titre = "Gestion des utilisateurs";
        return view('listeCourse.user',compact('titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titre = "Ajout d'une liste";
        return view('listeCourse.create', compact('titre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required'
        ]);

        $liste = $request->all();

        ListeCourse::create($liste);

//        return redirect()->back();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liste = ListeCourse::find($id);
        dd($liste);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = ListeCourse::find($id);
        $allIng = Ingredient::all();

        $liste = [
            'ingredients' => [],
            'slug' => str_slug($list->nom),
            'name' => $list->nom,
            'id' => $id
        ];
        foreach($list->ingredients as $ing) {
            $attr = $ing->pivot;
            $ingredient = Ingredient::find($attr->ingredient_id)['attributes'];
            $ingredient['slug'] = str_slug($ingredient['IngredientName']);
            $ingredient['Quantity'] = $attr->Quantity;
            $ingredient['id'] = $attr->ingredient_id;
            $ingredient['assoc'] = $attr->id;
            $liste['ingredients'][$attr->ingredient_id] = $ingredient;
        }

        return view('listeCourse.edit',compact('liste', 'allIng'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $liste = ListeCourse::findOrFail($id);
        $this->validate($request, [
            'nom' => 'required'
        ]);

        $input = $request->all();
        $liste->fill($input)->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liste = ListeCourse::findOrFail($id);
        $liste->delete();

        return response()->json(['isDone' => 'Done !', 'id' => $id]);

//        return redirect()->route('home');
    }
}
