<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_Participant extends Model
{
    use HasFactory;
    protected $table = "categorie_participant";
    protected $primaryKey = "id_categorie_participant";
    public $timestamps = false;
}
