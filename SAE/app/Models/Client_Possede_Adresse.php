<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Possede_Adresse extends Model
{
    use HasFactory;
    protected $table = "client_possede_adresse";
    protected $primaryKey = "id_adresse";
    public $timestamps = false;
}
