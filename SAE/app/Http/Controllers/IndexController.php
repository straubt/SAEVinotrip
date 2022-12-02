<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Index;
use App\Models\User;
use App\Models\Sejour;
use App\Models\Destination;
use App\Models\Categorie_Participant;
use App\Models\Theme;
use App\Models\Route_des_vins;
use App\Models\Avis;
use App\Models\Sejour_To_Cat_Participant;




class IndexController extends Controller
{
    public function index(){
        return view("welcome", ["sejour" => Sejour::all()], ["client" => Auth::user()]);
    }

    public function sejour(){
        return view("lessejours", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(), "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()]);
    }

    public function unSejour(){
        return view("sejour", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(),"avis" => Avis::all()]) ;
    }

    public function route_des_vins(){
        return view("route_des_vins", ["route_des_vins" => Route_des_vins::all()]);
    }

    public function register(){ //arrivée sur la page register
        return view("register");
    }

    public function addClient(){ //post sur la page register
        return view("register");
    }

    public function connection(){
        return view("connection");
    }

    public function authenticate(Request $request) //authentification function
    {
        
        $credentials = $request->validate([ //verif formulaire champs
            'mail_client' => ['required'],
            'mdp_client' => ['required'],
        ]);

        unset($credentials["mdp_client"]); //transfor mdp_client en password pour ath laravel
        $credentials["password"] = $request->mdp_client;


        if (Auth::attempt($credentials)) { //verification sur le serveur
            $request->session()->regenerate();
            return redirect()->intended('/');

        }

        return back()->withErrors([
            'email' => 'Mauvais identifiant ou mot de passe.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return view("connection");
    }


    // public function destination(){
    //     return view("sejour", ["destination" => Destination::all()]);
    // }
}
