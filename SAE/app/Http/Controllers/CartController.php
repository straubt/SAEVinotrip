<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Sejour;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use App\Models\Client_Possede_Adresse;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sejour = Sejour::find($request->primaryKey);
        $dateArrive = $request->startDate;
        $dateDepart = $request->endDate;
        Cart::add($request->id, $request->title, 1, $request->price, [
            'dateArrive' => $dateArrive,
            'dateDepart' => $dateDepart
        ])->associate('App\Models\Sejour');

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->primaryKey;
        });

        if($duplicata->isNotEmpty()){
            return redirect('sejour?'.$request->id) ->with('success','Le produit a déjà été ajouté au panier');

        }

        return redirect('sejour?'.$request->id) ->with('success','Le produit a été ajouté au panier');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // Fonction pour mettre à jour l'élément du panier
     public function update(Request $request)
     {
        $price = $request->price;   
        $tabCommande = $request->tabCommande;
        $tabCommande = json_decode($tabCommande, true);
        foreach ($tabCommande as $item) {
            $id_commande = Commande::count() + 1;
            do {
                // Vérifier si l'ID généré existe déjà dans la table
                if (Commande::where('id_commande', $id_commande)->exists()) {
                    // Si l'ID existe déjà, générer un nouvel ID
                    $id_commande = $id_commande+1;
                }
            } while (Commande::where('id_commande', $id_commande)->exists());
            $id_sejour = $item['id'];
            $id_client = auth()->user()->id_client;
            $nb_adulte_commande = $item['adults'];
            $nb_enfant_commande = $item['children'];
            $nb_chambre_commande = $item['nights'];
            $debut_sejour_commande = $item['date'];
            $prix_total_commande = $item['priceTrip'];
            $message_commande = null;
            $code_etat_commande = 0;
            $date_dmd_verif_dispo_commande = null;
            $date_dmd_paiement_commande = null;
            $date_paiement_commande = null;
            $date_dmd_replace_commande = null;
            $commandeExists = Commande::where('id_sejour', $id_sejour)
            ->where('id_client', $id_client)
            ->exists();
            if (!$commandeExists) {
                $commande = new Commande([
                'id_commande' => $id_commande,
                'id_sejour' => $id_sejour,
                'id_client' => $id_client,
                'nb_adulte_commande' => $nb_adulte_commande,
                'nb_enfant_commande' => $nb_enfant_commande,
                'nb_chambre_commande' => $nb_chambre_commande,
                'debut_sejour_commande' => $debut_sejour_commande,
                'prix_total_commande' => $prix_total_commande,
                'message_commande' => $message_commande,
                'code_etat_commande' => $code_etat_commande,
                'date_dmd_verif_dispo_commande' => $date_dmd_verif_dispo_commande,
                'date_dmd_paiement_commande' => $date_dmd_paiement_commande,
                'date_paiement_commande' => $date_paiement_commande,
                'date_dmd_replace_commande' => $date_dmd_replace_commande
                ]);
            }
            else {
                $commande = Commande::where('id_sejour', $id_sejour)
                ->where('id_client', $id_client)
                ->first();
                $commande->update([
                    'id_sejour' => $id_sejour,
                    'id_client' => $id_client,
                    'nb_adulte_commande' => $nb_adulte_commande,
                    'nb_enfant_commande' => $nb_enfant_commande,
                    'nb_chambre_commande' => $nb_chambre_commande,
                    'debut_sejour_commande' => $debut_sejour_commande,
                    'prix_total_commande' => $prix_total_commande,
                    'message_commande' => $message_commande,
                    'code_etat_commande' => $code_etat_commande,
                    'date_dmd_verif_dispo_commande' => $date_dmd_verif_dispo_commande,
                    'date_dmd_paiement_commande' => $date_dmd_paiement_commande,
                    'date_paiement_commande' => $date_paiement_commande,
                    'date_dmd_replace_commande' => $date_dmd_replace_commande
                ]);
            }
            $commande->save();
        }
        $id_client = Auth::user()->id_client;
        $commandes = Commande::where('code_etat_commande', '=', 1)
                            ->where('id_client', '=', $id_client)
                            ->get();
        return view("mesCommandes", ["commande" => $commandes]);
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Le produit a été supprimé');
    }
}
