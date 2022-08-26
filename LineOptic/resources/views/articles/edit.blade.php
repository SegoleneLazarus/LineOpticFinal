@extends('template')

@if (Session::has('access_admin'))
    @section('content')
        
        <form action="{{ url('articles/'.$article->id) }}" method="POST"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="titre">Modifiez le titre de l'article : </label>
            <input type="text" name="titre" id="titre" value="{{ $articles -> titre }}">
            <label for="chapo">Modifiez le chapô de l'article : </label>
            <input type="text" name="chapo" id="chapo" value="{{ $articles -> chapo }}">
            <label for="mots_cles">Modifiez les mots-clefs : </label>
            <input type="text" name="mots_cles" id="mots_cles" value="{{ $articles -> mots_cles }}">
            <label for="image">Modifiez l'image d'illustration : </label>
            <input type="file" name="image" id="image" value="{{ $articles -> image }}">
            
            <label for="contenu">Modifiez l'article ici : </label>
            <textarea rows="25" cols="150" wrap="physique" name="contenu" id="contenu"  value="{{ $articles -> contenu }}"></textarea>
            <!-- <input type="text" name="body" id="body"> -->
            <input type="submit" value="Créer !">
        </form>
    @endsection
@else
    @section('content')
    <h1>Vous n'avez pas accès à cette page.</h1>
    @endsection
@endif

@if (Session::has('access_prof'))
    @section('content')
        
        <form action="{{ url('articles/'.$article->id) }}" method="POST"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="titre">Modifiez le titre de l'article : </label>
            <input type="text" name="titre" id="titre" value="{{ $articles -> titre }}">
            <label for="chapo">Modifiez le chapô de l'article : </label>
            <input type="text" name="chapo" id="chapo" value="{{ $articles -> chapo }}">
            <label for="mots_cles">Modifiez les mots-clefs : </label>
            <input type="text" name="mots_cles" id="mots_cles" value="{{ $articles -> mots_cles }}">
            <label for="image">Modifiez l'image d'illustration : </label>
            <input type="file" name="image" id="image" value="{{ $articles -> image }}">
            
            <label for="contenu">Modifiez l'article ici : </label>
            <textarea rows="25" cols="150" wrap="physique" name="contenu" id="contenu"  value="{{ $articles -> contenu }}"></textarea>
            <!-- <input type="text" name="body" id="body"> -->
            <input type="submit" value="Créer !">
        </form>
    @endsection
@elseif ($errors->any())
        <div>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif