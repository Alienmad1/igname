<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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
    

    public function listAll(){
        $order = Order::select(DB::raw('*', 'from', 'orders'))
            ->join('users', 'orders.id_users', '=', 'users_id ')
            ->get();

        return response()->json([
            'order' => $order,
             200
        ]);
    }

    public function listA(){
       $order = Order::with('user')->get();
       dd($order->user);

       return response()->json([
        'order' => $order,
         200
    ]);

    
    }
    
    
    
}
