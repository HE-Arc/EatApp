<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeCourse extends Model
{
    //
    protected $table = 'liste_courses';

    public function store(Request $request)
    {
        $listeCourse = new ListeCourse();
        $listeCourse->nom = $request->nom;
        $listeCourse->save();
    }

    public function updateListeCourse($id,$nom)
    {
        $listeCourse = ListeCourse::find($id);
        $listeCourse->nom = $nom;
        $listeCourse->save();
    }

}
