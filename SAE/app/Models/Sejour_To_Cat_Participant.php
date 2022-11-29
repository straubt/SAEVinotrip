<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejour_To_Cat_Participant extends Model
{
    use HasFactory;
    protected $table = "sejour_to_cat_participant";
    protected $primaryKey = "id_sejour";
    public $timestamps = false;
}
