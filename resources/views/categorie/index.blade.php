@extends('layouts.backend')

@section('titre')
    Gestion des Categories
@endsection

@section('content')
    <div class="container mt-5 bg-light">
        <div class="row">
            <div class="col-md-12 ">

                <div class="d-grid gap-2 d-flex justify-content-end my-3">
                    <div class="pull-right">
                        <a href="{{ url('categories/create') }}" class="btn btn-success">Nouvelle Categorie</a>
                    </div>
                    <div class="pull-left">
                        <a href="{{ url('gestion') }}" class="btn btn-success">Page Principale</a>
                    </div>
                </div>

                <table class="table">
                    <head>
                        <tr>
                            <th scope="col">Nom de categorie</th>
                            <th scope="col">La date de création</th>
                            <th scope="col">Action</th>
                        </tr>
                    </head>
                    <body>
                        @foreach( $categories as $categorie)
                        <tr>
                            <td>{{ $categorie->nomCategorie }}</td>
                            <td>{{ $categorie->created_at }}</td>
                            <td>
                                
                                <form action="{{ url('categories/'.$categorie->id) }}" method="POST">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <a href="{{ url('categories/'.$categorie->id.'/edit') }}" class="btn btn-primary">Modifier</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>

                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </body>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-2">
            <span class="">{{ $categories->links() }}</span>
        </div>
        
    </div>

@endsection