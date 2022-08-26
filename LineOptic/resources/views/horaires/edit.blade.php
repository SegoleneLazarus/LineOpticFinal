@extends('template')
@if (Session::has('access_admin'))
    @section('content')
        
        <form action="{{ url('horaires/'.$horaire->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label for="jour">Le jour (ne pas modifier !) : </label>
            <input type="text" name="jour" id="jour" value="{{ $horaire->jour}}">
            <label for="heureDébut">Entrez l'heure d'ouverture : </label>
            <input type="text" name="heureDébut" id="heureDébut" value="{{ $horaire->heureDébut}}">
            <label for="heureFin">Entrez l'heure de fermeture : </label>
            <input type="text" name="heureFin" id="heureFin" value="{{ $horaire->heureFin}}">
            <input type="submit" value="Editez !">
        </form>
    @endsection
    @elseif (Session::has('access_prof'))
    @section('content')
        
        <form action="{{ url('horaires/'.$horaire->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label for="heureDébut">Entrez l'heure d'ouverture : </label>
            <input type="text" name="heureDébut" id="heureDébut" value="{{ $horaire->heureDébut}}">
            <label for="heureFin">Entrez l'heure de fermeture : </label>
            <input type="text" name="heureFin" id="heureFin" value="{{ $horaire->heureFin}}">
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