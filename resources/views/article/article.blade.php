@extends('layouts.backend')

@section('titre')
    {{ $article->nomArticle }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="my-3">
                    <a href="{{ url('articles/create') }}" class="btn btn-success">Nouveau Article</a>
                </div>

                <div class="d-flex bg-light rounded">

                    <div class="mx-5 my-3 col-md-5 px-3 py-3">
                        <img class="img-fluid rounded" src="{{ asset('images/articles/' . $article->imageArticle) }}" alt="$article->nomArticle.jpg">
                    </div>

                    <div class="mx-3 my-auto">
                        <h3> {{ $article->nomArticle }} </h3>
                        <p> {{ $categorie->nomCategorie }} </p>
                        <h5> {{ $article->description }} </h5>
                        <h5>Prix : {{ $article->prixUnitaire }} DH</h5>
                        <h5>Quantite en stock : {{ $article->quantite }}</h5>
                        <h5>La date de création : {{ $article->created_at }}</h5>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center my-5">
                    <form action="{{ url('articles/'.$article->id) }}" method="POST">
                        
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <a href="{{ url('articles/') }}" class="btn btn-secondary">Retour</a>
                        <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-primary">Modifier</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </div>
                
            </div>
        </div>
    </div>

@endsection