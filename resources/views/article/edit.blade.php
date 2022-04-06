@extends('layouts.backend')

@section('titre')
    Modification d'un article
@endsection

@section('content')

    <div class="container bg-light my-3 rounded">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('articles/'.$article->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>


                    <input type="hidden" name="_method" value="PUT">    
                    {{ csrf_field() }}

                    <div class="form-group my-3">
                        <label for="">Nom d'article</label>
                        <input type="text" name="nomArticle" value="{{ $article->nomArticle }}" class="form-control" required>
                        <div class="invalid-feedback">
                            Le champ nom d'article est obligatiore!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" required>{{ $article->description }}</textarea>
                        <div class="invalid-feedback">
                            Le champ description est obligatiore!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="">Prix d'article</label>
                        <input type="number" name="prixUnitaire" value="{{ $article->prixUnitaire }}" class="form-control" required>
                        <div class="invalid-feedback">
                            Le champ prix d'article est obligatiore!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="">Image d'article</label>
                        <input type="file" name="imageArticle" value="{{ $article->imageArticle }}" class="form-control" required>
                        <div class="invalid-feedback">
                            Le champ image d'article est obligatiore!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <label for="">Quantite en stock</label>
                        <input type="number" name="quantite" value="{{ $article->quantite }}" class="form-control" required>
                        <div class="invalid-feedback">
                            Le champ quantite en stock est obligatiore!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Categorie d'article</label>
                        <div class="input-group mb-3">
                            <select class="form-select" name="categorie_id" aria-label="Example select with button addon">
                                <option value="{{ $cat->id }}" selected>{{ $cat->nomCategorie }}</option>

                                @foreach( $categories as $categorie)
                                  <option value="{{ $categorie->id }}">{{ $categorie->nomCategorie }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="invalid-feedback">
                            Le champ categorie d'article est obligatiore!
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>

@endsection