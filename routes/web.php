<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AffichageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Front-end
Route::get('/', [AffichageController::class,'show']);
Route::get('/showall', [AffichageController::class,'showAll']);
Route::get('/showcategorie/{id}', [AffichageController::class,'showCategorie']);
Route::get('/show/{id}',[AffichageController::class,'showArticle']);

// Panier
Route::get('/panier',[CartController::class,'index']);
Route::post('/ajouteraupanier',[CartController::class,'store']);
Route::delete('/panier/{rowId}',[CartController::class,'destroy']);

// Groupe des routes
Route::middleware('can:gestion-app')->group(function(){

    // Back--end
    Route::get('/gestion',function(){ return view('admin'); });


    // Back-end article
    Route::get('articles',[ArticleController::class,'index']);
    Route::get('articles/create',[ArticleController::class,'create']);
    Route::post('articles',[ArticleController::class,'store']);
    Route::get('articles/{id}/edit',[ArticleController::class,'edit']);
    Route::put('articles/{id}',[ArticleController::class,'update']);
    Route::delete('articles/{id}',[ArticleController::class,'destroy']);
    Route::get('articles/{id}/article',[ArticleController::class,'getOne']);
    Route::get('articles/search',[ArticleController::class,'search']);

    // Back-end categorie
    Route::get('categories',[CategorieController::class,'index']);
    Route::get('categories/create',[CategorieController::class,'create']);
    Route::post('categories',[CategorieController::class,'store']);
    Route::get('categories/{id}/edit',[CategorieController::class,'edit']);
    Route::put('categories/{id}',[CategorieController::class,'update']);
    Route::delete('categories/{id}',[CategorieController::class,'destroy']);
    Route::get('categories/search',[CategorieController::class,'search']);

    // Back-end user
    Route::get('users',[UserController::class,'index']);
    Route::get('users/{id}/edit',[UserController::class,'edit']);
    Route::put('users/{id}',[UserController::class,'update']);
    Route::delete('users/{id}',[UserController::class,'destroy']);
    Route::get('users/search',[UserController::class,'search']);

});

// Authentification
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
