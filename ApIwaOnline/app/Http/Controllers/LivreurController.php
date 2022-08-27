<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    public function createLivreur(Request $request)
    {

        $validatedData = $request->validate([
            'nom_livreurs' => 'required',
            'prenom_livreurs' =>'required',
            'contact' => 'required',
            'photo'=> 'required',     
    ]);


        $livreur   = new Livreur;
        $livreur->nom_livreurs = $request->nom_livreurs;
        $livreur->prenom_livreurs = $request->prenom_livreurs;
        $livreur->contact = $request->contact;
        $livreur->photo = $request->photo;
    

        $livreur->save();

       return 200 ;

    }

    public function listAll(){

        $livreur  = Livreur::all();

        return response()->json([
            'livreur' => $livreur
        ]);
    }
}
