@extends('template')


    @section('content')

    @if (Session::has('access_admin'))
            <a class="ajout" href="{{route('fournisseurs.create')}}">Créer un fournisseur</a>
        @endif   
        @if (Session::has('access_prof'))
            <a class="ajout" href="{{route('fournisseurs.create')}}">Créer un fournisseur</a>
        @endif  

    
    <div class="listeFournisseurs ronds">
    @foreach ($fournisseurs as $fournisseur)
      <div class="{{ $fournisseur -> id }}"><img name="{{ $fournisseur -> nom }}" class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> logo) }}"></div>
      @endforeach
    </div>
    


    @foreach ($fournisseurs as $fournisseur)
    <div class="photos active1" id="{{ $fournisseur -> id }}">
      <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> image1) }}"></div>
      <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> image2) }}"></div>
      <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> image3) }}"></div>
      <a href="{{ $fournisseur -> lien }}"  target="_blank"><button class="fournilien">Voir plus</button></a>
      
    </div>
    
    
    @endforeach

                         
        
    </div>
    
    

    @endsection