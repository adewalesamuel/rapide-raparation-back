<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;
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
        $prestation = PrestationService::getAll();
        $data = [
            'success' => true,
            'data' => $prestation
        ];

        return response()->json($data);
    }

    public function services(Request $request, Prestation $prestation) {
        $data = [
            'success' => true,
            'data' => PrestationService::services($prestation)
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
        $prestation = PrestationService::store($validated);
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

        $prestation = PrestationService::update($validated, $prestation);

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
        $data = [
            'success' => true,
            'data' => PrestationService::delete($prestation)
        ];
        
        return response()->json($data);
    }
}
