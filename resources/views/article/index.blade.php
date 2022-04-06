@extends('layouts.backend')

@section('titre')
    Gestion des Articles
@endsection

@section('content')
    <div class="container bg-light my-5 rounded">
        <div class="row">
            <div class="col-md-12">

            <!-- Button -->
            <div class="d-grid gap-2 d-flex justify-content-end my-3">
                <div class="pull-right">
                    <a href="{{ url('articles/create') }}" class="btn btn-success">Nouveau Article</a>
                </div>
                <div class="pull-left">
                    <a href="{{ url('gestion') }}" class="btn btn-success">Page Principale</a>
                </div>
            </div>
                

                <table class="table">
                    <head>
                        <tr>
                            <th scope="col">Nom d'article</th>
                            <th scope="col">Prix d'article</th>
                            <th scope="col">Quantite en stock</th>
                            <th scope="col">La date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                    </head>
                    <body>
                        @foreach( $articles as $article )
                        <tr>
                            <td>{{ $article->nomArticle }}</td>
                            <td>{{ $article->prixUnitaire }} DH</td>
                            <td>{{ $article->quantite }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                
                                <form action="{{ url('articles/'.$article->id) }}" method="POST">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <a href="{{ url('articles/'.$article->id.'/article') }}" class="btn btn-secondary">Details</a>
                                    <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-primary">Modifier</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>

                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </body>
                </table>
            </div>

        </div>
    </div>
    
    <div class="d-flex justify-content-center my-2">
        <span class="">{{ $articles->links() }}</span>
    </div>

     
@endsection