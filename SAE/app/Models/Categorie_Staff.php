<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_Staff extends Model
{
    use HasFactory;
    protected $table = "categorie_staff";
    protected $primaryKey = "id_categorie_staff";
    public $timestamps = false;
}
