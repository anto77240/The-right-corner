<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil(){
        if(auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page")->error();
            return redirect('/login');
        }

        return view('mon-compte');
    }

    public function deconnexion(){
        auth()->logout();
        flash("Vous êtes maintenant déconnecté.")->success();

        return redirect('/');
    }
}
