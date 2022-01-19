<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommande as StoreCommandeRequest;
use App\Http\Requests\UpdateCommande as UpdateCommandeRequest;
use App\Http\Services\CommandeService;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $commandes = CommandeService::getAll($request);
        $data = [
            'success' => true,
            'data' => $commandes
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
    public function store(StoreCommandeRequest $request)
    {
        $validated = $request->validated();
        $commande = CommandeService::store($validated);
        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande = Commande::with(["utilisateur", 'service'])
        ->where('id', $commande->id)->first();

        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $validated = $request->validated();
        $commande = CommandeService::update($validated, $commande);
        $data = [
            'success' => true,
            'data' => $commande
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {        
        $data = [
            'success' => true,
            'data' => CommandeService::delete($commande)
        ];
        
        return response()->json($data);
    }
}
