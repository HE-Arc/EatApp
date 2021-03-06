<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeCourse extends Model
{
    //
    protected $table = 'liste_courses';
    protected $fillable = ['nom'];

    public function store(array $data)
    {
        self::create($data);
    }

    public function updateListeCourse($id,$nom)
    {
        $listeCourse = ListeCourse::find($id);
        $listeCourse->nom = $nom;
        $listeCourse->save();
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'assoc_liste_ingredients', 'liste_id', 'ingredient_id')
            ->withPivot('Quantity')
            ->withPivot('id');
    }

}
