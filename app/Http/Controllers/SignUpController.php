<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Mail\ConfirmationInscriptionMail;
use App\Mail\SignUpMail;
use Illuminate\Support\Facades\Mail;

class SignUpController extends Controller
{
    public function formulaire(){
        return view('signup');
    }

    public function traitement(){
        request()->validate([
            'email' => ['required', 'email', 'unique:utilisateurs'],
            'password' => ['required', 'confirmed', 'min:5'],
            'password_confirmation' => ['required'],
            'phone_number' => ['required'],
            'nickname' => ['required'],

        ]);


      
    
        $utilisateur = Utilisateur::create([
            'email' => request('email'), 
            'password' => bcrypt(request('password')),
            'phone_number' => request('phone_number'),
            'nickname' => request('nickname'),
            'admin' => "0",
            
        ]);

        //Mail::to($utilisateur)->send(new ConfirmationInscriptionMail);
        $email = request('email');
        $name = request('nickname');

        $user = ['email' => $email, 'name' => $name];
        Mail::to($email)->send(new SignUpMail($user));
    
        flash("Votre inscription a été validée.")->success();
        return redirect('/login');
    }
}
