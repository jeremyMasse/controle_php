<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {
    Route::post('/password_modification', 'App\Http\Controllers\UserAccountController@password_modification');
    Route::get('/password_modification', 'App\Http\Controllers\UserAccountController@form_password_modification');
    Route::get('/profil', function(){
        return view('profil');
    });
    Route::post('/livre/ajouter', 'App\Http\Controllers\livreController@ajouter');
    Route::get('/deconnexion', 'App\Http\Controllers\UserController@deconnexion');
});


Route::get('/inscription', '\App\Http\Controllers\inscriptionController@inscription');
Route::post('/inscription', '\App\Http\Controllers\inscriptionController@formulaire');

Route::get('/connexion', '\App\Http\Controllers\connexionController@connexion');
Route::post('/connexion', '\App\Http\Controllers\connexionController@formulaire');

Route::get('/livre/{id}', [
    'as' => 'livre',
    'uses' => '\App\Http\Controllers\livreController@livre'
] );
Route::get('/catalogue', '\App\Http\Controllers\catalogueController@catalogue');




route::get('/', '\App\Http\Controllers\catalogueController@catalogue');

route::post('/livre/{id}/possede', '\App\Http\Controllers\UserController@possede');
Route::delete('/livre/{id}/possede', '\App\Http\Controllers\UserController@depossede');