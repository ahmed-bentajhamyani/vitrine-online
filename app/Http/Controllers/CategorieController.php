<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategorieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        
        $categories = Categorie::paginate(5);
        return \view('categorie.index', ['categories' => $categories]);
    }
    public function create(){
        
        return \view('categorie.create');
    }
    public function store(Request $request){
        
        $categorie = new Categorie();

        $categorie->nomCategorie = $request['nomCategorie'];
        $categorie->user_id = Auth::user()->id;

        $categorie->save();

        return \redirect('categories');
    }
    public function edit($id){
        
        $categorie = Categorie::find($id);
        return \view('categorie.edit', ['categorie' => $categorie]);
    }
    public function update($id , Request $request){
        
        $categorie = Categorie::find($id);

        $categorie->nomCategorie = $request['nomCategorie'];
        $categorie->user_id = Auth::user()->id;

        $categorie->save();

        return \redirect('categories');
    }
    public function destroy($id){
        
        $categorie = Categorie::find($id);

        $categorie->delete();

        return \redirect('categories');
    }
    public function search(Request $request){
        
        $search = $request['search'];
        $categories = Categorie::where('nomCategorie', 'like', "%$search%")->paginate(5);

        return \view('categorie.index', ['categories' => $categories]);

    }
}
