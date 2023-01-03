<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejour;
use Mail;
use App\Mail\OffrirSejourMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Client_Possede_Adresse;

class OffrirSejourController extends Controller
{
  public function create($id)
  {
    $sejour = Sejour::findOrFail($id);

    return view('/offrir', [
        'sejour' => $sejour
      ]);
  }

  public function store(Request $request)
  {
      // Récupérer l'identifiant du séjour à partir des données de la requête
      $id_sejour = $request->input('id_sejour');
      // Récupérer l'objet du séjour à partir de la base de données
      $sejour = Sejour::find($id_sejour);
  
      // Générer un code de séjour aléatoire
      $codeSejour = Str::random(10);
  
      // Créer une instance de la classe OffrirSejourMail
      $mail = new OffrirSejourMail($codeSejour, $sejour->titre_sejour);
  
      // Récupérer l'adresse e-mail du destinataire
      $destinataire = $request->input('email');
  
      $price = $request->price;   
      $tabCommande = $request->tabCommande;
      
      return view('/adresseFacturation')->with(["tabCommande" => $tabCommande, "price" => $price,"client" => Auth::user(),"client_possede_adresse" => Client_Possede_Adresse::all()])->with(["price"=>$price]);
  }
  
  
  

}
