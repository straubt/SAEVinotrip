<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "client";
    protected $primaryKey = "id_client";
    public $timestamps = false;
    protected $fillable = [
        'nom_client',
        'prenom_client',
        'titre_client',
        'mail_client',
        'mdp_client',
        'date_naiss_client',
        'remember_token'
    ];
}