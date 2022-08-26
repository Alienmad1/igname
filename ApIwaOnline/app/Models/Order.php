<?php

namespace App\Models;

use App\Models\User;
use App\Models\Livreur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom_livreur',
        'prenom_livreur',
        'contact',
        'photo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livreur(){
        return $this->belongsTo(Livreur::class);
    }
}
