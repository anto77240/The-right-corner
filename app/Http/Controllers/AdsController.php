<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ads; 
use App\Models\Categories; 
use App\Utilisateur; 


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




//title, category, description, picture(s), price, location

class AdsController extends Controller
{
    public function formulaire(){

        $categories = Categories::SELECT('Categories.id','Categories.name')
        // ->join('Utilisateurs', 'Ads.creator', '=', 'Utilisateurs.id')
        // ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->get();
        //dd($categories);
        // return view('depot-annonce');
        return view('depot-annonce', [
            'categories' => $categories,
        ]);
    }

    public function traitement(Request $request){

        //dd($request->all());

        $validated = $request->validate([
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required'],
            'picture' => ['required', 'image'],
            'price' => ['required'],
            'location' => ['required'],
        ]);

        //dd($validated);

        $user= Auth::id();


        //if(request('submit')){
        $catId = request('category');
        //$category = Categories::SELECT('name')
        //->where('id', $catId)->get();
        //dd($catId);
        //var_dump($category);

    
        //$cat = $category['name'];

    
        //$cat = value(['name' => $category]);
        
        
        $ads = Ads::create([
            'title' => request('title'), 
            'category' => "1",
            'description' => request('description'),
            'picture' => request('picture')->store('pictures','public'),
            'price' => request('price'),
            'location' => request('location'),
            'category_id' => $catId,
            'creator' => $user,
        ]);
    //}
        
        flash("Votre annonce a bien été déposée")->success();
            return redirect ('mesannonces');

    }

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $products = Ads::all();
        return view('admin');
        
       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste(){
     

        $products = Ads::SELECT('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Ads.category_id','Categories.name','Utilisateurs.email')
        ->join('Utilisateurs', 'Ads.creator', '=', 'Utilisateurs.id')
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->get();

        
        return view('admin_ads', [
            'products' => $products,
        ]);

        print($mail);
        
       }

}


