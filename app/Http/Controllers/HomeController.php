<?php

namespace App\Http\Controllers;

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
        $listesIng = [
            str_slug('Liste_Maison') => [
                'name' => 'Liste Maison',
                'ingredients' => [
                    ['id' => 'poulet', 'desc' => 'Poulet', 'quantity' => 300, 'unit' => 'gr'],
                    ['id' => 'poisson', 'desc' => 'Poisson', 'quantity' => 2, 'unit' => 'filet'],
                    ['id' => 'papier-menage', 'desc' => 'Papier ménage', 'quantity' => 12, 'unit' => 'rouleau']
                ]
            ],
            str_slug('Liste #Coloc') => [
                'name' => 'Liste #coloc',
                'ingredients' => [
                    ['id' => 'liquide-vaiselle', 'desc' => 'Liquide vaisselle', 'quantity' => 1, 'unit' => 'bouteille'],
                    ['id' => 'biere', 'desc' => 'Bière', 'quantity' => 20, 'unit' => 'l']
                ]
            ],
            'Liste_nulle' => [
                'name' => 'Liste nulle',
                'ingredients' => []
            ]
        ];
        return view('layouts.children.children.index', compact('titre', 'listesIng'));
    }
}
