<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ViewAdsController;



//include

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index');

////SignUp////
Route::get('/sign_up', [SignUpController::class, 'formulaire']);
Route::post('/sign_up', [SignUpController::class, 'traitement']);



////Login////
Route::get('/login', [LoginController::class, 'formulaire']);
Route::post('/login', [LoginController::class, 'traitement']);


////Mon Compte////
Route::get('/mon-compte', [CompteController::class, 'accueil'])->middleware('App\Http\Middleware\Admin');
Route::get('/mon-compte', [MyAccountController::class, 'show'])->middleware('App\Http\Middleware\Admin');

//Route::get('/mon-compte', [MyAccountController::class, 'display'])->middleware('App\Http\Middleware\Admin');

////Mes annonces////
Route::get('/mesannonces', [CompteController::class, 'accueil'])->middleware('App\Http\Middleware\Admin');
Route::get('/mesannonces', [MyAccountController::class, 'display'])->middleware('App\Http\Middleware\Admin');


////Index////
Route::get('/', [IndexController::class, 'display']);
Route::post('/', [IndexController::class, 'search']);
//Route::get('/', [IndexController::class, 'index']);





////ADS////
Route::get('/depot-annonce', [AdsController::class, 'formulaire'])->middleware('App\Http\Middleware\Admin');
Route::post('/depot-annonce', [AdsController::class, 'traitement'])->middleware('App\Http\Middleware\Admin');

////Delete ADS////
Route::get('/deleteAds/{id}', [MyAccountController::class, 'delete'])->middleware('App\Http\Middleware\Admin');
Route::post('/deleteAds/{id}', [MyAccountController::class, 'delete'])->middleware('App\Http\Middleware\Admin');

////Edit ADS////
Route::get('/editAds/{id}', [MyAccountController::class, 'edit'])->middleware('App\Http\Middleware\Admin');
Route::put('/editAds/{id}', [MyAccountController::class, 'update'])->middleware('App\Http\Middleware\Admin');

///Mon-Compte_Show///
//Route::get('mon-compte', [MyAccountController::class, 'show']);

///Mon-Compte_Delete///
Route::get('/mon-compte_destroy/{id}',[UtilisateursController::class, 'destroy']);
Route::post('/mon-compte_destroy/{id}',[UtilisateursController::class, 'destroy']);

////Deconnexion////
Route::get('/deconnexion', [CompteController::class, 'deconnexion'])->middleware('App\Http\Middleware\Admin');


////View Ads////
Route::get('/viewAds/{id}', [ViewAdsController::class, 'display']);

///contact///
Route::get('/contact', function() {
    return view('contact');
});
Route::post('/contact', function() {
    flash("Message envoyé!")->success();
    return back();
});


Route::group([
    'middleware'=>'App\Http\Middleware\Authadmin'
], function(){
            ////Admin_User////
            Route::get('/utilisateurs', [UtilisateursController::class, 'liste']);

            ////Admin_Home////
            Route::get('/admin', [UtilisateursController::class, 'index']);

            ////Admin_Products////
            Route::get('/admin_ads', [AdsController::class, 'liste']);


            ///Admin_User_Edit////
            Route::get('/utilisateurs_edit/{id}',[UtilisateursController::class, 'edit']);
            Route::put('/utilisateurs_edit/{id}',[UtilisateursController::class, 'update']);


            ///Admin_User_Delete////
            Route::get('/utilisateurs_destroy/{id}',[UtilisateursController::class, 'destroy']);
            Route::post('/utilisateurs_destroy/{id}',[UtilisateursController::class, 'destroy']);


            ///Admin_Categorie///
            Route::get('/admin_categories', [CategoriesController::class, 'liste']);

            ///Admin_Categories_Add///
            Route::get('/categories_add', [CategoriesController::class, 'formulaire']);
            Route::post('/categories_add', [CategoriesController::class, 'traitement']);

            ///Admin_Categorie_Edit////
            Route::get('/categories_edit/{id}',[CategoriesController::class, 'edit']);
            Route::put('/categories_edit/{id}',[CategoriesController::class, 'update']);

            ///Admin_Categorie_Delete////
            Route::get('/categories_destroy/{id}',[CategoriesController::class, 'destroy']);
            Route::post('/categories_destroy/{id}',[CategoriesController::class, 'destroy']);
});