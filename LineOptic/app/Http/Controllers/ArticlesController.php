<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = Article::all();
        return view('conseils')->with('articles',$article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles/create');
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
                'titre' => 'required|max:250|unique:articles',
                'contenu' => 'required',
                'chapo' => 'required',
                'mots_cles'=> 'required',
                'image' => 'required'
            ]
        );
        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im1";
            $image=$date.$image;
            $request->image->storeAs('articles',$image,'public');
            //Création d’un nouvel objet de classe Tache
            $article = new Article;
            
            //Affectation des propriétés de l’objet
            
            $article->titre = $request->titre;
            $article->contenu = $request->contenu;
            $article->chapo = $request->chapo;
            $article->mots_cles = $request->mots_cles;
            $article->image = $image;
            $article->slug = Str::slug($article->titre);
            // $article->id_categorie = 1;
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $article->save();
            Session::flash('message', 'Création effectuée !');

            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            return redirect('/articles');
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
        //{{ url() }}
    }

    function show_by_slug(Request $request, $slug)
    {
        // return 'ok' . $slug;
        $article = Article::where('slug',$slug)->first();
        $autrearticles = Article::orderBy('created_at','desc')->paginate(3);
        // return $post;
        // return redirect('/posts/show');
        return view('article', ['article'=>$article])->with('autrearticles',$autrearticles);
    }

    // function show_more(){
    //     $articles = Article::orderBy('created_at','desc')->paginate(3);
    //     //page heading

    //     //retourne la vue home.blade.php
    //     return view('article')->with('articles', $articles);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        return view('articles/edit', ['article' => $article]);
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
                'titre' => 'required|max:250|unique:articles',
                'contenu' => 'required',
                'chapo' => 'required',
                'mots_cles'=> 'required',
                'image' => 'required'
            ]
            );
            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur
            /////////////////////////////////////////////
            // préparation de l'enregistrement à stocker dans la base de données
            ////////////////////////////////////
            if($request->hasFile('image')){
                $image = $request->file('image')->getClientOriginalName();
                date_default_timezone_set('Europe/Paris');
            $date = getdate()[0]."im1";
            $image=$date.$image;
                $request->image->storeAs('articles',$image,'public');
            //Création d’un nouvel objet de classe Tache
            // $client = new Client;
            $article = Article::find($id);

            
            //Affectation des propriétés de l’objet
            $article->titre = $request->titre;
            $article->contenu = $request->contenu;
            $article->chapo = $request->chapo;
            $article->mots_cles = $request->mots_cles;
            $article->image = $image;
            $article->slug = Str::slug($article->titre);
            // persistance de l’objet 
            // -> insertion de l'enregistrement dans la base de données
            $article->save();
            /////////////////////////////////////////////
            // redirection vers la page qui affiche la liste des tâches
            ////////////////////////////////////
            Session::flash('message', 'Edition effectuée !');
            return redirect('/articles');

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
        $articles = Article::where('id', $id)->delete();
        

        return redirect('/conseils')
            ->withSuccess(__('Post delete successfully.'));

    }
}
