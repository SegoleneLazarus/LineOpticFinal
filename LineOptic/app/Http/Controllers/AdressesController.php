<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Contact;
use App\Models\Horaire;
use Illuminate\Support\Facades\Session;

class AdressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adresses = Adresse::all();
        $contacts = Contact::all();
        $horaires = Horaire::all();
        return view('infospratiques')->with('adresses', $adresses)->with('contacts', $contacts)->with('horaires', $horaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adresses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'adresse' => 'required'
            ]
        );
            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            
            //Création d’un nouvel objet de classe Tache
            $adresse = new Adresse;
            
            //Affectation des propriétés de l’objet
            $adresse->adresse = $request->adresse;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $adresse->save();
            Session::flash('message', 'Création effectuée !');

            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            return redirect('/adresses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $adresse = Adresse::find($id);
        return view('adresses/edit', ['adresses' => $adresse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(
            $request,
            [
                'adresse' => 'required|max:10'
            ]
            );
            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            
            //Création d’un nouvel objet de classe Tache
            // $client = new Client;
            $adresse = Adresse::find($id);

            
            //Affectation des propriétés de l’objet
            $adresse->adresse = $request->adresse;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $adresse->save();
            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            Session::flash('message', 'Edition effectuée !');
            return redirect('adresses/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     $adresses = Adresse::find($id);
    //     Adresse::where('id', $id)->delete();
    //     return redirect('/infospratiques')->with('success', 'adresses deleted');
    // }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Adresse  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $adresse = Adresse::where('id', $id)->delete();
        

        return redirect('/infospratiques')
            ->withSuccess(__('Post delete successfully.'));
    }
}
