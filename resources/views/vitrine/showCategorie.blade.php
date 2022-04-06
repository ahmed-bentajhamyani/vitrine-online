@extends('layouts.frontend')

@section('titre')
    Nos Articles
@endsection

@section('content')

    <!-- Style -->
    <style>
        header.banner{
            background: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('../../images/frontend/<?php echo $categorie->nomCategorie ?>.jpg');
            color: white;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Header -->
    <header class="banner">
        <div class="banner">
            <div class="banner-subheading">Affichage du categorie!</div>
            <div class="banner-heading text-uppercase">{{ $categorie->nomCategorie }}</div>
        </div>
    </header>

    <!-- Articles by Categories -->
    <div class="latest-products">
        <div class="container">
            <div class="row">

                @foreach( $articles as $article)
                    <div class="col-md-3 grid">
                        <div class="product-item">
                            <a href="/show/{{ $article->id }}"><img src="{{ asset('images/articles/'.$article->imageArticle) }}" alt=""></a>
                            <div class="down-content">
                                <a href="/show/{{ $article->id }}"><h4>{{ $article->nomArticle }}</h4></a>
                                <h6>{{ $article->prixUnitaire }} DH</h6>
                                <p>{{ $article->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center my-2">
            <span class="page">{{ $articles->links() }}</span>
        </div>
    </div>

@endsection