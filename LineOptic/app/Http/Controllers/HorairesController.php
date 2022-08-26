<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horaire;
use Illuminate\Support\Facades\Session;

class HorairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $horaires = Horaire::all();
        return view('infospratiques')->with('horaires', $horaires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $horaire = Horaire::find($id);
        return view('horaires/edit', ['horaire' => $horaire]);
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
                'jour' => 'required|max:10',
                'heureDébut' => 'required',
                'heureFin' => 'required'
            ]
            );
            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            
            //Création d’un nouvel objet de classe Tache
            // $client = new Client;
            $horaire = Horaire::find($id);

            
            //Affectation des propriétés de l’objet
            $horaire->jour = $request->jour;
            $horaire->heureDébut = $request->heureDébut;
            $horaire->heureFin = $request->heureFin;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $horaire->save();
            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            Session::flash('message', 'Edition effectuée !');
            return redirect('horaires/edit');
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
        
    }
}
