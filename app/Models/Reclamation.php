<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    public function visites()
    {
        return $this->belongsTo(Visite::class);
    }
    protected $fillable = [
        'visite_id',
        'reclamation',
        'type',
        'observation',
    ];
}
