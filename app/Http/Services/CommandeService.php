<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeService {

    public static function getAll(Request $request) {
        $commandes = Commande::with(["utilisateur", 'service'])->where('id', '>', 0);

        if ($request->query('status')) $commandes = $commandes->where('status', $request->query('status'));

        $commandes = $commandes->orderBy('created_at', 'desc')->get();

        $data = [
            'success' => true,
            'data' => $commandes
        ];

        return $commandes;
    }
    
    public static function store($validated) {
        $commande = new Commande;

        $commande->utilisateur_id = $validated['utilisateur_id'];
        $commande->service_id = $validated['service_id'];
        $commande->prix = $validated['prix'] ?? null;
        $commande->quantite = $validated['quantite'] ?? 1; 
        $commande->materiel = $validated['materiel'] ?? null;
        $commande->order_id = $validated['order_id'] ?? null;
        $commande->lieu = $validated['lieu'] ?? null;
        $commande->description = $validated['description'] ?? null;

        //File $request->image

        $commande->save();

        return $commande;
    }

    public static function update($validated, Commande $commande) {
        $commande->utilisateur_id = $validated['utilisateur_id'];
        $commande->service_id = $validated['service_id'];
        $commande->prix = $validated['prix'] ?? null;
        $commande->quantite = $validated['quantite'] ?? 1; 
        $commande->status = $validated['status'] ?? 'non-verifié'; 
        $commande->materiel = $validated['materiel'] ?? null;
        $commande->technicien_id = $validated['technicien_id'] ?? null;
        $commande->prestataire_id = $validated['prestataire_id'] ?? null;
        $commande->commercial_id = $validated['commercial_id'] ?? null;
        $commande->responsable_technique_id = $validated['responsable_technique_id'] ?? null;
        $commande->order_id = $validated['order_id'] ?? null;
        $commande->lieu = $validated['lieu'] ?? null;
        $commande->description = $validated['description'] ?? null;
        $commande->note = $validated['note'] ?? null;
        $commande->date_execution = $validated['date_execution'] ?? null;
        $commande->has_visite_technique = $validated['has_visite_technique'] ?? false;
        $commande->note_visite_technique = $validated['note_visite_technique'] ?? null;

        //File $request->rapport-visite_file

        $commande->save();
        
        return $commande;
    }

    public static function delete(Commande $commande) {
        $commande->delete();

        return $commande;
    } 
}