@extends('layouts.frontend')

@section('titre')
    Accueil
@endsection

@section('content')

    <!-- Articles de panier -->
    <div class="latest-products cart">
        <div class="container">
            <div class="product-item row">
                @if( Cart::count() > 0 )

                    <h3 class="my-3">Mon panier ({{ Cart::count() }})</h3>
                    <hr>

                    @foreach( Cart::content() as $article )
                        <div class="col-md-12 grid mt-3">
                            <div class="panier">
                                <a href="/show/{{ $article->model->id }}" class="col-md-2"><img src="{{ asset('images/articles/'.$article->model->imageArticle) }}" alt=""></a>
                                <div class="cart-content">
                                    <a href="/show/{{ $article->model->id }}"><h4>{{ $article->model->nomArticle }}</h4></a>
                                    <h6>{{ $article->model->prixUnitaire }} DH</h6>
                                    <p>{{ $article->model->description}}</p>
                                    <form action=" {{ url('/panier/'.$article->rowId) }}" method="POST">
                                       
                                        {{ csrf_field() }}
                                        @method('DELETE')

                                        <button type="submit" class="btn button">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-0">
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 grid mt-3 product-item">
                        <div class="panier-vide">
                            <img src="{{ asset('images/frontend/panier.jpg') }}" alt="">
                            <h4>Votre panier est vide!</h4>
                            <h6>Parcourez nos catégories et découvrez nos meilleures offres!</h6>
                            <a href="/" class="btn button mt-3">Ajouter des articles</a>
                        </div>
                    </div>
                @endif    
            </div>
        </div>
    </div>
    

    

@endsection