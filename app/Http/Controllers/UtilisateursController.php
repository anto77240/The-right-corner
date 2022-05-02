<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;
use Illuminate\Support\Facades\Redirect;

class UtilisateursController extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $utilisateurs = Utilisateur::all();
        return view('admin');
        
       }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste(){
   
        $utilisateurs = Utilisateur::all();
        
        return view('utilisateurs', [
            'utilisateurs' => $utilisateurs,
        ]);
        
       }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateurs = Utilisateur::find($id); 
        return view ('utilisateurs_edit',['utilisateurs' => $utilisateurs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        Utilisateur::find($id)->update([
            'nickname' => request('nickname'),
            'email'=> request('email'),
            'phone_number'=> request('phone_number'),
            'admin'=> request('admin')

          ]);
          flash("Vos modifications ont été bien prises en compte.")->success();
          return redirect('/utilisateurs');


           /* return redirect('/utilisateurs');
            return "Vos modifications ont été bien prises en compte.";*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
        {
            $utilisateurs = Utilisateur::where('id',$id)->firstOrFail();
            $utilisateurs -> delete();
            
            flash("Votre utilisateur a été bien supprimé !")->success();

            if(!auth()->user()){
                return redirect('/');
            }
            else{
            return redirect ('utilisateurs');
            }

        } 
            
           /*
            return redirect('/utilisateurs/{id}')->withErrors([
                'email' => 'vos identifiants sont nulls'
            ]);;
        }*/
    
}
