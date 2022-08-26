@extends('template')

@if (Session::has('access_admin'))

    @section('content')
            
            <form action="{{ url('contacts/'.$contacts->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="contacts">Entrez un moyen de contact : </label>
                <input type="text" name="contacts" id="contacts" value="{{ $contacts->contacts}}">
                <input type="submit" value="Modifier !">
            </form>

    @endsection


@elseif (Session::has('access_prof'))

    @section('content')
            
            <form action="{{ url('contacts/'.$contacts->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="contacts">Entrez un moyen de contact : </label>
                <input type="text" name="contacts" id="contacts" value="{{ $contacts->contacts}}">
                <input type="submit" value="Modifier !">
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
                        



    