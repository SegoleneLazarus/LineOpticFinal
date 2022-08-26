@extends('template')

@if (Session::has('access_admin'))
    @section('content')
        <form action="{{ url('articles') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="titre">Entrez le titre de l'article : </label>
            <input type="text" name="titre" id="titre">
            <label for="chapo">Entrez le chapô de l'article : </article> : </label>
            <input type="text" name="chapo" id="chapo">
            <label for="mots_cles">Entrez des mots-clefs : </label>
            <input type="text" name="mots_cles" id="mots_cles">
            <label for="image">Entrez une image pour illustrer l'article : </label>
            <input type="file" name="image" id="image">
            
            <label for="contenu">Ecrivez l'article ici : </label>
            <textarea rows="25" cols="150" wrap="physique" name="contenu" id="contenu"></textarea>
            <!-- <input type="text" name="body" id="body"> -->
            <input type="submit" value="Créer !">
        </form>
    @endsection
@elseif(Session::has('access_prof'))
    @section('content')
        <form action="{{ url('articles') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="titre">Entrez le titre de l'article : </label>
            <input type="text" name="titre" id="titre">
            <label for="chapo">Entrez le chapô de l'article : </article> : </label>
            <input type="text" name="chapo" id="chapo">
            <label for="mots_cles">Entrez des mots-clefs : </label>
            <input type="text" name="mots_cles" id="mots_cles">
            <label for="image">Entrez une image pour illustrer l'article : </label>
            <input type="file" name="image" id="image">
            
            <label for="contenu">Ecrivez l'article ici : </label>
            <textarea rows="25" cols="150" wrap="physique" name="contenu" id="contenu"></textarea>
            <!-- <input type="text" name="body" id="body"> -->
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

{{-- https://fr.acervolima.com/comment-creer-un-editeur-de-texte-en-javascript-et-html/ --}}