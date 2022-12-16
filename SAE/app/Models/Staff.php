<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Staff as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "staff";
    public $timestamps = false;
    protected $primaryKey = "id_staff";
     /* The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_staff',
    ];

     /* The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mdp_staff',
        'remember_token',
    ];

    public function getAuthPassword() {
        return $this->mdp_staff;
    }
}