@extends('template')

@section('content')

<div id="titre_conseils">
                <h1>Conseils d'experts</h1>
            </div>

            {{--<section class="categories">
                <h1>Catégories</h1>
                <div class="categories_container">
                    @foreach($categories as $categorie)
                        @if($categorie->nom == "naruto")
                    <div style="background-image: url(img/img1.jpg);">
                        <h3>{{ $categorie -> nom }}</h3>
                        @endif
                        @if($categorie->nom == "Choupette")
                    <div style="background-image: url(img/img2.jpg);">
                        <h3>{{ $categorie -> nom }}</h3>
                        @endif
                        @if($categorie->nom == "Chameau")
                    <div style="background-image: url(img/img3.jpg);">
                        <h3>{{ $categorie -> nom }}</h3>
                        @endif
                        
                    </div>
                    @endforeach
                </div>
            </section>--}}

            @if(Session::has('access_admin'))
                <a class="ajout" href="{{ route('articles.create')}}">Créer un nouvel article</a>
            @endif

            @if(Session::has('access_prof'))
            <a class="ajout" href="{{ route('articles.create')}}">Créer un nouvel article</a>
            @endif

            <section class="dernieres_publications">
                <h1>Dernières publications</h1>
                <div class="dernieres_publications_container">
                    @foreach($articles as $article)
                    <a href="{{ url('conseils/'.$article->slug) }}"><div>
                        <h3>{{ $article -> titre }}</h3>
                        <!-- <img src="{{ asset('storage/articles/'.$article -> image) }}"> -->
                        
                    </div></a>
                    @endforeach
                </div>
            </section>
            <!-- <img src="img/infinite_scrolling.png" alt="infinite_scrolling" class="infinite_scrolling"> -->

@endsection