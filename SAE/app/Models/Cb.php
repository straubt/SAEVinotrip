<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cb extends Model
{
    use HasFactory;
    protected $table = "cb";
    protected $primaryKey = "id_cb";
    protected $fillable = [
        'numero_carte_cb', // Add this line
        'id_cb',
        'id_client',
        'date_expiration_cb',
        'crypto_visuel_cb',
        'nom_banque_cb',
    ];
    public $timestamps = false;
}