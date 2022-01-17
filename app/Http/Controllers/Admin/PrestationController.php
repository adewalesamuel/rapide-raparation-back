<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestation;
use App\Models\SousCategorie;
use App\Http\Requests\StorePrestation as StorePrestationRequest;
use App\Http\Requests\UpdatePrestation as UpdatePrestationRequest;
use App\Http\Services\PrestationService;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Liste des prestations",
            'prestations' => PrestationService::getAll(),
        ];

        return view('admin.prestations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Creer une prestation",
            'sous_categories' => SousCategorie::all()
        ];

        return view('admin.prestations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrestationRequest $request)
    {
        $validated = $request->validated();

        PrestationService::store($validated);

        $msg = "La prestation a été créé avec succes !";

        return redirect()->route('admin.prestations.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestation $prestation)
    {
        $data = [
            'title' => "Modifier la sous categorie",
            'prestation' => $prestation,
            'sous_categories' => SousCategorie::all()
        ];

        return view('admin.prestations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestationRequest $request, Prestation $prestation)
    {
        $validated = $request->validated();

        PrestationService::update($validated, $prestation);

        $msg = "La prestation a été modifié avec succes !";

        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestation $prestation)
    {
        PrestationService::delete($prestation);

        $msg = "La prestation a été supprimé avec succes !";

        return redirect()->route('admin.prestations.index')->with('success', $msg);
    }
}
