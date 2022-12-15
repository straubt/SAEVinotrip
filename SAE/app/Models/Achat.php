<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $table = "achat";
    protected $primaryKey = "id_achat";
    public $timestamps = false;
}
