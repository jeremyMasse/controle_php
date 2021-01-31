<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\livre;

class catalogueController extends Controller
{
    public function catalogue() {
        $livres = livre::all();

        return view('catalogue', [
            'livres' => $livres
            ]);
    }
}
