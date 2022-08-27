<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'prenom_user' =>'required|max:200',
            'email' => 'required|string|email|max:255|unique:users',
            'contact'=> 'required',
            'password' => 'required|string|min:8',      
    ]);

        $user  = new User;
        $user->name  = $request->name;
        $user->prenom_user  = $request->prenom_user;
        $user->email  = $request->email;
        $user->contact  = $request->contact;
        $user->password  = Hash::make($validatedData['password']);
        $user->role     = $request->role;

        $user->save();

        $token = $user->createToken('authA_token')->plainTextToken;

        return response()->json([
                    'access_token' => $token,
                        'token_type' => 'Bearer',
                        'role'=> $user->role
        ]);
    }



            public function login(Request $request)
         {
            if (!Auth::attempt($request->only('contact', 'password'))) {
            return response()->json([
            'message' => 'Invalid login details'
                    ], 401);
                }

            $user = User::where('contact', $request['contact'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
            ]);
    }


    public function me(Request $request)
    {
        return $request->user();
    }
}
