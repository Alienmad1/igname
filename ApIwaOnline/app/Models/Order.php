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
        'details',	
        'lieudedepart',
    	'lieudelivraison',	
        'contactdudestinataire',
        'montant',	
        'id_users',	
        'id_livreurs',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_users');
    }

    public function livreur(){
        return $this->belongsTo(Livreur::class);
    }
}
