<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

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


    protected $fillable = [
        'code_article',
        'designation',
        'prix',
        'stock',
        'fournisseur',
        'marque',
        'note',
        'type',
        'photo'
    ];
}
