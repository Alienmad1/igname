<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nom_livreur',
        'prenom_livreur',
        'contact',
        'photo'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
