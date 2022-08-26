<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Horaire;
use App\Models\Contact;
use App\Models\Fournisseur;
use App\Models\Equipe;
use App\Models\Article;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MonsiteController extends Controller
{
    //

     /**
     * @param  \Illuminate\Http\Request  $request
     */

    function login(Request $request){

        // 
        $fournisseurs = Fournisseur::Orderby('id', 'desc')->limit(3)->first();
        $equipes = Equipe::all();
        $articles = Article::Orderby('id', 'desc')->limit(1)->first();
       $hash_admin = Hash::make('Optic-Line#45!!');
        $hash_pseudoad = Hash::make('Tony+45+');

       $hash_prof = Hash::make('Blois-IUT#41!!');
       $hash_pseudopr = Hash::make('Prof+41+');

    //    echo $hash_admin . "<br>";

    //    echo $request->password . "<br>";

    //    echo $request->pseudo . "<br>";

       $pseudo = "Tony";

       if (Hash::check($request->password, $hash_admin) && Hash::check($request->pseudo, $hash_pseudoad)) {
            echo "match";
            $request->session()->put('access_admin', 'ok');

            if ($request->session()->has('access_admin')) {
                echo "Vous êtes connecté en tant que Tony+45+ ! <br>";
            }
            else{
                echo "connexion échouée";
            }
        }

        if (Hash::check($request->password, $hash_prof) && Hash::check($request->pseudo, $hash_pseudopr)) {
            echo "match";
            $request->session()->put('access_prof', 'ok');

            if ($request->session()->has('access_prof')) {
                echo "Vous êtes connecté en tant que Prof+41+ ! <br>";
            }
            else{
                echo "connexion échouée";
            }
        }
        return "ok <a href='/'>Revenir à la page d'accueil</a>"; //RAF faire un redirect var la main page du backoffice
        return view('index')->with('fournisseurs',$fournisseurs)->with('equipes',$equipes)->with('articles',$articles);

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    function infospratiques(Request $request){
//echo "ok";
            $horaires = Horaire::all();
            $adresses = Adresse::all();
            $contacts = Contact::all();
            return view('infospratiques')->with('horaires', $horaires)->with('adresses',$adresses)->with('contacts',$contacts);


    }

    function fournisseurs(){

        $fournisseurs = Fournisseur::all();
        return view('fournisseurs')->with('fournisseurs',$fournisseurs);

    }

    function entreprise(){

        $equipes = Equipe::all();
        return view('entreprise')->with('equipes',$equipes);

    }

    function accueil(){
        $fournisseurs = Fournisseur::Orderby('id', 'desc')->limit(3)->get();
        $equipes = Equipe::all();
        $articles = Article::Orderby('id', 'desc')->limit(1)->get();
        return view('index')->with('fournisseurs',$fournisseurs)->with('equipes',$equipes)->with('articles',$articles);
    }

    function conseils(){
        $articles = Article::all();
        $articles = Article::Orderby('id', 'desc')->limit(3)->get();
        return view('conseils')->with('articles',$articles);
    }

    

}
