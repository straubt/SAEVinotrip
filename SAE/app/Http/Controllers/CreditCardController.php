<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cb;

class CreditCardController extends Controller
{
    public function delete(Request $request)
{
    // Get the credit card details from the request
    $numero_carte_cb = $request->input('numero_carte_cb');
    $id_cb = $request->input('id_cb');
    $id_client = $request->input('id_client');
    $date_expiration_cb = $request->input('date_expiration_cb');
    $crypto_visuel_cb = $request->input('crypto_visuel_cb');
    $nom_banque_cb = $request->input('nom_banque_cb');

    // Delete the credit card from the database
    // You will need to implement this yourself, as it will depend on how you have set up your application
    Cb::where('numero_carte_cb', $numero_carte_cb)
              ->where('id_cb', $id_cb)
              ->where('id_client', $id_client)
              ->where('date_expiration_cb', $date_expiration_cb)
              ->where('crypto_visuel_cb', $crypto_visuel_cb)
              ->where('nom_banque_cb', $nom_banque_cb)
              ->delete();

    // Redirect the user back to the credit card list
    return back()->with('success', 'Votre carte a été supprimé');
}

}
