<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use Gloudemans\Shoppingcart\Facades\Cart;

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

//tous les sejours
Route::get('/nos-sejours', [IndexController::class, "destination"]);
Route::get('/nos-sejours', [IndexController::class, "categorie_participant"]);
Route::get('/nos-sejours', [IndexController::class, "sejour"]);
//register post get
Route::get('/register', [IndexController::class, "register"])->name('register');
Route::post('/register', [IndexController::class, "addClient"])->name('registerPost');
//login post get
Route::get('/login', [IndexController::class, "connection"])->name('connection');
Route::post('/login', [IndexController::class, "authenticate"])->name('connectionPost');
//logout
Route::get('/logout', [IndexController::class, "logout"])->name('logout');
//Mon profil
Route::get('/profile', [IndexController::class, "profile"])->name('profile');
Route::post('/profile', [IndexController::class, "updateProfile"])->name('updateProfile');
//homepage
Route::get('/', [IndexController::class, "index"]);
//Voir un sejour
Route::get('/sejour', [IndexController::class, 'unSejour']);
Route::post('/sejour', [IndexController::class, 'postAvis'])->name('postAvis');
//Route des vins
Route::get('/route-des-vins', [IndexController::class, 'route_des_vins']);
//panier routes
Route::post('/panier/ajouter', 'App\Http\Controllers\CartController@store')->name('cart.store');
//Panier
Route::get('/panier', [IndexController::class, 'panier'])->name('panier');
//VidePanier
Route::get('/videpanier', [IndexController::class, 'videpanier'])->name('videpanier');
//VidePanier
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
//recup_cb_id
Route::get('/paiement', 'App\Http\Controllers\PaiementController@recup_cb');
// Ajouter une route pour appeler la méthode store du contrôleur CB
Route::post('/cb/store', 'App\Http\Controllers\PaiementController@store');

Route::get('/offrir-sejour/{id}', 'App\Http\Controllers\OffrirSejourController@create')->name('offrir-sejour.create');

Route::post('/offrir-sejours', 'App\Http\Controllers\OffrirSejourController@store')->name('offrir-sejour.store');

Route::get('/adresseFacturation', [IndexController::class, "adresseFacturation"]);

Route::post('/delete-card', 'App\Http\Controllers\CreditCardController@delete')->name('delete-card');

