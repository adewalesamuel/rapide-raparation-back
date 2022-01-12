<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUtilisateur as StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateur as UpdateUtilisateurRequest;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $type = !$request->query('type') ? "client" : $request->query('type'); 
        $utilisateurs = Utilisateur::where('type', $type);

        if ($request->query('pc_code')) $utilisateurs = $utilisateurs->where('pc_code', $request->query('pc_code'));
        if ($request->query('date_creation')) $utilisateurs = $utilisateurs->where('created_at', $request->query('date_creation'));
        if ($request->query('mail')) $utilisateurs = $utilisateurs->where('mail', $request->query('mail'));
        if ($request->query('nom_entreprise')) $utilisateurs = $utilisateurs->where('nom_entreprise', $request->query('nom_entreprise'));
        if ($request->query('nom_entreprise')) $utilisateurs = $utilisateurs->where('nom_entreprise', $request->query('nom_entreprise'));
        if ($request->query('nom_prenoms')) $utilisateurs = $utilisateurs->where('nom_prenoms', 'like', '%' . $request->query('nom_prenoms') . '%');

        $utilisateurs = $utilisateurs->orderBy('created_at', 'desc')->get();

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

        $utilisateur = new Utilisateur;

        $utilisateur->nom_prenoms = $validated['nom_prenoms'];
        $utilisateur->mail = $validated['mail'];
        $utilisateur->password = $validated['password'];
        $utilisateur->telephone = $validated['telephone'];
        $utilisateur->date_naissance = $validated['date_naissance'] ?? null;
        $utilisateur->type = $validated['type'];
        $utilisateur->nom_entreprise = $validated['nom_entreprise'] ?? null;
        $utilisateur->registre_commerce = $validated['registre_commerce'] ?? null;
        $utilisateur->dfe = $validated['dfe'] ?? null;
        $utilisateur->pc_code = $validated['pc_code'] ?? null;

        $utilisateur->save();

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
        $utilisateur->delete();
        //Commandes

        $data = [
            'success' => true,
            'data' => $utilisateur
        ];
        
        return response()->json($data);
    }
}
