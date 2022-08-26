@extends('template')

@if (Session::has('access_admin'))

    @section('content')
            
            <form action="{{ url('contacts') }}" method="POST">
                @csrf
                <label for="contacts">Entrez un moyen de contact : </label>
                <input type="text" name="contacts" id="contacts">
                <input type="submit" value="Créer !">
            </form>

    @endsection


@elseif (Session::has('access_prof'))

    @section('content')
            
            <form action="{{ url('contacts') }}" method="POST">
                @csrf
                <label for="contacts">Entrez un moyen de contact : </label>
                <input type="text" name="contacts" id="contacts">
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