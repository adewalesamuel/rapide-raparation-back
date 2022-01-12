<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;
use App\Http\Requests\StorePrestation as StorePrestationRequest;
use App\Http\Requests\UpdatePrestation as UpdatePrestationRequest;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestation = Prestation::all();
        $data = [
            'success' => true,
            'data' => $prestation
        ];

        return response()->json($data);
    }

    public function services(Request $request, Prestation $prestation) {
        $data = [
            'success' => true,
            'data' => $prestation->services
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
    public function store(StorePrestationRequest $request)
    {
        $validated = $request->validated();

        $prestation = new Prestation;

        $prestation->nom = $validated['nom'];
        $prestation->sous_categorie_id = $validated['sous_categorie_id'];

        $prestation->save();

        $data = [
            'success' => true,
            'data' => $prestation
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function show(Prestation $prestation)
    {
        $data = [
            'success' => true,
            'data' => $prestation
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestation $prestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestationRequest $request, Prestation $prestation)
    {
        $validated = $request->validated();

        $prestation->nom = $validated['nom'];
        $prestation->sous_categorie_id = $validated['sous_categorie_id'];

        $prestation->save();

        $data = [
            'success' => true,
            'data' => $prestation
        ];

        return response()->json($data, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestation $prestation)
    {
        $prestation->delete();
        //Services

        $data = [
            'success' => true,
            'data' => $prestation
        ];
        
        return response()->json($data);
    }
}
