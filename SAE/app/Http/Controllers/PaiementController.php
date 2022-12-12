<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Client;
use App\Models\Cb;


use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function recup_cb(Request $request)
    {
        // Vérifier si l'utilisateur est authentifié
        if (auth()->check()) {
            // Récupérer l'ID du client depuis les données d'authentification et d'autorisation
            $id_client = auth()->user()->id_client;
    
            // Récupérer les données du client à partir de la classe Client en utilisant l'ID du client
            $client = Client::findOrFail($id_client);
    
            // Récupérer les données de la carte de crédit en utilisant la relation de base de données entre la classe CB et la classe Client
            $cb = $client->cb;
    
            // Renvoyer la vue paiement.blade.php en passant les données de la carte de crédit et du client en tant que variables
            return view('paiement', ['cb' => $cb, 'client' => $client]);
        } else {
            // Renvoyer une erreur 401 (non autorisé) si l'utilisateur n'est pas authentifié
            abort(401, 'Vous devez être authentifié pour accéder à cette page.');
        }
    }

        public function store(Request $request)
    {
        // Récupérer les données de la carte de crédit à partir de la requête HTTP
        $data = $request->all();

        // Récupérer la valeur du paramètre "enregistrer" qui indique si l'utilisateur souhaite enregistrer ses données ou non
        $save = $request->input('enregistrer');

        // Récupérer les données de la carte de crédit
        $numero_carte_cb = $request->input('numero_carte_cb');
        $id_cb = $request->input('id_cb');
        if($id_cb == null){
            $id_cb = Cb::count()+1;
        }
        $id_client = $request->input('id_client');
        $date_expiration_cb = $request->input('date_expiration_cb');
        $crypto_visuel_cb = $request->input('crypto_visuel_cb');
        $nom_banque_cb = $request->input('nom_banque_cb');

            // Crypter les données de la carte de crédit avant de les enregistrer dans la base de données
        $numero_carte_cb = Crypt::encrypt($numero_carte_cb);
        $date_expiration_cb = Crypt::encrypt($date_expiration_cb);
        $crypto_visuel_cb = Crypt::encrypt($crypto_visuel_cb);
        $nom_banque_cb = Crypt::encrypt($nom_banque_cb);

        $numero_carte_cb = substr($numero_carte_cb, 0, 16);
        $date_expiration_cb = substr($date_expiration_cb, 0, 5);
        $crypto_visuel_cb = substr($crypto_visuel_cb, 0, 3);
        $nom_banque_cb = substr($nom_banque_cb, 0, 100);


        if ($save) {
              // Créer un nouvel objet CB en utilisant les données cryptées
            $cb = new CB([
            'numero_carte_cb' => $numero_carte_cb,
            'id_cb' => $id_cb,
            'id_client' => $id_client,
            'date_expiration_cb' => $date_expiration_cb,
            'crypto_visuel_cb' => $crypto_visuel_cb,
            'nom_banque_cb' => $nom_banque_cb,
        ]);
         // Enregistrer les données de la carte de crédit dans la base de données
         $cb->save();

            // Retourner une réponse pour confirmer que les données ont été enregistrées avec succès
            return response()->json('Donnees de la carte de credit enregistrees avec succes', 201);
        } else {
            // Si l'utilisateur n'a pas choisi d'enregistrer ses données, retourner une réponse pour confirmer que les données n'ont pas été enregistrées
            return response()->json('Donnees de la carte de credit non enregistrees', 200);        }
    }

    

}
