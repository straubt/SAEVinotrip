<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Sejour;
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
        
         return view('/adresseFacturation')->with(["tabCommande" => $tabCommande, "price" => $price,"client" => Auth::user(),"client_possede_adresse" => Client_Possede_Adresse::all()])->with(["price"=>$price]);
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
