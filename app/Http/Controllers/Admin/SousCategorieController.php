<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SousCategorieService;
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Http\Requests\StoreSousCategorie as StoreSousCategorieRequest;
use App\Http\Requests\UpdateSousCategorie as UpdateSousCategorieRequest;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Liste des sous categories",
            'sous_categories' => SousCategorieService::getAll(),
        ];

        return view('admin.sous-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer une sous categorie",
            'categories' => Categorie::all()
        ];

        return view('admin.sous-categories.create', $data);
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

        SousCategorieService::store($validated);

        $msg = "La sous categorie a été créé avec succes !";

        return redirect()->route('admin.sous-categories.index')->with('success', $msg);
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
    public function edit(SousCategorie $sousCategorie)
    {
        $data = [
            'title' => "Modifier la sous categorie",
            'sous_categorie' => $sousCategorie,
            'categories' => Categorie::all()
        ];

        return view('admin.sous-categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSousCategorieRequest $request, SousCategorie $sousCategorie)
    {
        $validated = $request->validated();

        SousCategorieService::update($validated, $sousCategorie);

        $msg = "La sous categorie a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousCategorie $sousCategorie)
    {
        SousCategorieService::delete($sousCategorie);

        $msg = "La sous categorie a été supprimé avec succes !";

        return redirect()->route('admin.sous-categories.index')->with('success', $msg);
    }
}
