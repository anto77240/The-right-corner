<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin');
    }

/** 
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function liste(){
  
       $categories = Categories::all();
       
       return view('admin_categories', [
           'categories' => $categories,
       ]);
       
      }
    

      public function formulaire(){
        return view('categories_add');
    }

    public function traitement(){
        request()->validate([
            'name' => ['required', 'unique:categories,name'],

   
        ]);

      

        Categories::create([
            'name' => request('name'),

  
        ]);
        
        flash("Votre categorie a bien été ajoutée")->success();
            return redirect('/admin_categories');

    }


    public function destroy($id)
        {
            $categories = Categories::where('id',$id)->firstOrFail();
            $categories -> delete();
            
            flash("Votre categorie a été bien supprimée !")->success();
            return redirect ('admin_categories');
        } 


        public function edit($id)
        {
            $categories = Categories::find($id); 
            return view ('categories_edit',['categories' => $categories]);
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
         
            Categories::find($id)->update([
                'name' => request('name'),
             
    
              ]);
              flash("Vos modifications ont été bien prises en compte.")->success();
              return redirect('/admin_categories');
    
    
               /* return redirect('/utilisateurs');
                return "Vos modifications ont été bien prises en compte.";*/
            
        }

}
