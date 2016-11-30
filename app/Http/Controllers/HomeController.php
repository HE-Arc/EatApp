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
        $titre = 'Liste personnelle';
        $listesIng = [
            'Liste_Maison' => [
                'name' => 'Liste Maison',
                'ingredients' => [
                    ['desc' => 'Poulet', 'quantity' => 300, 'unit' => 'gr'],
                    ['desc' => 'Poisson', 'quantity' => 2, 'unit' => 'filet'],
                    ['desc' => 'PQ', 'quantity' => 100, 'unit' => 'rouleaux']
                ]
            ],
            'Liste_coloc' => [
                'name' => 'Liste #coloc',
                'ingredients' => [
                    ['desc' => 'Liquide vaisselle', 'quantity' => 1, 'unit' => 'bouteille'],
                    ['desc' => 'Bière', 'quantity' => 20, 'unit' => 'l']
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
