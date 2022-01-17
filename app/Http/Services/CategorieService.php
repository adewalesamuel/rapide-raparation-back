<?php

namespace App\Http\Services;

use App\Models\Categorie;
use App\Models\Prestation;
use App\Models\Service;
use App\Models\SousCategorie;

class CategorieService {

    public static function getAll() {
        $categories = Categorie::orderBy('created_at', 'desc')->get();

        return $categories;
    }

    public function sous_categories(Categorie $categorie) {
        return $categorie->sous_categories;
    }
    
    public static function store($validated) {
        $categorie = new Categorie;

        $categorie->nom = $validated['nom'];
        $categorie->save();

        return $categorie;
    }

    public static function update($validated, Categorie $categorie) {
        $categorie->nom = $validated['nom'];
        $categorie->save();
        
        return $categorie;
    }

    public static function delete(Categorie $categorie) {
        $sous_categories = SousCategorie::where('categorie_id', $categorie->id);
        $sous_categorie_ids = $sous_categories->get()->map(function ($item, $key) {
            return $item->id;
        });
        $prestations = Prestation::whereIn('sous_categorie_id', $sous_categorie_ids);
        $prestations_ids = $prestations->get()->map(function ($item, $key) {
            return $item->id;
        });
        $services = Service::whereIn('prestation_id', $prestations_ids);

        $categorie->delete();
        $sous_categories->delete();
        $prestations->delete();
        $services->delete();

        return $categorie;
    } 
}