<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use App\Models\Commande;

class UtilisateurService {

    public static function getAll(Request $request) {
        $type = !$request->query('type') ? "client" : $request->query('type'); 
        $utilisateurs = Utilisateur::where('type', $type);

        if ($request->query('pc_code')) $utilisateurs = $utilisateurs->where('pc_code', $request->query('pc_code'));
        if ($request->query('date_creation')) $utilisateurs = $utilisateurs->where('created_at', $request->query('date_creation'));
        if ($request->query('mail')) $utilisateurs = $utilisateurs->where('mail', $request->query('mail'));
        if ($request->query('nom_entreprise')) $utilisateurs = $utilisateurs->where('nom_entreprise', $request->query('nom_entreprise'));
        if ($request->query('nom_entreprise')) $utilisateurs = $utilisateurs->where('nom_entreprise', $request->query('nom_entreprise'));
        if ($request->query('nom_prenoms')) $utilisateurs = $utilisateurs->where('nom_prenoms', 'like', '%' . $request->query('nom_prenoms') . '%');

        $utilisateurs = $utilisateurs->orderBy('created_at', 'desc')->get();
        
        return $utilisateurs;
    }
    
    public static function store($validated) {
        $utilisateur = new Utilisateur;

        $utilisateur->nom_prenoms = $validated['nom_prenoms'];
        $utilisateur->mail = $validated['mail'];
        $utilisateur->password = $validated['password'];
        $utilisateur->api_token = Str::random(60);
        $utilisateur->telephone = $validated['telephone'];
        $utilisateur->date_naissance = $validated['date_naissance'] ?? null;
        $utilisateur->type = $validated['type'];
        $utilisateur->nom_entreprise = $validated['nom_entreprise'] ?? null;
        $utilisateur->registre_commerce = $validated['registre_commerce'] ?? null;
        $utilisateur->dfe = $validated['dfe'] ?? null;
        $utilisateur->pc_code = $validated['pc_code'] ?? null;

        $utilisateur->save();
        
        return $utilisateur;
    }

    public static function update($validated, Utilisateur $utilisateur) {
        $utilisateur->nom_prenoms = $validated['nom_prenoms'];
        $utilisateur->mail = $validated['mail'];
        $utilisateur->telephone = $validated['telephone'];
        $utilisateur->date_naissance = $validated['date_naissance'] ?? null;
        $utilisateur->type = $validated['type'];
        $utilisateur->nom_entreprise = $validated['nom_entreprise'] ?? null;
        $utilisateur->registre_commerce = $validated['registre_commerce'] ?? null;
        $utilisateur->dfe = $validated['dfe'] ?? null;
        $utilisateur->pc_code = $validated['pc_code'] ?? null;
        
        if ($validated['password']) $utilisateur->password = $validated['password'];
        
        $utilisateur->save();
        
        return $utilisateur;
    }

    public static function delete(Utilisateur $utilisateur) {
        $commandes = Commande::where('utilisateur_id', $utilisateur->id);

        $utilisateur->delete();
        $commandes->delete();

        return $utilisateur;
    } 
}