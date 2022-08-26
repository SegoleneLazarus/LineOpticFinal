@extends('template')

@if (Session::has('access_admin'))

    @section('content')
            
            <form action="{{ url('adresses') }}" method="POST">
                @csrf
                <label for="adresse">Entrez l'adresse d'une boutique : </label>
                <input type="text" name="adresse" id="adresse">
                <input type="submit" value="Créer !">
            </form>

    @endsection


@elseif (Session::has('access_prof'))

    @section('content')
            
            <form action="{{ url('adresses') }}" method="POST">
                @csrf
                <label for="adresse">Entrez adresse : </label>
                <input type="text" name="adresse" id="adresse">
                <input type="submit" value="Créer !">
            </form>

    @endsection


@else
    @section('content')

        <h1>Vous n'avez pas accès à cette page.</h1>

    @endsection
@endif

@if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif