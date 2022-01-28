<?php

namespace App\Http\Services;

use App\Models\Service;

class ServiceService {

    public static function getAll() {
        return Service::with('prestation')->orderBy('created_at', 'desc')->get();
    }

    public function services(Service $service) {
        return $service->services;
    }
    
    public static function store($validated) {
        $service = new Service;

        $service->nom = $validated['nom'];
        $service->prix = $validated['prix'];
        $service->type = $validated['type'];
        $service->prestation_id = $validated['prestation_id'];
        $service->description = $validated['description'] ?? null;

        $service->save();

        return $service;
    }

    public static function update($validated, Service $service) {
        $service->nom = $validated['nom'];
        $service->prix = $validated['prix'];
        $service->type = $validated['type'] ?? "particulier";
        $service->prestation_id = $validated['prestation_id'];
        $service->description = $validated['description'] ?? null;

        $service->save();
        
        return $service;
    }

    public static function delete(Service $service) {
        $service->delete();

        return $service;
    } 
}