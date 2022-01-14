<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only("mail", "password");
    
        if (!Auth::attempt($credentials)) {
            return back()->with('error', "Mail ou mot de passe incorrect");
        }

        $utilisateur = Auth::user();

        switch ($utilisateur->type) {
            case 'administrateur':
                return redirect()->route('admin.dashboard');
                break;
            
            default:
                return redirect('/');
                break;
        }
    }

    public function loginForm() {
        $data = [
            'title' => "Connexion"
        ];

        return view('login', $data);
    }

    public function logout() {
        Auth::logout(); 
        return redirect()->route('connexion');
    }
}
