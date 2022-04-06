@extends('layouts.frontend')

@section('titre')
    {{ $article->nomArticle }}
@endsection

@section('content')

    <!-- Article -->
    <div class="container">
        <div class="row">
                <div class="article ">
                    <div class="image col-md-5">
                        <img src="{{ asset('images/articles/'.$article->imageArticle) }}" alt="">
                    </div>
                    <div class="content col-md-5">
                        <h4 class="mb-0">{{ $article->nomArticle }}</h4>
                        <p ><a href="/showcategorie/{{$categorie->id}}">{{ $categorie->nomCategorie }}</a></p>
                        <h5>{{ $article->prixUnitaire }} DH</h5>
                        <h5>{{ $article->description}}</h5>
                        <h5>Quantite en stock : {{ $article->quantite }}</h5>
                        <h5>La date de création : {{ $article->created_at }}</h5>

                        <form action="{{ url('ajouteraupanier') }}" method="POST">

                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $article->id }}">
                            <input type="hidden" name="nomArticle" value="{{ $article->nomArticle }}">
                            <input type="hidden" name="prixUnitaire" value="{{ $article->prixUnitaire }}">
                            <input type="hidden" name="imageArticle" value="{{ $article->imageArticle }}">

                            <button type="submit" class="btn rounded">Ajouter au panier</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection