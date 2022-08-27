<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    //return tous les utilisateurs qui ont commander
    public function UserWhOrder(){
        $user = User::query()
             ->join('orders', 'users.id', '=',  'orders.id_users')
             ->get();
        

         return response()->json([
                 'order' => $user,
                  200
             ]);
     }


}
