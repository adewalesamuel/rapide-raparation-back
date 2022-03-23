<?php

namespace App\Http\Services;

use App\Models\Categorie;
use App\Models\SousCategorie;

class SousCategorieService {

    public static function getAll() {
        return SousCategorie::with('categorie')->orderBy('created_at', 'desc')->get();
    }

    public static function prestations(SousCategorie $sous_categorie) {
        return $sous_categorie->prestations;
    }
    
    public static function store($validated) {
        $sous_categorie = new SousCategorie;

        $sous_categorie->nom = $validated['nom'];
        $sous_categorie->categorie_id = $validated['categorie_id'];

        $sous_categorie->save();

        return $sous_categorie;
    }

    public static function update($validated, SousCategorie $sous_categorie) {
        $sous_categorie->nom = $validated['nom'];
        $sous_categorie->categorie_id = $validated['categorie_id'];

        $sous_categorie->save();
        
        return $sous_categorie;
    }

    public static function delete(SousCategorie $sous_categorie) {
        $sous_categorie->delete();

        return $sous_categorie;
    } 
}