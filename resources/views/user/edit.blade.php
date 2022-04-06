@extends('layouts.backend')

@section('titre')
    Modification d'utilisateur
@endsection

@section('content')

    <div class="container bg-light my-4 rounded">
        <div class="row">
            <div class="col-md-6">
                
                <div class="mt-4 mb-3">
                    <h5>Role de l'utilisateur</h5>
                    <form action="{{ url('users/'.$user->id) }}" method="POST">

                        <input type="hidden" name="_method" value="PUT">    
                        {{ csrf_field() }}

                        @foreach ( $roles as $role )
                            <div class="form-group form-check my-1">
                                <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}" <?php foreach( $user->roles as $userRole ): if( $userRole->id == $role->id): ?> checked<?php endif; endforeach;?> >
                                <label for="{{$role->id}}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-danger my-3">Modifier le role</button>

                    </form>
                </div>
                
                
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