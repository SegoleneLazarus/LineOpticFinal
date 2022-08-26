@extends('template')

    @section('content')

    <h1>Connexion</h1>

    <form class="login" method="POST" action="{{ url('test-hash') }}">
    @csrf
    <label for="admin">Identifiant</label>
    <input name="pseudo">

    <label for="mdp">Mot de passe</label>
    <input name="password" type="password">
    <button type="submit">Se connecter</button>

    </form>

    @endsection