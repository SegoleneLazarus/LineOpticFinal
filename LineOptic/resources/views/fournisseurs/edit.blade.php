@extends('template')
@if (Session::has('access_admin'))
    @section('content')
        
        <form action="{{ url('fournisseurs/'.$fournisseur->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="nom">Changez le nom du fournisseur : </label>
            <input type="text" name="nom" id="nom" value="{{$fournisseur->nom}}">

            <label for="logo">Changez le logo : </label>
            <input type="file" name="logo" id="logo" value="{{$fournisseur->logo}}">
            
            <label for="image1">Changez l'image 1 : </label>
            <input type="file" name="image1" id="image1" value="{{$fournisseur->image1}}">
            <label for="image2">Changez l'image 2 : </label>
            <input type="file" name="image2" id="image2" value="{{$fournisseur->image2}}">
            <label for="image3">Changez l'image 3 : </label>
            <input type="file" name="image3" id="image3" value="{{$fournisseur->image3}}">
            <label for="lien">Changez le lien du fournisseur : </label>
            <input type="text" name="lien" id="lien" value="{{$fournisseur->lien}}">
            
            <input type="submit" value="Editez !">
        </form>
    @endsection
    @elseif (Session::has('access_prof'))
    @section('content')
        
        <form action="{{ url('fournisseurs/'.$fournisseur->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="nom">Changez le nom du fournisseur : </label>
            <input type="text" name="nom" id="nom" value="{{$fournisseur->nom}}">

            <label for="logo">Changez le logo : </label>
            <input type="file" name="logo" id="logo" value="{{$fournisseur->logo}}">
            
            <label for="image1">Changez l'image 1 : </label>
            <input type="file" name="image1" id="image1" value="{{$fournisseur->image1}}">
            <label for="image2">Changez l'image 2 : </label>
            <input type="file" name="image2" id="image2" value="{{$fournisseur->image2}}">
            <label for="image3">Changez l'image 3 : </label>
            <input type="file" name="image3" id="image3" value="{{$fournisseur->image3}}">
            <label for="lien">Changez le lien du fournisseur : </label>
            <input type="text" name="lien" id="lien" value="{{$fournisseur->lien}}">
            
            <input type="submit" value="Editez !">
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