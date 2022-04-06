@extends('layouts.backend')

@section('titre')
    Gestion de l'application
@endsection

@section('content')

<div class="container mt-5 bg-light co">
    <h2 class="text-uppercase">Gestion de l'application</h2>
    <div class="affiche">
        <div class="d">
            <img src=" {{ asset('images/frontend/categorie.jpg')}}" alt="categorie.jpg" class="my-4">
            <a class="btn text-uppercase my-3 abutton btn-dark" href="categories">Gestion <br> des categories</a>

        </div>

        <div class="d">
            <img src="{{ asset('images/frontend/article.jpg')}}" alt="article.jpg" class="my-4">
            <a class="btn text-uppercase my-3 abutton btn-dark" href="articles">Gestion <br> des articles</a>
        </div>

        <div class="d">
            <img src="{{ asset('images/frontend/utilisateur.jpg')}}" alt="article.jpg" class="my-4">
            <a class="btn text-uppercase my-3 abutton btn-dark" href="users">Gestion <br> des utilisateurs</a>
        </div>
        
    </div>
</div>
    
@endsection