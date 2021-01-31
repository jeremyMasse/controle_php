<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\livre;

class UserController extends Controller
{
    public function possede()
    {
        $utilisateur = auth()->user();
        $livre = livre::where('id', request('id'))->firstorfail();

        $utilisateur->posseder()->attach($livre);

        flash("Vous avez maintenant un nouveau livre dans votre bibliothèque")->success();
        return back();
    }

    public function depossede()
    {
        $utilisateur = auth()->user();
        $livre = livre::where('id', request('id'))->firstorfail();

        $utilisateur->posseder()->detach($livre);

        flash("Vous avez retiré ce livre de votre bibliothèque")->success();
        return back();
    }

    public function count()
    {
        return auth()->user()->livre->count();
    }

    public function trier_par_note()
    {
        $livres = auth()->user()->livres
        ->sortByDesc(function($livres){
            $livres->note;
        });

        return view('profil', compact('livres'));
    }

    public function deconnexion() //deconnexion
    {
        auth()->logout();

        return redirect('/connexion');
    }

}
