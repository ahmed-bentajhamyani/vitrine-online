@extends('layouts.backend')

@section('titre')
    Modification d'un Categorie
@endsection

@section('content')

<div class="container bg-light my-5 rounded">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('categories/'.$categorie->id) }}" method="POST" class="needs-validation" novalidate>

                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group my-3 has-validation">
                        <label for="">Nom du categorie</label>
                        <input type="text" name="nomCategorie" value="{{ $categorie->nomCategorie }}" class="form-control" required>
                        <div class="invalid-feedback">
                            Le champ nom du categorie est obligatiore!
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