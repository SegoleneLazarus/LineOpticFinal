@extends('template')

@if (Session::has('access_admin'))
    @section('content')
        
        <form action="{{ url('equipes/'.$equipe->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="prénom">Entrez le prénom du membre de l'équipe : </label>
            <input type="text" name="prénom" id="prénom" value="{{ $equipe->prénom}}">
            <label for="nom">Entrez le nom du membre de l'équipe : </label>
            <input type="text" name="nom" id="nom" value="{{ $equipe->nom}}">
            <label for="fonction">Entrez le rôle du membre de l'équipe : </label>
            <input type="text" name="fonction" id="fonction" value="{{ $equipe->fonction}}">
            <label for="txt">Entrez une présentation du membre de l'équipe : </label>
            <textarea rows="5" cols="20" wrap="physique" name="txt" id="txt" value="{{ $equipe->txt}}"></textarea>
            <label for="img1">Importez une image sérieuse du membre 1 : </label>
            <input type="file" name="img1" id="img1" value="{{ $equipe->img1}}">
            <label for="img2">Importez une image rigolote du membre : </label>
            <input type="file" name="img2" id="img2" value="{{ $equipe->img2}}">
            <input type="submit" value="Créer !">
        </form>
    @endsection
    @elseif (Session::has('access_prof'))
    @section('content')
        
        <form action="{{ url('equipes/'.$equipe->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="prénom">Entrez le prénom du membre de l'équipe : </label>
            <input type="text" name="prénom" id="prénom" value="{{ $equipe->prénom}}">
            <label for="nom">Entrez le nom du membre de l'équipe : </label>
            <input type="text" name="nom" id="nom" value="{{ $equipe->nom}}">
            <label for="fonction">Entrez le rôle du membre de l'équipe : </label>
            <input type="text" name="fonction" id="fonction" value="{{ $equipe->fonction}}">
            <label for="txt">Entrez une présentation du membre de l'équipe : </label>
            <textarea rows="5" cols="20" wrap="physique" name="txt" id="txt" value="{{ $equipe->txt}}"></textarea>
            <label for="img1">Importez une image sérieuse du membre 1 : </label>
            <input type="file" name="img1" id="img1" value="{{ $equipe->img1}}">
            <label for="img2">Importez une image rigolote du membre : </label>
            <input type="file" name="img2" id="img2" value="{{ $equipe->img2}}">
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