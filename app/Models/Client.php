<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_client',
        'societe',
        'c_client',
        'tele_client',
        'tele_client2',
        'ville',
        'region',
        'localisation',
        'photo',
        'game_commercialise',
        'marque_commercialise',
        'fournisseur',
        'user_id'
    ];
    public function visites()
    {
        return $this->hasMany(Visite::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}

