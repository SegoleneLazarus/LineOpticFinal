<!DOCTYPE html>

<html lang="fr">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Opticien près de chez vous, LineOptic répondra à tous vos besoins dans les meilleures conditions. LineOptic vous propose de nombreux modèles originaux de lunettes grâce à ses fournisseurs aussi divers que variés.">
        <meta name="keywords" content="lunettes, lentilles de contact, audilab, vue, opticien, optométriste, lunettes de vue, lunettes de soleil, lumière bleue, verres polarisants, solaire, lunettes classiques, lunettes modernes, mode, qualité, titane, montures, verres, opticien indépendant">
        <meta name="author" content="Ségolène Lazarus, Julie Dubray, Aude Lamer, Maël Leboux">
        <link rel="stylesheet" media="screen" type="text/css" href="/css/style.css">
        <title>LineOptic - Entreprise</title>
    
    </head>

    <body>
    <nav class="iphone">
            <div><img src="/img/logo_lineoptic_nom.png"></div>
        </nav>
        
        <header>

        
            
            {{--<nav>
                <div class="logo"><a href="{{ url('/') }}"><img class="img-fluid" src="/img/logo_lineoptic_nom.png" alt="logo de LineOptic"></a>   
                </div>
                
                <ul>
                <!-- mettre des routes dans les href je pense ! -->
                    <li><a href="{{ url('fournisseurs/') }}">Fournisseurs</a></li>
                    <li><a href="{{ url('entreprise/') }}">L'entreprise</a></li>
                    <li><a href="{{ url('infospratiques/') }}">Infos Pratiques</a></li>
                    <li><a href="{{ url('conseils/') }}">Conseils</a></li>
                </ul>
            
            </nav>--}}

            <nav class="nav_desk">
                <div class="logo"><a href="{{ url('/') }}"><img class="img-fluid" src="/img/logo_lineoptic_nom.png" alt="logo de LineOptic"></a>   
                </div>
                
                <ul>
                    <li><a href="{{ url('fournisseurs/') }}">Fournisseurs</a></li>
                    <li><a href="{{ url('entreprise/') }}">L'entreprise</a></li>
                    <li><a href="{{ url('conseils/') }}">Conseils</a></li>
                    <li><a href="{{ url('infospratiques/') }}">Infos Pratiques</a></li>
                </ul>
            </nav>

            <nav class="nav_mobile">              
                <ul>
                    <li><a href="{{ url('/') }}">
                        <img class="img-fluid" src="/img/accueil.svg">
                        <img class="img-fluid" src="/img/accueil_active.svg">
                        <!-- Accueil -->
                    </a></li>

                    <li><a href="{{ url('fournisseurs/') }}">
                        <img class="img-fluid" src="/img/fournisseurs.svg">
                        <img class="img-fluid" src="/img/fournisseurs_active.svg">
                        <!-- Marques -->
                    </a></li>

                    <li><a href="{{ url('entreprise/') }}">
                        <img src="/img/entreprise.svg">
                        <img src="/img/entreprise_active.svg">
                        <!-- L'entreprise -->
                    </a></li>

                    <li><a href="{{ url('conseils/') }}">
                        <img class="img-fluid" src="/img/conseils.svg">
                        <img class="img-fluid" src="/img/conseils_active.svg">
                        <!-- Conseils -->
                    </a></li>

                    <li><a href="{{ url('infospratiques/') }}">
                        <img class="img-fluid" src="/img/infos.svg">
                        <img class="img-fluid" src="/img/infos_active.svg">
                        <!-- Infos pratiques -->
                    </a></li>
                </ul>
            
            </nav>
        
        </header>
    
        <main>

            @yield('content')
            
        </main>
    
        <footer>
            
            <div class="footer">
            
                <div>
                    <p><a href="url{{ url('fournisseurs') }}">Fournisseurs</a></p>
                    <p><a href="url{{ url('entreprise') }}">L'entreprise</a></p>
                    <p><a href="url{{ url('infospratiques') }}">Infos Pratiques</a></p>
                </div>
                <div>
                    <p><a href="url{{ url('conditionq') }}">Conditions d'utilisation</a></p>
                    <p><a href="url{{ url('mentions') }}">Mentions Légales</a></p>
                    <p><a href="{{ url('login/') }}">Page admin</a></p>              
                </div>
                <div class="rs">
                    <div class="rslogo"><a href="https://www.instagram.com/lineoptic45/"><img class="img-fluid" src="/img/instagram.svg"></a></div>
                    <div class="rslogo"><a href="https://www.facebook.com/OpticienLineoptic/"><img class="img-fluid" src="public/img/facebook.svg" alt="Facebook"></a></div>
                </div>
                
            </div>
        
        </footer>

        

        <script src="/js/animations.js"></script>
        <script src="/js/home.js"></script>
        <script src="/js/fourni.js"></script>
        <script src="/js/navbar.js"></script>
        <script src="/js/scroll.js"></script>
    
    </body>

</html>