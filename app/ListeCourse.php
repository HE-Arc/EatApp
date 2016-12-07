<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeCourse extends Model
{
    //
    protected $table = 'liste_courses';

    public function store(Request $request)
    {
        self::create($request->only('nom'));
    }

    public function updateListeCourse($id,$nom)
    {
        $listeCourse = ListeCourse::find($id);
        $listeCourse->nom = $nom;
        $listeCourse->save();
    }

}
