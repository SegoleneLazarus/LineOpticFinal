<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Contact;
use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
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
        return view('contacts/create');
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
                'contacts' => 'required'
            ]
        );
        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur
        /////////////////////////////////////////////
        // préparation de l'enregistrement à stocker dans la base de données
        ////////////////////////////////////
        
        //Création d’un nouvel objet de classe Tache
        $contact = new Contact();
        
        //Affectation des propriétés de l’objet
        $contact->contacts = $request->contacts;
        // persistance de l’objet 
        // -> insertion de l'enregistrement dans la base de données
        $contact->save();
        Session::flash('message', 'Création effectuée !');

        /////////////////////////////////////////////
        // redirection vers la page qui affiche la liste des tâches
        ////////////////////////////////////
        return redirect('/contacts');
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
        $contact = Contact::find($id);
        return view('contacts/edit', ['contacts' => $contact]);
        
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
                'contacts' => 'required'
            ]
            );
            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            
            //Création d’un nouvel objet de classe Tache
            // $client = new Client;
            $contact = Contact::find($id);

            
            //Affectation des propriétés de l’objet
            $contact->contacts = $request->contacts;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $contact->save();
            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            Session::flash('message', 'Edition effectuée !');
            return redirect('infospratiques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::where('id', $id)->delete();
        

        return redirect('/infospratiques')
            ->withSuccess(__('Post delete successfully.'));
    }
}
