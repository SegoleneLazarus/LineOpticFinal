@extends('template')


    @section('content')
            
            <section class="presentation">
                
                <!-- <h1>Conseils</h1> -->
                <article>
                    <h2>LineOptic, c'est...</h2>
                    <p>… une expertise en commerce de détails optiques depuis 2017. Notre équipe accueillante vous conseillera dans le choix de la monture. L’échange représente un moyen pour nous de comprendre le style que vous souhaitez adopter. Nous pouvons personnaliser votre monture avec nos machines. De plus, nous avons un équipement servant à faire un bilan visuel.
                    </p>
                </article>
            
            </section>
            
            <section class="services">
                
                <h1>Nos services</h1>
                
                <article class="domicile">
                    <div class="iconeservi"><img class="img-fluid" src="/img/maison.png"></div>
                    <h2>A domicile</h2>
                    <p>Pour améliorer l’accessibilité, nous nous déplaçons chez nos clients pour leur offrir un service à domicile digne d’un service en magasin. Pour nous, il est important que chacun puisse accéder à cette branche de la santé qu’est la vue.</p>
                </article>
                
                
                <article class="audition">
                    <div class="audiv">
                        <div class="iconeservi oreille"><img class="img-fluid" src="/img/camion.png"></div>
                        <h2>Audition</h2>
                        <p>Audilab occupe nos locaux. Vous pouvez alors faire une pierre deux coups et profiter de tous nos services. En venant chez LineOptic, tous vos sens seront à vif.</p>
                    </div>
                </article>
            </section>
            
            <section class="equipe">
                
                <h1>L'équipe</h1>
                @if (Session::has('access_admin'))
                    <a class="ajout" href="{{route('equipes.index')}}">Créer un membre</a>
                @endif
                @if (Session::has('access_prof'))
                    <a class="ajout" href="{{route('equipes.index')}}">Créer un membre</a>
                @endif
                <div class="equipe_bg">
                    <div class="employes">

                    <div class="precedent"><img class="img-fluid" src="img/chevron_ouvrant.png"></div>
                    
                    @foreach($equipes as $equipe)
                        <article id="{{ $equipe -> id }}" class="article_slider active">
                            <div><img class="img-fluid img-pres" src="{{ asset('storage/equipes/'.$equipe -> img1) }}"></div>
                            <h2>{{ $equipe -> prénom}} {{ $equipe -> nom}}</h2>
                            <h3>{{ $equipe -> fonction}}</h3>
                            <p>{{ $equipe -> txt}}</p>
                            
                        </article>

                    @endforeach

                    

                    <div class="suivant"><img class="img-fluid" src="img/chevron_fermant.png"></div>
                </div>

                </div>
                
                
            
            </section>
            
            <section class="groupe">
                
                <div><img class="img-fluid"></div>
            
            </section>
            
            
            
            
        @endsection