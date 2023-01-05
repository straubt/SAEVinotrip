<?php

namespace App\Http\Controllers;

use App\Models\Categorie_Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;


class AdminController extends Controller
{

    public function connectionAdmin(){ // page connection pour compte admin
        return view("connectionAdmin");
    }

    public function connectionChef(){// page connection pour compte Chef
        return view("connectionChef");
    }

    public function welcomeAdmin(){// page welcome compte admin
        return view("welcomeAdmin");
    }

    public function welcomeChef(){// page welcome compte Chef
        return view("welcomeChef",["admins" => Staff::all()], ["catStaff" => Categorie_Staff::all()]);
    }


    public function authenticateChef(Request $request){// fonction de connection chef

        $credentials = $request->validate([ //fields verification on formular view
            'id_admin' => ['required'],
            'mdp_admin' => ['required'],
        ]);

        unset($credentials["mdp_admin"]); //transform mdp_client into password for auth laravel
        $credentials["password"] = $request->mdp_admin;

        unset($credentials["id_admin"]); //transform mdp_client into password for auth laravel
        $credentials["login_staff"] = $request->id_admin;

        if (Auth::guard('admin')->attempt($credentials)) { //server verification identity
            $request->session()->regenerate();
            return redirect()->intended('/welcomeChef');
        }

        return back()->withErrors([ //sending errors (bad email or password)
            'email' => 'Mauvais identifiant ou mot de passe.',
        ]);

    }

    public function authenticateAdmin(Request $request){// fonction de connection admin

        $credentials = $request->validate([ //fields verification on formular view
            'id_admin' => ['required'],
            'mdp_admin' => ['required'],
        ]);

        unset($credentials["mdp_admin"]); //transform mdp_client into password for auth laravel
        $credentials["password"] = $request->mdp_admin;

        unset($credentials["id_admin"]); //transform mdp_client into password for auth laravel
        $credentials["login_staff"] = $request->id_admin;


        if (Auth::guard('admin')->attempt($credentials)) { //server verification identity
            $request->session()->regenerate();
            return redirect()->intended('/welcomeAdmin');
        }

        return back()->withErrors([ //sending errors (bad email or password)
            'email' => 'Mauvais identifiant ou mot de passe.',
        ]);

    }

    public function addAdmin(Request $request){
        $admins = Staff::All();
        $request->id_staff = count($admins)+1;
        $request->mdp_admin = password_hash($request->mdp_admin, PASSWORD_DEFAULT);
        $request->login_staff = substr($request->nom_staff, 0, 3) . substr($request->prenom_staff, 0, 3);
        $this->validate($request, [ //on vérifie les champs du formulaire
            'nom_staff' => 'bail|required',
            'prenom_staff' => 'bail|required',
            'mdp_admin' => 'bail|required|max:500',
        ]);
        $staff = new Staff; //on créer un nouveau client vierge
        $staff->id_staff = $request->id_staff; //on ajoute les champs et on affecte les valeurs
        $staff->nom_staff = $request->nom_staff; //--------------------------------------------
        $staff->prenom_staff = $request->prenom_staff; //--------------------------------------------
        $staff->login_staff = $request->login_staff; //--------------------------------------------
        $staff->categorie_staff = $request->type_admin;
        $staff->mdp_staff = $request->mdp_admin; //--------------------------------------------
        //dd($staff->save());
        $staff->save(); // on enregistre le client dans la base.
        return redirect()->intended('/welcomeChef'); // on retourne la page de connection !
    }

    public function deleteAdmin(Request $request){
        $admin = Staff::find($request->id_staff);
        $admin->delete();
        return redirect()->intended('/welcomeChef');
    }
    
} 