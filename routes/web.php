<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('login', 'LoginController@Login');
Route::post('login', 'LoginController@CheckLogin');
Route::get('home', 'HomeController@Home');
Route::get('logout', 'LoginController@Logout');

Route::get('registrazione', 'SigninController@Signin');
Route::post('registrazione', 'SigninController@CheckSignin');
Route::get('pagina_negozio', 'PagNegozioController@PagNegozio');


Route::get('fetch', 'AlbumFetchController@FetchAlbums');
Route::get('fetch_formato', 'AlbumFetchController@FetchFormatiAlbum');


Route::get('carrello', 'CarrelloController@Carrello');

Route::get('session', 'SessionController@Session');
Route::get('album_users', 'AlbumFetchController@fetchAlbumUsers');

//Route::post('insert_carrello', 'InsertCarrelloController@Insert');
Route::get('insert_carrello/{album}/{artista}/{formato}', 'CarrelloController@Insert');


//rimozione elementi dal carrello
Route::get('rimuovi_elemento/{album}/{artista}/{formato}', 'CarrelloController@RimuoviElemento');

//torno alla home dal nome del sito
Route::get('return_home', 'HomeController@ReturnHome');

//link per la pagina delle info del negozio
Route::get('chi_siamo', 'HomeController@ChiSiamo');


//fetch per gli impiegati
Route::get('fetchImpiegati', 'CollaboratoriController@FetchImpiegati');

//fetch per info lavoro
Route::get('infoLavoro', 'CollaboratoriController@OpInfo');