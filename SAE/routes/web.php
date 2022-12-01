<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
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
Route::get("/nos-sejours", [IndexController::class, "destination"]);
Route::get("/nos-sejours", [IndexController::class, "categorie_participant"]);
Route::get("/nos-sejours", [IndexController::class, "sejour"]);
Route::get("/", [IndexController::class, "index"]);
Route::get("/sejour", [IndexController::class, 'unSejour']);
Route::get("/route-des-vins", [IndexController::class, 'route_des_vins']);

// ->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';