<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HelloController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdressesController;
use App\Http\Controllers\EquipeController;
// use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HorairesController;
use App\Http\Controllers\MonsiteController;

// use App\Models\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('entreprise', function () {
    return view('entreprise');
});

Route::get('infospratiques', function () {
    return view('infospratiques');
});

// Route::get('fournisseurs', function () {
//     return view('fournisseurs');
// });

Route::get('index', function () {
    return view('index');
});

Route::get('horaires', function () {
    return view('infospratiques');
});
Route::get('/fournisseurs', function () {
    return view('fournisseurs');
});
Route::get('contacts', function () {
    return view('infospratiques');
});

Route::get('/conseils', function () {
    return view('conseils');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/article', function () {
    return view('article');
});


Route::post('/test-hash', [MonsiteController::class, 'login']);

// Route::get('/infospratiques', function () {
//     return view('infospratiques');
// });

Route::get('/infospratiques', [MonsiteController::class, 'infospratiques']);
Route::get('/fournisseurs', [MonsiteController::class, 'fournisseurs']);
Route::get('/entreprise', [MonsiteController::class, 'entreprise']);
Route::get('/conseils', [MonsiteController::class, 'conseils']);
Route::get('/', [MonsiteController::class, 'accueil']);

// blinder avec middleware->auth 
Route::resource('fournisseurs', FournisseursController::class);
// ->except(['create', 'store', 'update', 'destroy'])
// Route::post('fournisseurs', [PostController::class, 'store']);

Route::resource('horaires', HorairesController::class);
Route::resource('contacts', ContactController::class);
// Route::resource('categories', CategoriesController::class);
Route::resource('equipes', EquipeController::class);
Route::resource('adresses', AdressesController::class);
Route::resource('articles', ArticlesController::class);

Route::get('articles/{id}', [ArticlesController::class, 'edit']);
Route::put('articles/{id}', [ArticlesController::class, 'update']);

Route::get('fournisseurs/{id}', [FournisseursController::class, 'edit']);
Route::put('fournisseurs/{id}', [FournisseursController::class, 'update']);

Route::get('equipes/{id}', [EquipeController::class, 'edit']);
Route::put('equipes/{id}', [EquipeController::class, 'update']);

Route::get('horaires/{id}', [HorairesController::class, 'edit']);
Route::put('horaires/{id}', [HorairesController::class, 'update']);

Route::get('adresses/{id}', [AdressesController::class, 'edit']);
Route::put('adresses/{id}', [AdressesController::class, 'update']);

Route::get('contacts/{id}', [ContactController::class, 'edit']);
Route::put('contacts/{id}', [ContactController::class, 'update']);

// Route::get('articles/{id}', [ArticlesController::class, 'show']);
Route::get('conseils/{slug}', [ArticlesController::class, 'show_by_slug']);
// Route::get('conseils/{slug}', [ArticlesController::class, 'show_more']);

// https://beaussier.developpez.com/articles/php/mysql/blob/
// pour enregistrer des images !
// https://laravel.sillo.org/laravel-5-7-par-la-pratique-les-images/
