<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Session;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs')->with('fournisseurs',$fournisseurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fournisseurs/create');
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
                'nom' => 'required',
                'logo' => 'required',
                'image1' => 'required',
                'image2'=> 'required',
                'image3'=> 'required',
                'lien' => 'required'
            ]
        );

        $image1 = null;
        $image2 = null;
        $image3 = null;
        
        echo($request->hasFile('logo'));
        if($request->hasFile('logo')){ 

            $logo = $request->file('logo')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."logo";
            $logo=$date.$logo;
            $request->logo->storeAs('fournisseurs',$logo,'public');
            
            $image1 = $request->file('image1')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im1";
            $image1=$date.$image1;
            $request->image1->storeAs('fournisseurs',$image1,'public');
           

            $image2 = $request->file('image2')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im2";
            $image2=$date.$image2;
            $request->image2->storeAs('fournisseurs',$image2,'public');

            $image3 = $request->file('image3')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im3";
            $image3=$date.$image3;
            $request->image3->storeAs('fournisseurs',$image3,'public');


           $fournisseur = new Fournisseur;
            
            
            $fournisseur->nom = $request->nom;
            $fournisseur->logo =$logo;
            $fournisseur->image1 = $image1;
            $fournisseur->image2 = $image2;
            $fournisseur->image3 = $image3;
            $fournisseur->lien = $request->lien;
            
            $fournisseur->save();
            Session::flash('message', 'Création effectuée !');

            return redirect('/fournisseurs');
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
        $fournisseur = Fournisseur::find($id);
        return view('fournisseurs/edit', ['fournisseur' => $fournisseur]);
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
                'nom' => 'required',
                'logo' => 'required',
                'image1' => 'required',
                'image2',
                'image3',
                'lien' => 'required'
            ]
        );
            
            $logo = $request->file('logo')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."logo";
            $logo=$date.$logo;
            $request->logo->storeAs('fournisseurs',$logo,'public');
            
            $image1 = $request->file('image1')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im1";
            $image1=$date.$image1;
            $request->image1->storeAs('fournisseurs',$image1,'public');
           

            $image2 = $request->file('image2')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im2";
            $image2=$date.$image2;
            $request->image2->storeAs('fournisseurs',$image2,'public');

            $image3 = $request->file('image3')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im3";
            $image3=$date.$image3;
            $request->image3->storeAs('fournisseurs',$image3,'public');


            $fournisseur = Fournisseur::find($id);
            
            
            $fournisseur->nom = $request->nom;
            $fournisseur->logo =$logo;
            $fournisseur->image1 = $image1;
            $fournisseur->image2 = $image2;
            $fournisseur->image3 = $image3;
            $fournisseur->lien = $request->lien;

            $fournisseur->save();
            Session::flash('message', 'Edition effectuée !');

            return redirect('/fournisseurs.store');
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
        $fournisseurs = Fournisseur::where('id', $id)->delete();
        

        return redirect('/fournisseurs')
            ->withSuccess(__('Post delete successfully.'));
    }
}
