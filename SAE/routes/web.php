<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
//Route des vins
Route::get('/route-des-vins', [IndexController::class, 'route_des_vins']);
//Panier
Route::get('/panier', [IndexController::class, 'panier']);
//Politique de confidentialité
Route::get('/politiqueDeConfidentialite', [IndexController::class, 'politiqueDeConfidentialite']);
//mentions legales
Route::get('/mentionsLegales', [IndexController::class, 'mentionsLegales']);
//autres connection (admin et chef)
Route::get('/connectionAdmin', [IndexController::class, 'connectionAdmin']);
Route::get('/connectionChef', [IndexController::class, 'connectionChef']);

//aide connection (admin / chef et user)
Route::get('/adminAide', [IndexController::class, 'adminAide']);
Route::get('/userAide', [IndexController::class, 'userAide']);

//aide connection (admin / chef et user)
Route::get('/welcomeAdmin', [IndexController::class, 'welcomeAdmin']);
Route::get('/welcomeChef', [IndexController::class, 'welcomeChef']);