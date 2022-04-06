@extends('layouts.backend')

@section('titre')
    Gestion des Utilisateurs
@endsection

@section('content')
    <div class="container bg-light my-5 rounded">
        <div class="row">
            <div class="col-md-12">

            <!-- Button -->
            <div class="d-grid gap-2 d-flex justify-content-end my-3">
                <div class="pull-left">
                    <a href="{{ url('gestion') }}" class="btn btn-success">Page Principale</a>
                </div>
            </div>
                
                <table class="table">
                    <head>
                        <tr>
                            <th scope="col">Nom d'utilisateur</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </head>
                    <body>
                        @foreach( $users as $user )
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode( ', ', $user->roles()->get()->pluck('name')->toArray() ) }}</td>
                            <td>
                                
                                <form action="{{ url('users/'.$user->id) }}" method="POST">
                                    
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">Modifier</a>
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
        <span class="">{{ $users->links() }}</span>
    </div>

     
@endsection