<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only("mail", "password");
    
        if (!Auth::once($credentials)) {
            $data = [
                'success' => false,
                'message' => "Mail ou mot de passe incorrect"
            ];

            return response()->json($data, 404);
        }

        $utilisateur = Utilisateur::where('mail', $credentials['mail'])->first();

        $data = [
            "success" => true,
            "data" => $utilisateur
        ];

        return response()->json($data);

    }

    public function logout(Request $request) {
        $token = explode(" ", $request->header('Authorization'))[1];
        $utilisateur = Utilisateur::where('api_token', $token)->first();

        if (!$utilisateur) {
            $data = [
                "success" => false,
                "message" => "Une erreure est survenue"
            ];

            return response()->json($data, 500);
        }

        $utilisateur->api_token = Str::random(60);

        $utilisateur->save();

        $data = [
            "success" => true,
        ];

        return response()->json($data, 200);
    }

    
}
