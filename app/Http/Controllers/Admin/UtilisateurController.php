<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUtilisateur as StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateur as UpdateUtilisateurRequest;
use App\Models\Utilisateur;
use App\Http\Services\UtilisateurService;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'title' => "Liste des utilisateurs",
            'utilisateurs' => UtilisateurService::getAll($request)
        ];

        return view('admin.utilisateurs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer utilisateur",
            'types' => ['client', 'commercial_terrain', 'commercial_sedentaire', 'commercial_grand_compte', 'responsable_technique', 'technicien', 'prestataire', 'commercial_influenceur', 'administrateur']
        ];

        return view('admin.utilisateurs.create', $data);
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

        UtilisateurService::store($validated);

        $msg = "L'utilisateur a été créé avec succes !";

        return redirect()->route('admin.utilisateurs.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur)
    {
        $data = [
            'title' => "Liste des utilisateurs",
            'types' => ['client', 'commercial_terrain', 'commercial_sedentaire', 'commercial_grand_compte', 'responsable_technique', 'technicien', 'prestataire', 'commercial_influenceur', 'administrateur'],
            'utilisateur' => $utilisateur
        ];

        return view('admin.utilisateurs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUtilisateurRequest $request, Utilisateur $utilisateur)
    {
        $validated = $request->validated();

        UtilisateurService::update($validated, $utilisateur);

        $msg = "L'utilisateur a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        UtilisateurService::delete($utilisateur);

        $msg = "L'utilisateur a été supprimé avec succes !";

        return redirect()->route('admin.utilisateurs.index')->with('success', $msg);
    }
}
