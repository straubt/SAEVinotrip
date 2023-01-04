<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commande";
    protected $primaryKey = "id_commande";
    public $timestamps = false;
    protected $fillable = [
        'id_commande',
        'id_sejour',
        'id_client',
        'nb_adulte_commande',
        'nb_enfant_commande',
        'nb_chambre_commande',
        'debut_sejour_commande',
        'prix_total_commande',
        'message_commande',
        'code_etat_commande',
        'date_dmd_verif_dispo_commande',
        'date_dmd_paiement_commande',
        'date_paiement_commande',
        'date_dmd_replace_commande'
    ];
}
