<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Ads; 


class ViewAdsController extends Controller
{
    public function display($id)
    {
        $products = Ads::where('id', $id)->firstOrFail();
        // redirect
        return view('viewAds', [
            'products' => $products,
        ]);    
    }
}
