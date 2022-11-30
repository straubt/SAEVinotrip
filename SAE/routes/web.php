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

Route::get('/nos-sejours', [IndexController::class, "destination"]);
Route::get('/nos-sejours', [IndexController::class, "categorie_participant"]);
Route::get('/nos-sejours', [IndexController::class, "sejour"]);
Route::get('/register', [IndexController::class, "register"])->name('register');
Route::post('/register', [IndexController::class, "addClient"])->name('registerPost');
Route::get('/login', [IndexController::class, "connection"])->name('connection');
Route::post('/login', [IndexController::class, "authenticate"])->name('connectionPost');
Route::get('/logout', [IndexController::class, "logout"])->name('logout');
Route::get('/', [IndexController::class, "index"]);
Route::get('/sejour', [IndexController::class, 'unSejour']);
Route::get('/route-des-vins', [IndexController::class, 'route_des_vins']);

