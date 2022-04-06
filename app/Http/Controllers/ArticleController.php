<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $articles = Article::latest()->paginate(5);
        return \view('article.index', ['articles' => $articles]);
    }
    public function create(){
        $categories = Categorie::all();
        return \view('article.create', ['categories' => $categories]);
    }
    public function store(Request $request){
        
        // Enregistrement de l'image dans le dossier public/images/articles
        $image_extension = $request['imageArticle']->getClientOriginalExtension();
        $image_nom = time() . "." . $image_extension;
        $path = 'images/articles';
        $request['imageArticle']->move($path, $image_nom);

        $article = new Article();

        $article->nomArticle = $request['nomArticle'];
        $article->description = $request['description'];
        $article->prixUnitaire = $request['prixUnitaire'];
        $article->imageArticle = $image_nom;
        $article->quantite = $request['quantite'];
        $article->categorie_id = $request['categorie_id'];
        $article->user_id = Auth::user()->id;

        $article->save();

        return \redirect('articles');
    }
    public function edit($id){

        $article = Article::find($id);
        $cat = Categorie::find( $article->categorie_id );
        $categories = Categorie::all();
        return \view('article.edit', ['article' => $article , 'categories' => $categories, 'cat' => $cat]);
    }
    public function update($id , Request $request){

        // Enregistrement de l'image dans le dossier public/images/articles
        $image_extension = $request['imageArticle']->getClientOriginalExtension();
        $image_nom = time() . "." . $image_extension;
        $path = 'images/articles';
        $request['imageArticle']->move($path, $image_nom);

        $article = Article::find($id);

        $article->nomArticle = $request['nomArticle'];
        $article->description = $request['description'];
        $article->prixUnitaire = $request['prixUnitaire'];
        $article->imageArticle = $image_nom;
        $article->quantite = $request['quantite'];
        $article->categorie_id = $request['categorie_id'];
        $article->user_id = Auth::user()->id;

        $article->save();

        return \redirect('articles');
    }
    public function destroy($id){

        $article = Article::find($id);

        $article->delete();

        return \redirect('articles');
    }
    public function getOne($id){

        $article = Article::find($id);
        $categorie = Categorie::find( $article->categorie_id );

        return \view('article.article', ['article' => $article, 'categorie' => $categorie]);
    }
    public function search(Request $request){

        $search = $request['search'];
        $articles = Article::where('nomArticle', 'like', "%$search%")->orWhere('description', 'like', "%$search%")->paginate(5);

        return \view('article.index', ['articles' => $articles]);

    }
}
