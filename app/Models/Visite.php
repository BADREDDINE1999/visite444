<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }
    public function produitdmds()
    {
        return $this->hasMany(Produitdmd::class);
    }
    public function produitprps()
    {
        return $this->hasMany(Produitprp::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    protected $fillable = [
        'user_id',
        'client_id',
        'date_visite',
        'date_entre',
        'date_sortie',
        'progression',
    ];
    protected $casts = [
        'date_visite' => 'date:hh:mm',
        'date_sortie' => 'date:hh:mm',
    ];
}
