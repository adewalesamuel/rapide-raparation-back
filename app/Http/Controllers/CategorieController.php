<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategorie as StoreCategorieRequest;
use App\Http\Requests\UpdateCategorie as UpdateCategorieRequest;
use App\Models\Prestation;
use App\Models\Service;
use App\Models\SousCategorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $data = [
            'success' => true,
            'data' => $categories
        ];

        return response()->json($data);
    }

    public function sous_categories(Request $request, Categorie $categorie) {
        $data = [
            'success' => true,
            'data' => $categorie->sous_categories
            ];

        return response()->json($data, 200);
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
    public function store(StoreCategorieRequest $request)
    {
        $validated = $request->validated();

        $categorie = new Categorie;

        $categorie->nom = $validated['nom'];
        $categorie->save();

        $data = [
            'success' => true,
            'data' => $categorie
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        $data = [
            'success' => true,
            'data' => $categorie
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $validated = $request->validated();

        $categorie->nom = $validated['nom'];
        $categorie->save();

        $data = [
            'success' => true,
            'data' => $categorie
        ];

        return response()->json($data, 200);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {   
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

        $data = [
            'success' => true,
            'data' => $categorie
        ];
        
        return response()->json($data);
    }
}
