<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Client_Possede_Adresse;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


class AdresseController extends Controller
{
    public function traitement(Request $request)
{

    
    // Récupérer les données du formulaire
    $id_adresse = Adresse::count()+1; // on donne le dernier id + 1 de ce dernier tableau de l'adresse
    $numRueAdresse = $request->input('num_rue_adresse');
    $libelleRueAdresse = $request->input('libelle_rue_adresse');
    $codePostalAdresse = $request->input('code_postal_adresse');
    $libelleCommune = $request->input('libelle_commune');
    $numTelAdresse = $request->input('num_tel_adresse');

    // Enregistrer les données dans la base de données
    $adresse = new Adresse;
    $adresse->id_adresse = $id_adresse;
    $adresse->num_rue_adresse = $numRueAdresse;
    $adresse->libelle_rue_adresse = $libelleRueAdresse;
    $adresse->code_postal_adresse = $codePostalAdresse;
    $adresse->libelle_commune = $libelleCommune;
    $adresse->num_tel_adresse = $numTelAdresse;
   
    // Enregistrer les données de la carte de crédit dans la base de données
    $adresse->save();

    $client_possede_adresse = new Client_Possede_Adresse;
    // Récupérer l'ID du client depuis les données d'authentification et d'autorisation
    $id_client = auth()->user()->id_client;

    // Récupérer les données du client à partir de la classe Client en utilisant l'ID du client
    $client = Client::findOrFail($id_client);
    $client_possede_adresse->id_client = $client->id_client;
    $client_possede_adresse->id_adresse = $id_adresse;

    $client_possede_adresse->save();


   return redirect('/adresseFacturation');
}
}