<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class AffichageController extends Controller
{
    public function show(){
        $articles = Article::latest()->limit(4)->get();
        return \view('vitrine.welcome',['articles' => $articles]);
    }
    public function showAll(){
        $articles = Article::latest()->get();
        $categories = Categorie::all();
        return \view('vitrine.showAll',['articles' => $articles, 'categories' => $categories]);
    }
    public function showCategorie($id){
        $categorie = Categorie::find($id);
        $articles = Article::latest()->where('categorie_id', '=', "$categorie->id")->paginate(4);
        return \view('vitrine.showCategorie',['articles' => $articles, 'categorie' => $categorie]);
    }
    public function showArticle($id){
        $article = Article::find($id);
        $categorie = Categorie::find( $article->categorie_id );

        return \view('vitrine.showArticle', [ 'article' => $article, 'categorie' => $categorie ]);
    }
}