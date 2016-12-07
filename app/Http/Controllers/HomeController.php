<?php

namespace App\Http\Controllers;

use App\ListeCourse;
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
//        $allListes = ListeCourse::all();
        $listesIng = [
            str_slug('Liste_Maison') => [
                'name' => 'Liste Maison',
                'ingredients' => [
                    ['id' => str_slug('Poulet'), 'desc' => 'Poulet', 'quantity' => 300, 'unit' => 'gr'],
                    ['id' => str_slug('Poisson'), 'desc' => 'Poisson', 'quantity' => 2, 'unit' => 'filet'],
                    ['id' => str_slug('Papier ménage'), 'desc' => 'Papier ménage', 'quantity' => 12, 'unit' => 'rouleau']
                ]
            ],
            str_slug('Liste #Coloc') => [
                'name' => 'Liste #coloc',
                'ingredients' => [
                    ['id' => str_slug('Liquide vaiselle'), 'desc' => 'Liquide vaisselle', 'quantity' => 1, 'unit' => 'bouteille'],
                    ['id' => str_slug('Bière'), 'desc' => 'Bière', 'quantity' => 20, 'unit' => 'l']
                ]
            ],
            str_slug('Liste nulle') => [
                'name' => 'Liste nulle',
                'ingredients' => []
            ]
        ];
        return view('layouts.index', compact('titre', 'listesIng'));
    }
}
