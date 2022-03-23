<?php

namespace App\Http\Services;

use App\Models\Prestation;

class PrestationService {

    public static function getAll() {
        return Prestation::with('sous_categorie')->orderBy('created_at', 'desc')->get();
    }

    public static function services(Prestation $prestation) {
        return $prestation->services;
    }
    
    public static function store($validated) {
        $prestation = new Prestation;

        $prestation->nom = $validated['nom'];
        $prestation->sous_categorie_id = $validated['sous_categorie_id'];

        $prestation->save();

        return $prestation;
    }

    public static function update($validated, Prestation $prestation) {
        $prestation->nom = $validated['nom'];
        $prestation->sous_categorie_id = $validated['sous_categorie_id'];

        $prestation->save();
        
        return $prestation;
    }

    public static function delete(Prestation $prestation) {
        $prestation->delete();

        return $prestation;
    } 
}