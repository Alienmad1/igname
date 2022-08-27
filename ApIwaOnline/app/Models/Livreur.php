<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'nom_livreurs',
        'prenom_livreurs',
        'contact',
        'photo'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
