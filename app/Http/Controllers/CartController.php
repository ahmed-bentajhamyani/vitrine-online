<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return \view('partials.panier');
    }
    public function store(Request $request)
    {
        Cart::add($request['id'], $request['nomArticle'], 1, $request['prixUnitaire'])
            ->associate('App\Models\Article');

        return \redirect('/show/'.$request['id']);
    }
    public function destroy( $rowId )
    {
        Cart::remove( $rowId );
        return \back();
    }
}
