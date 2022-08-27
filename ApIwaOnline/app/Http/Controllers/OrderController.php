<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    //create une commande
    public function create(Request $request){
        
      
        $validatedData = $request->validate([
            'details' => 'required',
            'lieudedepart' =>'required',
            'lieudelivraison' => 'required',
            'contactdudestinataire'=> 'required',
            'montant' => 'required',
            'id_users' => 'required',
            'id_livreurs' => 'required',      
    ]);

        $order  = new Order;
        $order->details  = $request->details;
        $order->lieudedepart  = $request->lieudedepart;
        $order->lieudelivraison  = $request->lieudelivraison;
        $order->contactdudestinataire  = $request->contactdudestinataire;
        $order->montant  = $request->montant;
        $order->id_users  = $request->id_users;
        $order->id_livreurs  = $request->id_livreurs;

        $order->save();

        
    }

    //update one order
    public function updateCom(Request $request, $id){
        
        $order  = Order::find($id);
        $order->details  = $request->details;
        $order->lieudedepart  = $request->lieudedepart;
        $order->lieudelivraison  = $request->lieudelivraison;
        $order->contactdudestinataire  = $request->contactdudestinataire;
        $order->montant  = $request->montant;
        $order->id_livreurs  = $request->id_livreurs;

        $order->update();

        return reponse(
            'succes'
        );

        
    }

    //delete la commande 
    public function destroyCom($id){

        $order = Order::find($id);
        $order->delete();

        return reponse('commande delete');
    }
    


    //retourner toutes les commandes avec le nom des utilisateurs 
    public function listAll(){
       $order = Order::query()
            ->select('details', 'users.name','lieudedepart','lieudelivraison', 'contactdudestinataire', 'users.contact')
            ->join('users', 'orders.id_users', '=',  'users.id')
            ->get();

        return response()->json([
                'order' => $order
            ]);
    }
    
    
    
}
