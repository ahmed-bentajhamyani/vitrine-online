@extends('layouts.frontend')

@section('titre')
    Accueil
@endsection

@section('content')

    <!-- Style -->
    <style>
        header.banner{
            background: linear-gradient(rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.4)), url('../../images/frontend/photo2.jpg');
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
            <div class="banner-subheading">Welcome To Our Online Shopping WebSite!</div>
            <div class="banner-heading text-uppercase">It's Nice To Have You</div>
            <a class="btn btn-xl text-uppercase button" href="/showall">Tous les produits</a>
        </div>
    </header>

    <!-- Dernier Articles -->
    <section id="latest">
    <div class="latest-products" >
      <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                <h2>Derniers Articles</h2>
                <a href="/showall">voir tous les articles <i class="fa fa-angle-right"></i></a>
                </div>
            </div>

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
    </div>
    </section>

@endsection