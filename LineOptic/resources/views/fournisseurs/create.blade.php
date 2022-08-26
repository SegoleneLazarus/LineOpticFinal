@extends('template')
@if (Session::has('access_admin'))
    @section('content')
        <form action="{{ url('fournisseurs') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="nom">Entrez le nom du fournisseur : </label>
            <input type="text" name="nom" id="nom">

            <label for="logo">Importez le logo : </label>
            <input type="file" name="logo" id="logo">
            
            <label for="image1">Une image de présentation (obligatoire) : </label>
            <input type="file" name="image1" id="image1">
            <label for="image2">Une deuxième image : </label>
            <input type="file" name="image2" id="image2">
            <label for="image3">Une troisième image : </label>
            <input type="file" name="image3" id="image3">
            <label for="lien">Le lien vers le site du fournisseur : </label>
            <input type="text" name="lien" id="lien">
            
            <input type="submit" value="Créer le fournisseur !">
        </form>
    @endsection
    @elseif (Session::has('access_prof'))
    @section('content')
        <form action="{{ url('fournisseurs') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="nom">Entrez le nom du fournisseur : </label>
            <input type="text" name="nom" id="nom">

            <label for="logo">Importez le logo : </label>
            <input type="file" name="logo" id="logo">
            
            <label for="image1">Une image de présentation (obligatoire) : </label>
            <input type="file" name="image1" id="image1">
            <label for="image2">Une deuxième image : </label>
            <input type="file" name="image2" id="image2">
            <label for="image3">Une troisième image : </label>
            <input type="file" name="image3" id="image3">
            <label for="lien">Le lien vers le site du fournisseur : </label>
            <input type="text" name="lien" id="lien">
            
            <input type="submit" value="Créer le fournisseur !">
        </form>
    @endsection
    @else
    @section('content')
    <h1>Vous n'avez pas accès à cette page.</h1>
    @endsection
@endif