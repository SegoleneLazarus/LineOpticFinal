@extends('template')

@section('content')

                     

<div id="titre_article">
    
                <h1>{{ $article -> titre }}</h1>
            </div>
            
            <section class="contenu">
                <article>
                <h2>{{ $article -> chapo }}</h2>
                <p class="mots_cles"><b>Mots clés : </b>{{ $article -> mots_cles }}</p>
                <p class="para para1">{{ $article -> contenu }}
            </p>
                </article>

                <div>
                <img src="{{ asset('storage/articles/'.$article -> img) }}" alt="">
                </div>

                @if (Session::has('access_admin'))
                        <div class="modifsupr">
                            <a href="{{ route('articles.edit', $article->id) }}">Modifier l'article</a>
                            <form class="suppr" method="post" action="{{route('articles.destroy',$article->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer l'article</button>
                            </form>
                        </div>    
                            
                        @endif

                        @if (Session::has('access_prof'))
                        <div class="modifsupr">
                            <a href="{{ route('articles.edit', $article->id) }}">Modifier l'article</a>
                            <form class="suppr" method="post" action="{{route('articles.destroy',$article->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer l'article</button>
                            </form>
                        </div>    
                            
                        @endif   

                        <a href="{{ url('conseils') }}">Revenir à la page conseil</a>

            </section>

            <section class="autres_articles">
                <h2>Ces articles pourraient vous plaire...</h2>
                <div class="autres_articles_container">
                    @foreach($autrearticles as $autrearticle)
                    <a href="{{ url('conseils/'.$autrearticle->slug) }}"><div>
                        <h3>{{$autrearticle->titre}}</h3>
                    </div></a>
                    @endforeach
                </div>
            </section>
@endsection