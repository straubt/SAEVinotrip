<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Client_Possede_Adresse;
use App\Models\Client;
use App\Models\Cb;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;


class AdresseController extends Controller
{
    public function traitement(Request $request)
{
    // Vérifier si l'utilisateur est authentifié
    if (auth()->check()) {
    
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

    
    // Récupérer l'ID du client depuis les données d'authentification et d'autorisation
    $id_client = auth()->user()->id_client;

    // Récupérer les données du client à partir de la classe Client en utilisant l'ID du client
    $client = Client::findOrFail($id_client);

    // Récupérer les données de la carte de crédit en utilisant la relation de base de données entre la classe CB et la classe Client
    $cb = Cb::where('id_client', $id_client)->get();

    $id_commande = $request->input('id_commande');
    $commande = Commande::find($id_commande);

    return view('/paiement', ["commande"=>$commande, "id_adresse" => $id_adresse,"client" => $client,"cb" => $cb]);
    }
}

public function utiliser(Request $request)
{
    // Vérifier si l'utilisateur est authentifié
    if (auth()->check()) {
    $id_adresse = $request->input('id_adresse');
    // Récupérer l'ID du client depuis les données d'authentification et d'autorisation
    $id_client = auth()->user()->id_client;

    // Récupérer les données du client à partir de la classe Client en utilisant l'ID du client
    $client = Client::findOrFail($id_client);

    // Récupérer les données de la carte de crédit en utilisant la relation de base de données entre la classe CB et la classe Client
    $cb = Cb::where('id_client', $id_client)->get();

    $id_commande = $request->input('id_commande');
    $commande = Commande::find($id_commande);

    // Renvoyer la vue paiement.blade.php en passant les données de la carte de crédit et du client en tant que variables
    return view('/paiement', ["commande"=>$commande, "id_adresse" => $id_adresse,"client" => $client,"cb" => $cb]);
    }
}

public function modifyAddress(Request $request)
{
    $id_adresse = $request->input('id_adresse');
    $adresse = Adresse::find($id_adresse);

    if($adresse) {
        $adresse->num_rue_adresse = $request->input('num_rue_adresse');
        $adresse->libelle_rue_adresse = $request->input('libelle_rue_adresse');
        $adresse->code_postal_adresse = $request->input('code_postal_adresse');
        $adresse->libelle_commune = $request->input('libelle_commune');
        $adresse->num_tel_adresse = $request->input('num_tel_adresse');
        $adresse->save();
    }

        return redirect('profile') ->with('success',"L'adresse a été modifiée");
}
public function modifier(Request $request)
{
    $id_adresse = $request->input('id_adresse');
    $adresse = Adresse::find($id_adresse);
    return view('/modifierAdresse', ["adresse" => $adresse]);
}
} 