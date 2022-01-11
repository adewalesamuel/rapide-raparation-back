<?php

namespace App\Http\Controllers;

use App\Models\SousCategorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSousCategorie as StoreSousCategorieRequest;
use App\Http\Requests\UpdateSousCategorie as UpdateSousCategorieRequest;

class SousCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sous_categories = SousCategorie::all();
        $data = [
            'success' => true,
            'data' => $sous_categories
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
    public function store(StoreSousCategorieRequest $request)
    {
        $validated = $request->validated();

        $sous_categorie = new SousCategorie;

        $sous_categorie->nom = $validated['nom'];
        $sous_categorie->categorie_id = $validated['categorie_id'];

        $sous_categorie->save();

        $data = [
            'success' => true,
            'data' => $sous_categorie
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(SousCategorie $sousCategorie)
    {
        $data = [
            'success' => true,
            'data' => $sousCategorie
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(SousCategorie $sousCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSousCategorieRequest $request, SousCategorie $sousCategorie)
    {
        $validated = $request->validated();

        $sousCategorie->nom = $validated['nom'];
        $sousCategorie->categorie_id = $validated['categorie_id'];

        $sousCategorie->save();

        $data = [
            'success' => true,
            'data' => $sousCategorie
        ];

        return response()->json($data, 200);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousCategorie $sousCategorie)
    {
        $sousCategorie->delete();
        //Prestation
        //Services

        $data = [
            'success' => true,
            'data' => $sousCategorie
        ];
        
        return response()->json($data);
    }
}
