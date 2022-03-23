<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategorie as StoreCategorieRequest;
use App\Http\Requests\UpdateCategorie as UpdateCategorieRequest;
use App\Http\Services\CategorieService;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategorieService::getAll();
        $data = [
            'success' => true,
            'data' => $categories
        ];

        return response()->json($data);
    }

    public function sous_categories(Request $request, Categorie $categorie) {
        $data = [
            'success' => true,
            'data' => CategorieService::sous_categories($categorie)
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
        $categorie = CategorieService::store($validated);
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
        $categorie = CategorieService::update($validated, $categorie);
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
        $data = [
            'success' => true,
            'data' => CategorieService::delete($categorie)
        ];
        
        return response()->json($data);
    }
}
