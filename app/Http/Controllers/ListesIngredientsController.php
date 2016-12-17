<?php

namespace App\Http\Controllers;

use App\ListesIngredients;
use Illuminate\Http\Request;

class ListesIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'liste_id' => 'required',
            'ingredient_id' => 'required',
            'Quantity' => 'required',
            'Unit' => 'required'
        ]);

        $liste = $request->all();
        dd($request);

        $liste = new ListesIngredients();
        $liste->liste_id = $request->liste_id;
        $liste->ingredient_id = $request->ingredient_id;
        $liste->Quantity = $request->Quantity;
        $liste->Unit = $request->Unit;
        $liste->save();

//        ListesIngredients::create($liste);

        return response()->json(['isDone' => 'Done !', 'request' => $request]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ing = ListesIngredients::findOrFail($id);
        $ing->delete();

        return response()->json(['isDone' => 'Done !', 'id' => $id]);
    }
}
