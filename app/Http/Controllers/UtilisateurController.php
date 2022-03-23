<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUtilisateur as StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateur as UpdateUtilisateurRequest;
use App\Http\Services\UtilisateurService;
use App\Models\Commande;
use Illuminate\Support\Str;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $utilisateurs = UtilisateurService::getAll($request);

        $data = [
            'success' => true,
            'data' => $utilisateurs
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUtilisateurRequest $request)
    {
        $validated = $request->validated();

        $utilisateur = UtilisateurService::store($validated);

        $data = [
            'success' => true,
            'data' => $utilisateur
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        $data = [
            'success' => true,
            'data' => $utilisateur
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUtilisateurRequest $request, Utilisateur $utilisateur)
    {
        $validated = $request->validated();

        $utilisateur = UtilisateurService::update($validated, $utilisateur);

        $data = [
            'success' => true,
            'data' => $utilisateur
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur = UtilisateurService::delete($utilisateur);

        $data = [
            'success' => true,
            'data' => $utilisateur
        ];
        
        return response()->json($data);
    }
}
