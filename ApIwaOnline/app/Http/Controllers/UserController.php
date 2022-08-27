<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {

        $user = User::select(DB::raw('users.*'))
            ->join('orders', 'users.id', '=', 'orders.id_users')
            ->get();

        return response()->json([
            'user' => $user,
             200
        ]);

    }

    public function aff(){
        $user= User::with('order')->get();
 dd($user->order);
    }
}
