<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Utilisateur; 
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

class LoginController extends Controller
{
    public function formulaire(){
        return view('login');
    }

    public function traitement(){
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

   
        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
            'admin' => 1
        ]);

        $result2 = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
            'admin' => 0,
        ]);



        $result3 = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
            'admin' => null,
        ]);


        if($result){
          
            flash("Vous êtes maintenant connecté en tant qu'administrateur !")->success();
            return redirect('/admin');
        }

        if($result2){
           
           
             flash("Vous êtes maintenant bien connecté !")->success();
             return redirect('/');
         }

         if($result3){
           
           
            flash("Vous êtes maintenant bien connecté !")->success();
            return redirect('/');
        }

        return back()->withInput()->withErrors([
            'email' => 'Identifiants incorrect.',
        ]);    


    }


}
