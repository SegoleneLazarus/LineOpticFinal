@extends('template')


    @section('content')



<section class="infosgenerales">
                
                <article class="horaires">
                    <h2>Horaires</h2>


                    <table>
                    @foreach( $horaires as $horaire )
                    <tr>
                        <td>{{ $horaire->jour }}</td>
                        <td>{{$horaire->heureDébut}} - {{$horaire->heureFin}} 
                        
                        @if (Session::has('access_admin'))
                        <a href="{{ route('horaires.edit', $horaire->id) }}">Modifier</a>
                        @endif
                        @if (Session::has('access_prof'))
                        <a href="{{ route('horaires.edit', $horaire->id) }}">Modifier</a>
                        @endif

                    </td>
                    </tr>
                    @endforeach
                    </table>
                </article> 
                
                <article class="infotxt">
                    <div class="contact">
                        <h2>Contact</h2>
                        {{-- si contact= telephone // si contact== email--}}
                        @foreach( $contacts as $contact )
                        <p>{{$contact->contacts}}</p>
                        @if (Session::has('access_admin'))
                        <div class="modifsupr">
                            <a href="{{ route('contacts.edit', $contact->id) }}">Modifier</a>
                            <form class="suppr" method="post" action="{{route('contacts.destroy',$contact->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>    
                            
                        @endif
                        @if (Session::has('access_prof'))
                        <div class="modifsupr">
                            <a href="{{ route('contacts.edit', $contact->id) }}">Modifier</a>
                            <form class="suppr" method="post" action="{{route('contacts.destroy',$contact->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>    
                            
                        @endif
                        
                        @endforeach

                        @if (Session::has('access_admin'))
                        <a class="ajout" href="{{route('contacts.create')}}">Créer un moyen de contact</a>

                        @endif
                        @if (Session::has('access_prof'))
                        <a class="ajout" href="{{route('contacts.create')}}">Créer un moyen de contact</a>

                        @endif
                    </div>
                    <div class="adresse">
                        <h2>Adresse</h2>
                        @foreach( $adresses as $adresse )
                        <p>{{$adresse->adresse}}</p>
                        @if (Session::has('access_admin'))
                        <div class="modifsupr">
                            <a href="{{ route('adresses.edit', $adresse->id) }}">Modifier</a>
                            <form class="suppr" method="post" action="{{route('adresses.destroy',$adresse->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>    
                            
                        @endif
                        @if (Session::has('access_prof'))
                        <div class="modifsupr">
                            <a href="{{ route('adresses.edit', $adresse->id) }}">Modifier</a>
                            <form class="suppr" method="post" action="{{route('adresses.destroy',$adresse->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="supprimer btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>    
                            
                        @endif
                        
                        @endforeach

                        @if (Session::has('access_admin'))
                        <a class="ajout" href="{{route('adresses.create')}}">Créer une adresse</a>
                        @endif
                        @if (Session::has('access_prof'))
                        <a class="ajout" href="{{route('adresses.create')}}">Créer une adresse</a>
                        @endif
                        
                    </div>
                </article>
            
            </section>
            
            <section class="plan">
            <h1>Plan</h1>

            <article>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2671.890386539931!2d1.8884782154984059!3d47.95784367920953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e4fafb097e3101%3A0xff82a6c0fc780e6b!2sLINEOPTIC!5e0!3m2!1sfr!2sfr!4v1648040221973!5m2!1sfr!2sfr"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2665.4680204970964!2d1.8629763155031043!3d48.081910479219054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e459c3177e0101%3A0xfd32f6c6ad596997!2sLineoptic!5e0!3m2!1sfr!2sfr!4v1648040276901!5m2!1sfr!2sfr"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </article>

        </section>

    </main>

@endsection