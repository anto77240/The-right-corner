<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{



    public function display()
    {
        //$products = Ads::all();
        //$category = Categories::find($products->category_id);

        // $products = Ads::SELECT('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name')
        // ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        // ->get();

        $category = DB::table('ads')->select('Ads.category_id','Categories.id as categoryId','Categories.name')->distinct()
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->get();

        $products = DB::table('ads')->select('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name','Ads.created_at')
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->orderBy('created_at', 'DESC')
        ->paginate(3);
        // ->get();
       
        return view('index', [
            'products' => $products,
            'category' => $category,
        ]);
    }


    public function search(Request $request)
    {
        // $products = Ads::SELECT('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name')
        // ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        // ->paginate(5);

        $category = DB::table('ads')->select('Ads.category_id','Categories.id as categoryId','Categories.name')
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->get();

        $products = DB::table('ads')->select('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name','Ads.created_at')
        ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
        ->orderBy('created_at', 'DESC')
        ->paginate(2);

        
        // ->get();
        //$products= array();
        if (request('submit')){
            
            $catId = request('category');
            //var_dump($catId);
            //$products = Ads::all();

            if(request('category')){

            //$products = Ads::where('category_id', $catId)->get();
            $products = DB::table('ads')->select('Ads.title','Ads.description','Ads.price','Ads.picture','Ads.id','Categories.id as categoryId','Categories.name','Ads.created_at')
            ->join('Categories', 'Ads.category_id', '=', 'Categories.id')
            ->where('category_id', $catId)
            ->paginate(5);
            // ->get();



            return view('index', [
               'products' => $products,
               'category' => $category,
            ]);
            }

            if (request('search')){
            $search = request('search');
            $products = DB::table('ads')
            ->where('title','LIKE', '%' .$search .'%')
            ->get();
            
            return view('index', [
                'products' => $products,
                'category' => $category,
             ]);
            }


        }
        return view('index', [
            'products' => $products,
            'category' => $category,
        ]);

    }

    // public function index()
    // {
    //     $products = DB::table('ads')->orderBy('created_at', 'DESC')->paginate(2);
    //     return view('index', compact('products'));

    // }
}
