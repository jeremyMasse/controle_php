<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\livre;

class livreController extends Controller
{
    public function livre(int $id)
    {
        $livre = livre::findorfail($id);
        return view('livre', compact('livre'));
    }

    public function ajouter(Request $request)
    {
        request()->validate([
            'titre' =>['required'],
            'auteur' =>['required'],
            'prix' =>['required'],
            'note' =>['required'],
        ]);

        $livre = Livre::create([ 
            'titre' => request('titre'),
            'auteur' => request('auteur'),
            'prix' => request('prix'),
            'note' => request('note'),
        ]);
    }
}
