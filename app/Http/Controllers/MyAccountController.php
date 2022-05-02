<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Ads; 
use App\Utilisateur;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;



class MyAccountController extends Controller
{
    public function display()
    {
        if(auth()->guest()) {
            flash("Vous devez être connecté pour voir cette page")->error();

            return redirect('/login');
        }

        // $category = DB::table('ads')->select('Ads.category_id','Categories.id as categoryId','Categories.name')
        // ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        // ->get();


        $creator = Auth::id();
        //print(gettype($creator));
        //$products = Ads::all();
        //$products = Ads::where('creator','=', $creator)->get();
        $products = DB::table('ads')->select('Ads.title','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name','Ads.creator','Ads.created_at')
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->where('creator','=', $creator)
        ->get();
        return view('mesannonces', [
            'products' => $products,
        ]);
    }

    public function show(){
        
        $userid = Auth::id();
        $utilisateurs = Utilisateur::where('id','=', $userid)->get();
        return view ('mon-compte',[
            'utilisateurs' => $utilisateurs]);
    }

    public function delete($id)
    {
        // delete
        //$products = Ads::find($id)->firstOrFail();
        $products = Ads::where('id', $id)->firstOrFail();
        $products->delete();

        // redirect
        flash("Votre annonce a bien été supprimée.");
        return back();
        // return redirect('mon-compte');
    }

    public function formulaire(){
        return redirect('depot-annonce');
    }

    public function edit($id){
        $products = Ads::find($id);
        return view('/editAds', ['products' => $products]);
    }

    public function update($id){
        request()->validate([
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:8'],
            'picture' => ['required','image'],
            'price' => ['required'],
            'location' => ['required'],
        ]);
    
        $ads = Ads::find($id)->update([
            'title' => request('title'), 
            'category' => request('category'),
            'description' => request('description'),
            'picture' => request('picture')->store('pictures','public'),
            'price' => request('price'),
            'location' => request('location'),
        ]);
    
        return "Votre annonce a bien été modifiée";
    }
}
