<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Index;
use App\Models\Sejour;
use App\Models\Destination;
use App\Models\Categorie_Participant;
use App\Models\Theme;
use App\Models\Route_des_vins;
use App\Models\Avis;
use App\Models\Client;
use App\Models\Sejour_To_Cat_Participant;




class IndexController extends Controller
{
    public function index(){ //return homepage view
        return view("welcome", ["sejour" => Sejour::all()], ["client" => Auth::user()]);
    }

    public function sejour(){ //return all sejours iview
        return view("lessejours", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(), "sejour_to_cat_participant" => Sejour_To_Cat_Participant::all()]);
    }

    public function unSejour(){ //return clicked sejour view
        return view("sejour", ["sejour" => Sejour::all(), "destination" => Destination::all(),"categorie_participant" => Categorie_Participant::all(),"theme" => Theme::all(),"avis" => Avis::all()]) ;
    }

    public function route_des_vins(){ //return route des vins view
        return view("route_des_vins", ["route_des_vins" => Route_des_vins::all()]);
    }

    public function register(){ //return register page
        return view("register");
    }

    public function addClient(Request $request){ //save a new client (on register page) NOT DONE YET
        $clients = Client::all(); // on récurpére la variables qui contient tous les clients
        $request->id_client = count($clients)+1; // on donne le dernier id + 1 de ce dernier tableau de client
        $request->mdp = password_hash($request->mdp, PASSWORD_DEFAULT); // on hash le password avec une fonction de hashage
        $ageCutoff = now()->subYears(18)->toDateString(); 
        $this->validate($request, [ //on vérifie les champs du formulaire
            'titre' => 'bail|required',
            'prenom' => 'bail|required|max:50',
            'nom' => 'bail|required|max:50',
            'mail_client' => 'bail|required|unique:client',
            'date_naissance' => 'bail|required|before_or_equal:$ageCutoff',
            'mdp' => 'bail|required|max:500'
        ]);
        $client = new \App\Models\Client; //on créer un nouveau client vierge
        $client->id_client = $request->id_client; //on ajoute les champs et on affecte les valeurs
        $client->titre_client = $request->titre; //--------------------------------------------
        $client->prenom_client = $request->prenom; //--------------------------------------------
        $client->nom_client = $request->nom; //--------------------------------------------
        $client->mail_client = $request->mail_client; //--------------------------------------------
        $client->date_naiss_client = $request->date_naissance; //--------------------------------------------
        $client->mdp_client = $request->mdp; //--------------------------------------------
        $client->save(); // on enregistre le client dans la base.
        return view("connection"); // on retourne la page de connection !
    }

    public function connection(){ //return login page
        return view("connection");
    }

    public function authenticate(Request $request) //authenticate user and redirecting to homepage (from login page)
    {
        
        $credentials = $request->validate([ //fields verification on formular view
            'mail_client' => ['required'],
            'mdp_client' => ['required'],
        ]);

        unset($credentials["mdp_client"]); //transfor mdp_client into password for auth laravel
        $credentials["password"] = $request->mdp_client;


        if (Auth::attempt($credentials)) { //server verification identity
            $request->session()->regenerate();
            return redirect()->intended('/');

        }

        return back()->withErrors([ //sending errors (bad email or password)
            'email' => 'Mauvais identifiant ou mot de passe.',
        ]);
    }

    public function logout(){ //function logout when clicked redirecting homepage as guest
        Auth::logout();
        return view("connection");
    }

    public function profile(){ //function logout when clicked redirecting homepage as guest
        return view("profile", ["client" => Auth::user()]);
    }



    // public function destination(){
    //     return view("sejour", ["destination" => Destination::all()]);
    // }
}
