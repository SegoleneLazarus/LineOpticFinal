@extends('template')

@if (Session::has('access_admin'))

    @section('content')
            
            <form action="{{ url('adresses/'.$adresses->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="adresse">Modifiez l'adresse d'une boutique : </label>
                <input type="text" name="adresse" id="adresse" value="{{ $adresses->adresse}}">
                <input type="submit" value="Créer !">
            </form>

    @endsection


@elseif (Session::has('access_prof'))

    @section('content')
            
            <form action="{{ url('adresses/'.$adresses->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="adresse">Modifiez l'adresse d'une boutique : </label>
                <input type="text" name="adresse" id="adresse" value="{{ $adresses->adresse}}">
                <input type="submit" value="Créer !">
            </form>

    @endsection


@else
    @section('content')

        <h1>Vous n'avez pas accès à cette page.</h1>

    @endsection
@endif


        @if ($errors->any())
            <div>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
                        



    