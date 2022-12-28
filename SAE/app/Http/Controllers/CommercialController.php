<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\Client_Possede_Adresse;
use App\Models\Client;
use App\Models\Sejour;
use App\Models\Cb;
use Illuminate\Support\Facades\Auth;

class CommercialController extends Controller
{
    public function modifierPrix(Request $request)
    {
      // Récupération des données de la requête
      $newPrice = $request->input('newPrice');
      $tripId = $request->input('tripId');
    
      // Vérification de l'autorisation de l'utilisateur et de la validité du nouveau prix
      if ($newPrice <= 0) {
        // Redirection vers une page d'erreur ou d'avertissement
        return redirect()->route('unauthorized_or_invalid_price');
      }
    
      // Récupération du séjour à partir de la base de données
      $trip = Sejour::findOrFail($tripId);
    
      // Mise à jour du prix du séjour
      $trip->prix_min_individuel_sejour = $newPrice;
      $trip->save();
    
      // Redirection vers la page de confirmation de modification du prix
      return back()->with('success', 'Prix modifié avec succès !');
    }
}