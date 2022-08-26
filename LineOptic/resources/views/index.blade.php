@extends('template')


    @section('content')

    @if(Session::has('access_admin'))

    <div class="boindex">

    <h2>Tous les fournisseurs</h2>
    <a class="ajout" href="{{route('fournisseurs.create')}}">Créer un fournisseur</a>

        <div>
            @foreach($fournisseurs as $fournisseur)
                <div>
                    <p>{{ $fournisseur -> nom }}</p>
                    <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}">Modifier</a>
                    <form class="suppr" method="post" action="{{route('fournisseurs.destroy',$fournisseur->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                    </form>

                </div>
            @endforeach
        </div>

        <div id="hr"></div>

        <h2>Toute l'équipe</h2> 
        <a class="ajout" href="{{route('equipes.index')}}">Créer un membre</a>  

        <div>

        @foreach($equipes as $equipe)
        <div>
                <p>{{ $equipe -> prénom }} {{ $equipe -> nom }}</p>
                <a href="{{ route('equipes.edit', $equipe->id) }}">Modifier</a>
                <form class="suppr" method="post" action="{{route('equipes.destroy',$equipe->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                </form>

        </div>

        @endforeach

        </div>
    </div>
    @endif

    @if (Session::has('access_prof'))
    <div class="boindex">

    <h2>Tous les fournisseurs</h2>
    <a class="ajout" href="{{route('fournisseurs.create')}}">Créer un fournisseur</a>

        <div>
            @foreach($fournisseurs as $fournisseur)
                <div>
                    <p>{{ $fournisseur -> nom }}</p>
                    <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}">Modifier</a>
                    <form class="suppr" method="post" action="{{route('fournisseurs.destroy',$fournisseur->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                    </form>

                </div>
            @endforeach
        </div>

        <div id="hr"></div>

        <h2>Toute l'équipe</h2> 
        <a class="ajout" href="{{route('equipes.index')}}">Créer un membre</a>  

        <div>

        @foreach($equipes as $equipe)
        <div>
                <p>{{ $equipe -> prénom }} {{ $equipe -> nom }}</p>
                <a href="{{ route('equipes.edit', $equipe->id) }}">Modifier</a>
                <form class="suppr" method="post" action="{{route('equipes.destroy',$equipe->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                </form>

        </div>

        @endforeach

        </div>
    </div>
    
    @endif

        <div id="slider">
            <div>
            <h1>Dernière publication</h1>
                @foreach($articles as $article)
                <h2>{{ $article -> titre }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($article -> contenu, 50) }}</p>
                <a href="{{ url('conseils/'.$article->slug) }}">Lire l'article >></a>
                @endforeach
            </div>
        </div>
            
            <section class="qui">
                
                <h1>Qui sommes-nous ?</h1>
                
                <article id="artQui">
                    
                    
                
                    <div id="textQui">

                        <p>Chez LineOptic, nous avons à coeur de travailler avec des fournisseurs que nous respectons et apprécions. </p>
                        <p>La qualité des verres, lentilles et montures est primordiale pour vous offrir plus qu'une correction de vue.</p>
                        
                        <div class="plus">
                        <a href="{{ url('entreprise') }}"><button>En savoir plus</button></a>
                        </div>

                    </div>

                    <div id="divImgQui"><img id="imgQui" class="img-fluid"></div>
                
                </article>
                
                
            </section>
            
            <section class="nouveautes">
                
                <h1>Nouveautés</h1>
                
                

                @foreach($fournisseurs as $fournisseur)
                    
                    <div class="nouvfourni">
                    <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> image1) }}"></div>
      <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> logo) }}"></div>
      <div><img class="img-fluid" src="{{ asset('storage/fournisseurs/'.$fournisseur -> image3) }}"></div>
                    
                    </div>

                    <div id="hr"></div>
                @endforeach
                
                
                
                <div class="voirfourni">
                    
                <a href="{{ url('fournisseurs') }}"><button>Voir tous les fournisseurs</button></a>
                
                </div>
    



    
            
            
                
            
            </section>
        
        @endsection