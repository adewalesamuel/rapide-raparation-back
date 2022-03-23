<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CategorieService;
use App\Http\Requests\StoreCategorie as StoreCategorieRequest;
use App\Http\Requests\UpdateCategorie as UpdateCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Liste des categories",
            'categories' => CategorieService::getAll()
        ];

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer une categorie"
        ];

        return view('admin.categories.create', $data);
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

        CategorieService::store($validated);

        $msg = "La categorie a été créé avec succes !";

        return redirect()->route('admin.categories.index')->with('success', $msg);
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
    public function edit(Categorie $categorie)
    {
        $data = [
            'title' => "Modifier la categorie",
            'categorie' => $categorie
        ];

        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $validated = $request->validated();

        CategorieService::update($validated, $categorie);

        $msg = "La categorie a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        CategorieService::delete($categorie);

        $msg = "La categorie a été supprimé avec succes !";

        return redirect()->route('admin.categories.index')->with('success', $msg);
    }
}
