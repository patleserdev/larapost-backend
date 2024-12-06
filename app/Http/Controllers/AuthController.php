<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validation des informations de l'utilisateur
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifier les identifiants de l'utilisateur
        if (Auth::attempt($credentials)) {
            // Récupérer l'utilisateur
            $user = Auth::user();
            
            $user->tokens()->delete();
            // Créer un token d'API
            $token = $user->createToken('LaraPost')->plainTextToken;

            // Retourner le token
            return response()->json(['token' => $token]);
        }

        // Si les identifiants sont incorrects
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ], 200);


    }
}
