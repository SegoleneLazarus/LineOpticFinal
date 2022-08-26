<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use Illuminate\Support\Facades\Session;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('equipe/create');
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
        $this->validate(
            $request,
            [
                'prénom' => 'required|max:25',
                'nom' => 'required|max:25',
                'fonction' => 'required|max:25',
                'txt' => 'required',
                'img1'  => 'required',
                'img2'  => 'required'
            ]
        );

        if($request->hasFile('img1')){
            $image1 = $request->file('img1')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im1";
            $image1=$date.$image1;
            $request->img1->storeAs('equipes',$image1,'public');

            $image2 = $request->file('img2')->getClientOriginalName();
            $date = getdate()[0]."im2";
            $image2=$date.$image2;
            $request->img2->storeAs('equipes',$image2,'public');

            $equipe = new Equipe;
            
            $equipe->prénom = $request->prénom;
            $equipe->nom = $request->nom;
            $equipe->fonction = $request->fonction;
            $equipe->txt = $request->txt;
            $equipe->img1 = $image1;
            $equipe->img2 = $image2;
            $equipe->save();
            Session::flash('message', 'Création effectuée !');

            return redirect('/entreprise');
        }
            

            
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
        $equipe = Equipe::find($id);
        return view('equipe/edit', ['equipe' => $equipe]);
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
                'prénom' => 'required|max:25',
                'nom' => 'required|max:25',
                'fonction' => 'required|max:25',
                'txt' => 'required',
                'img1'  => 'required',
                'img2'  => 'required'
            ]
        );

        echo($request->hasFile('img1'));

            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            if($request->hasFile('img1')){

                $image1 = $request->file('img1')->getClientOriginalName();
                date_default_timezone_set('Europe/Paris');
                $date = getdate()[0]."im1";
                $image1=$date.$image1;
                $request->img1->storeAs('equipes',$image1,'public');
    
                $image2 = $request->file('img2')->getClientOriginalName();
                $date = getdate()[0]."im2";
                $image2=$date.$image2;
                $request->img2->storeAs('equipes',$image2,'public');
            
            //Création d’un nouvel objet de classe Tache
            $equipe = Equipe::find($id);
            
            //Affectation des propriétés de l’objet
            
            $equipe->prénom = $request->prénom;
            $equipe->nom = $request->nom;
            $equipe->txt = $request->txt;
            $equipe->img1 = $image1;
            $equipe->img2 = $image2;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $equipe->update();
            Session::flash('message', 'Edition effectuée !');

            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            // return redirect('/equipes');

            }
            
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
        $equipes = Equipe::where('id', $id)->delete();
        

        return redirect('/entreprise')
            ->withSuccess(__('Post delete successfully.'));
    }
}
