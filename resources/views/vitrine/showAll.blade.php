@extends('layouts.frontend')

@section('titre')
    Nos Categories
@endsection

@section('content')

    <!-- Header -->
    <header class="banner showall">
        <div class="banner">
            <div class="banner-subheading">Affichage par categories!</div>
            <div class="banner-heading text-uppercase">Electronique, Sport, Cuisine ...</div>
        </div>
    </header>

    <!-- Articles by Categories -->
    @foreach( $categories as $categorie )
        <div class="latest-products">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-heading">
                    <h2>{{ $categorie->nomCategorie }}</h2>
                    <a href="/showcategorie/{{ $categorie->id }}">voir tous les articles <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach( $articles as $article)
                    @if( $article->categorie_id == $categorie->id )
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
                    @endif
                @endforeach
                

            </div>
        </div>
        </div>
    @endforeach


@endsection