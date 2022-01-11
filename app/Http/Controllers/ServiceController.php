<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreService as StoreServiceRequest;
use App\Http\Requests\UpdateService as UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        $data = [
            'success' => true,
            'data' => $service
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
    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();

        $service = new Service;

        $service->nom = $validated['nom'];
        $service->prix = $validated['prix'];
        $service->type = $validated['type'];
        $service->prestation_id = $validated['prestation_id'];

        $service->save();

        $data = [
            'success' => true,
            'data' => $service
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $data = [
            'success' => true,
            'data' => $service
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();

        $service->nom = $validated['nom'];
        $service->prix = $validated['prix'];
        $service->type = $validated['type'] ?? "particulier";
        $service->prestation_id = $validated['prestation_id'];

        $service->save();

        $data = [
            'success' => true,
            'data' => $service
        ];

        return response()->json($data, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $data = [
            'success' => true,
            'data' => $service
        ];
        
        return response()->json($data);
    }
}
