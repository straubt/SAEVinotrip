<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    public function confirmer(Request $request)
    {
        $id_commande = $request->input('id_commande');
    
        // Récupérez l'instance de la commande à mettre à jour
        $commande = Commande::find($id_commande);
    
        // Modifiez le champ code_etat_commande de la commande
        $commande->code_etat_commande = 1;
    
        // Enregistrez les modifications dans la base de données
        $commande->save();
        return back();
    }

    public function valider_et_payer(Request $request)
    {
        $id_commande = $request->input('id_commande');
        $commande = Commande::find($id_commande);
         // Récupérer l'ID du client depuis les données d'authentification et d'autorisation
        $id_client = auth()->user()->id_client;

        // Récupérer les données du client à partir de la classe Client en utilisant l'ID du client
        $client = Client::findOrFail($id_client);
        return view('/adresseFacturation')->with(['commande'=>$commande, 'client'=>$client]);
    }
}
